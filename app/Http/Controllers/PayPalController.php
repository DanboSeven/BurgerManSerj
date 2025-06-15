<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Core\ProductionEnvironment;
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

use App\Models\Donation;
use App\Models\DonationGoalDB;

class PayPalController extends Controller
{
    private PayPalHttpClient $client;

    public function __construct()
    {
        $clientId = config('paypal.client_id');
        $clientSecret = config('paypal.client_secret');
        $mode = config('paypal.mode');

        $environment = $mode === 'live'
            ? new ProductionEnvironment($clientId, $clientSecret)
            : new SandboxEnvironment($clientId, $clientSecret);

        $this->client = new PayPalHttpClient($environment);
    }

    public function success(Request $request)
    {
        $orderId = $request->query('token');

        $captureRequest = new OrdersCaptureRequest($orderId);
        $captureRequest->prefer('return=representation');

        try {
            $response = $this->client->execute($captureRequest);

            $data = $response->result;
            $orderId = $data->id;
            $status = $data->status;
            $payerEmail = $data->payer->email_address;
            $payerName = $data->payer->name->given_name . ' ' . $data->payer->name->surname;
            $amount = $data->purchase_units[0]->payments->captures[0]->amount->value;
            $currency = $data->purchase_units[0]->payments->captures[0]->amount->currency_code;
            $transactionId = $data->purchase_units[0]->payments->captures[0]->id;

            $items = $data->purchase_units[0]->items ?? [];
            $quantity = 1; // default fallback
            if (!empty($items)) {
                $quantity = (int) ($items[0]->quantity ?? 1);
            }
            
            if (Donation::where('paypal_order_id', $data->id)->exists()) {
                return redirect()->route('donate')->with('alreadychecked', 'Already Checked!');
            }

            if ($data->status === 'COMPLETED') {
                Donation::create([
                    'user_id' => auth()->id() ?? 0,
                    'paypal_order_id' => $orderId,
                    'transaction_id' => $transactionId,
                    'payer_name' => $payerName,
                    'payer_email' => $payerEmail,
                    'quantity' => $quantity,
                    'amount' => $amount,
                    'currency' => $currency,
                    'status' => $status,
                ]);

                $userId = Auth::check() ? Auth::id() : null;
                if ($userId) {
                    $user = Auth::user();
                    $user->increment('meals_donated', $quantity);
                }
            
                $donationGoal = DonationGoalDB::latest('id')->first();
                if ($donationGoal->active) {
                    $donationGoal->increment('donated', $quantity);
                }
            } else {
                return redirect()->route('donate')->with('pending', 'Payment Pending.');
            }

            return redirect()->route('donate')->with('success', 'Thank you for your donation!');
        } catch (\Exception $e) {
            Log::error('PayPal capture error: ' . $e->getMessage(), [
                'exception' => $e,
                'order_id' => $orderId ?? null,
            ]);
            return redirect()->route('donate')->with('fail', 'Payment capture failed.');
        }
    }

    public function cancel()
    {
        return redirect()->route('donate')->with('error', 'Payment was cancelled.');
    }
}
