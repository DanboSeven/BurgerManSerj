<footer class="footer text-white pt-2 pb-2">
    <div class="container text-md-left">
        <div class="row text-md-left">
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                <h5 class="text-uppercase mb-4 font-weight-bold footerheader">Links</h5>
                <p><a href="#" class="text-white text-decoration-none">Home</a></p>
                <p><a href="#" class="text-white text-decoration-none">About</a></p>
                <p><a href="#" class="text-white text-decoration-none">Services</a></p>
                <p><a href="#" class="text-white text-decoration-none">Contact</a></p>
            </div>

            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                <h5 class="text-uppercase mb-4 font-weight-bold footerheader">Contact</h5>
                <p><i class="fas fa-home mr-3"></i> Hungry House Burgers & Kebab, 165 High St, Chatham ME4 4BA</p>
                <p><i class="fas fa-envelope mr-3"></i> contact@burgermanserj.com</p>
                <p><i class="fas fa-phone mr-3"></i> 01634 819200</p>
            </div>

            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                <h5 class="text-uppercase mb-4 font-weight-bold footerheader">Follow Us</h5>
                <a href="#" class="text-white me-4"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="text-white me-4"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-white me-4"><i class="fab fa-instagram"></i></a>
                <a href="#" class="text-white me-4"><i class="fab fa-linkedin-in"></i></a>
            </div>

            <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mt-3 text-center">
                <i class="fa-solid fa-users me-1"></i> Logged in: <strong>{{ $loggedIn }}</strong> <span class="m-2">|</span>
                <i class="fa-solid fa-eye me-1"></i> Guests: <strong>{{ $guests }}</strong> <span class="m-2">|</span>
                <i class="fa-solid fa-globe me-1"></i> Total: <strong>{{ $total }}</strong>
            </div>

        </div>

        <hr class="mb-4">

        <!-- Copyright -->
        <div class="row align-items-center">
            <div class="col-md-7 col-lg-8">
                <p>© 2025 BurgerManSerj. All Rights Reserved.</p>
            </div>
            <div class="col-md-5 col-lg-4">
                <p class="text-end">Designed by <a href="#" class="footerheader text-decoration-none">Daniel Baker</a>
                </p>
            </div>
        </div>
    </div>
</footer>