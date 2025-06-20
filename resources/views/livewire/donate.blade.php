<div>
    <div class="container mt-4">
        <livewire:header-stats />
        <div class="row justify-content-center">
            <div class="col-lg-8 mt-2">
                <div class="box p-1">
                    @guest
                    <section class="hero-completedbefore">
                        <h1 class="display-4 toptext">Login Or Sign Up</h1>
                        <p class="lead bottomtext">Please log in or sign up to start donating!</p>
                        <div class="m-4"><hr></div>
                        <h4>Hi there! 👋</h4>
                            <p>We'd love for you to join our community. Please <a href="/login" style="color: #fff;">log in</a> or <a href="/register" style="color: #fff;">sign up</a> to donate meals and make a real impact.</p>
                            <p>Your support means the world to us - thank you for caring! 💙</p>
                        </section>
                    @else
                        @if (session('error'))
                        <section class="hero-error">
                        <h1 class="display-4 toptext">Payment Cancelled</h1>
                        <p class="lead bottomtext">No charges were made. You can try again anytime.</p>
                        @elseif (session('fail'))
                        <section class="hero-error">
                        <h1 class="display-4 toptext">Payment Capture Failed</h1>
                        <p class="lead bottomtext">We were unable to check payment status.</p>
                        @elseif (session('alreadychecked'))
                        <section class="hero-completedbefore">
                        <h1 class="display-4 toptext">Donation Already Processed</h1>
                        <p class="lead bottomtext">Your donation has already been received, thank you so much!</p>
                        @elseif (session('pending'))
                        <section class="hero-completedbefore">
                        <h1 class="display-4 toptext">Payment Pending</h1>
                        <p class="lead bottomtext">Your donation is currently travelling through the PayPal world, it should be processed within 24 hours!</p>
                        @elseif (session('success'))
                        <section class="hero-success">
                        <h1 class="display-4 toptext">Payment Successful</h1>
                        <p class="lead bottomtext">Your donation has been received, thank you so much!</p>
                        @else
                        <section class="hero">
                        <h1 class="display-4 toptext">Support Our Mission</h1>
                        <p class="lead bottomtext">Your donation helps us to continue making a difference.</p>
                        @endif
                    </section>
                    <div class="boxinner px-2 mt-1">
                        <form wire:submit.prevent="createOrder">
                            <label for="donationAmount" class="form-label">Amount Of Meals</label>
                            <div class="mb-3 input-group">
                                <span class="input-group-text"><i class="fa-solid fa-burger"></i></span>
                                <input type="number" class="form-control" id="donationAmount" placeholder="Amount" min="1" max="100" step="1" value="1" wire:model.live="quantity">
                            </div>

                            <div class="row mb-1 justify-content-center">
                                <div class="col-5 col-md-2">
                                    <div class="box p-1">
                                        <div class="boxinner p-1">
                                            <p class="fw-bold fs-4 text-center mb-0">{{ $quantity }}</p>
                                            <p class="biginformation">Total Meals</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-5 col-md-2">
                                    <div class="box p-1">
                                        <div class="boxinner p-1">
                                            <p class="fw-bold fs-4 text-center mt-0 mb-0">&pound;{{ number_format($viewtotal, 2) }}</p>
                                            <p class="biginformation">Total Price</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn greenbtn mt-0"><i class="fa-brands fa-paypal me-2"></i> Donate via PayPal</button>
                        </form>
                    </div>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>