<title>@yield('title', 'Burgerman Serj - 404 Not Found')</title>
<x-layouts.app-noheader>
    <div class="container mt-4">
        <div class="logo2"></div>
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="box p-1">
                    <div class="boxinner">
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <img src="{{ asset('images/404.png') }}" alt="Not Found" class="img-fluid"
                                style="max-height: 300px;">
                            <div class="text-center">
                                <p class="fs-3">
                                    <span class="text-primary">Oops!</span> This page was not found
                                </p>
                                <p class="lead">
                                    The page you're looking for doesn't exist or has been moved.
                                </p>
                                <a href="{{ route('home') }}" class="btn greenbtn mt-3 mb-4">
                                    <i class="bi bi-arrow-left-circle me-1"></i> Back to Home
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app-noheader>