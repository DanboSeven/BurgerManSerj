<?php

namespace App\Livewire;

use Livewire\Component;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Core\ProductionEnvironment;
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;

class Donate extends Component
{
    public int $quantity = 1;
    public float $mealCost = 8.00;
    public $viewtotal = 8.00;

    public $fees = false;

    private ?PayPalHttpClient $client = null;

    protected function initPayPalClient()
    {
        if ($this->client === null) {
            $clientId = config('paypal.client_id');
            $clientSecret = config('paypal.client_secret');
            $mode = config('paypal.mode');

            $environment = $mode === 'live'
                ? new ProductionEnvironment($clientId, $clientSecret)
                : new SandboxEnvironment($clientId, $clientSecret);

            $this->client = new PayPalHttpClient($environment);
        }
    }

    public function updatedquantity($value) {
        $this->quantity = $value;
        $this->viewtotal = number_format($this->quantity * $this->mealCost, 2, '.', '');
        $this->estimatedFee = round($this->viewtotal * 0.029 + 0.30, 2);
    }

    public function createOrder()
    {
        $this->initPayPalClient(); // Make sure client is ready

        $total = number_format($this->quantity * $this->mealCost, 2, '.', '');

        $request = new OrdersCreateRequest();
        $request->prefer('return=representation');
        $request->body = [
    'intent' => 'CAPTURE',
    'purchase_units' => [[
        'amount' => [
            'currency_code' => 'GBP',
            'value' => $total,
            'breakdown' => [
                'item_total' => [
                    'currency_code' => 'GBP',
                    'value' => $total,
                ],
            ],
        ],
        'items' => [[
            'name' => 'Meal Donation',
            'description' => 'Donation of meals',
            'unit_amount' => [
                'currency_code' => 'GBP',
                'value' => $this->mealCost,
            ],
            'quantity' => $this->quantity,
        ]],
        'description' => "{$this->quantity} meal(s) donation",
    ]],
    'application_context' => [
        'return_url' => route('paypal.success'),
        'cancel_url' => route('paypal.cancel'),
    ],
];


        try {
            $response = $this->client->execute($request);

            foreach ($response->result->links as $link) {
                if ($link->rel === 'approve') {
                    return redirect()->to($link->href);
                }
            }

            session()->flash('error', 'Unable to process PayPal payment.');
        } catch (\Exception $e) {
            session()->flash('error', 'Error creating PayPal order: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.donate', [
            'total' => $this->quantity * $this->mealCost,
        ])->title('Burgerman Serj - Donate');
    }
}
