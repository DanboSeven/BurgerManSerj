<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Core\ProductionEnvironment;
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;

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

            // TODO: Save the donation details in DB, send email, etc.

            return redirect()->route('donate')->with('success', 'Thank you for your donation!');
        } catch (\Exception $e) {
            return redirect()->route('donate')->with('error', 'Payment capture failed.');
        }
    }

    public function cancel()
    {
        return redirect()->route('donate.page')->with('error', 'Payment was cancelled.');
    }
}
