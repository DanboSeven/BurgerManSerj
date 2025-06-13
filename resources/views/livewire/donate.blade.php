<div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 mt-4">
            @if (session('success'))
            <div class="box p-1">
            <div class="alert alert-success mb-0">{{ session('success') }}</div>
            </div>
            @endif
            @if (session('error'))
            <div class="box p-1">
            <div class="alert alert-danger mb-0">{{ session('error') }}</div>
            </div>
            @endif

            <div class="box p-1">
    <div class="boxinner px-2">
        <form wire:submit.prevent="createOrder">
        <label for="quantity">Meals to donate (&pound;{{ number_format($mealCost, 2) }} each):</label>
        <input type="number" id="quantity" wire:model.live="quantity" min="1" max="100" />

        {{ $quantity }}

        <p>Total: &pound;{{ number_format($viewtotal, 2) }}</p>

        <button type="submit" class="btn btn-primary mt-2">Donate via PayPsal</button>
    </form>
    </div>
</div>
        </div>
    </div>
</div>
</div>
