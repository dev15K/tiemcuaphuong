<!-- Navbar start -->
<div class="container-fluid fixed-top">
    <div class="container topbar bg-primary d-none d-lg-block">
        <div class="d-flex justify-content-between">
            <div class="top-info ps-2">
                <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i>
                    <a href="#" class="text-white">{{ $setting->address }}</a></small>
                <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i>
                    <a href="#" class="text-white">{{ $setting->email }}</a>
                </small>
            </div>
            <div class="top-link pe-2">
                <a href="#" class="text-white"><small class="text-white mx-2">Chính sách bảo mật</small>/</a>
                <a href="#" class="text-white"><small class="text-white mx-2">Điều khoản sử dụng</small>/</a>
                <a href="#" class="text-white"><small class="text-white ms-2">Bán hàng</small></a>
            </div>
        </div>
    </div>
    <div class="container px-0">
        <nav class="navbar navbar-light bg-white navbar-expand-xl">
            <a href="{{ route('home') }}" class="navbar-brand"><h1
                    class="text-primary display-6">{{ $setting->home_name }}</h1></a>
            <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                <span class="fa fa-bars text-primary"></span>
            </button>
            <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    <a href="{{ route('home') }}" class="nav-item nav-link active">Trang chủ</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Cửa hàng</a>
                        <div class="dropdown-menu m-0 bg-secondary rounded-0">
                            <a href="cart.html" class="dropdown-item">Đặc sản Tây Bắc</a>
                            <a href="chackout.html" class="dropdown-item">Hàng nội địa Trung có sẵn</a>
                            <a href="testimonial.html" class="dropdown-item">Hàng nội địa Trung order</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Dịch vụ</a>
                        <div class="dropdown-menu m-0 bg-secondary rounded-0">
                            <a href="{{ route('home.consultant') }}" class="dropdown-item">Book tour & Làm giấy thông
                                hành/hộ chiếu ở cửa khẩu Lào Cai</a>
                        </div>
                    </div>
                    <a href="shop-detail.html" class="nav-item nav-link">Tin tức</a>
                    <a href="contact.html" class="nav-item nav-link">Liên hệ</a>
                </div>
                <div class="d-flex m-3 me-0">
                    <button class="btn-search btn border border-secondary btn-md-square rounded-circle bg-white me-4"
                            data-bs-toggle="modal" data-bs-target="#searchModal"><i
                            class="fas fa-search text-primary"></i></button>
                    @if(Auth::check())
                        <a href="#" class="position-relative me-4 my-auto">
                            <i class="fa fa-shopping-bag fa-2x"></i>
                            <span
                                class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1"
                                style="top: -5px; left: 15px; height: 20px; min-width: 20px;">3</span>
                        </a>
                        <a href="#" class="position-relative me-4 my-auto">
                            <i class="fas fa-user fa-2x"></i>
                        </a>
                        <a href="{{ route('auth.logout') }}" class="my-auto">
                            <i class="fas fa-sign-out-alt fa-2x"></i>
                        </a>
                    @else
                        <a href="{{ route('auth.login') }}" class="my-auto">
                            <i class="fas fa-sign-in-alt fa-2x"></i>
                        </a>
                    @endif
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Navbar End -->

<!-- Spinner Start -->
<div id="spinner"
     class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
    <div class="spinner-grow text-primary" role="status"></div>
</div>
<!-- Spinner End -->

<!-- Modal Search Start -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex align-items-center">
                <div class="input-group w-75 mx-auto d-flex">
                    <input type="search" class="form-control p-3" placeholder="keywords"
                           aria-describedby="search-icon-1">
                    <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Search End -->
