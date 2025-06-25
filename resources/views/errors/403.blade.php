<title>@yield('title', 'Burgerman Serj - 403 Access Denied')</title>
<x-layouts.app-noheader>
    <div class="container mt-4">
        <div class="logo2"></div>
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="box p-1">
                    <div class="boxinner">
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <img src="{{ asset('images/403.png') }}" alt="Forbidden" class="img-fluid"
                                style="max-height: 300px;">
                            <div class="text-center">
                                <p class="fs-3">
                                    <span style="color: #fc6831;">Oops!</span> You're not allowed to access this page.
                                </p>
                                <p class="lead">
                                    {{ $exception->getMessage() ?: 'This area is restricted to authorized users only.'
                                    }}
                                </p>
                                <a href="{{ route('home') }}" class="btn orangebtn mt-3 mb-4">
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