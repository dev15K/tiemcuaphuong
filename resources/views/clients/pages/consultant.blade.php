@extends('clients.layouts.master')
@section('title')
    Book tour & Làm giấy thông hành/hộ chiếu
@endsection
@section('content')
    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Book tour & Làm giấy thông hành/hộ chiếu</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="#">Dịch vụ khác</a></li>
            <li class="breadcrumb-item active text-white">Book tour & Làm giấy thông hành/hộ chiếu</li>
        </ol>
    </div>
    <!-- Single Page Header End -->

    <!-- Contact Start -->
    <div class="container-fluid contact py-5">
        <div class="container py-5">
            <div class="p-5 bg-light rounded">
                <div class="row g-4">
                    <div class="col-lg-7">
                        <form action="{{ route('auth.consultants.store') }}" class="" method="post">
                            @csrf
                            <label class="form-label mb-3">Họ và tên<sup class="text-danger">*</sup>: </label>
                            <input type="text" class="w-100 form-control border-0 py-3 mb-4" name="full_name"
                                   placeholder="Nhập tên của bạn" required>

                            <label class="form-label mb-3">Email<sup class="text-danger">*</sup>: </label>
                            <input type="email" class="w-100 form-control border-0 py-3 mb-4" name="email"
                                   placeholder="Nhập Email của bạn" required>

                            <label class="form-label mb-3">Số điện thoại<sup class="text-danger">*</sup>: </label>
                            <input type="text" class="w-100 form-control border-0 py-3 mb-4" name="phone"
                                   placeholder="Nhập số điện thoại của bạn" required>

                            <label class="form-label mb-3">Dịch vụ<sup class="text-danger">*</sup>: </label>
                            <select class="w-100 form-control border-0 py-3 mb-4" name="service_required">
                                <option value="{{ \App\Enums\ConsultantType::PASSPORT() }}">
                                    Làm giấy thông hành/hộ chiếu
                                </option>
                                <option value="{{ \App\Enums\ConsultantType::BOOKTOUR() }}">Book tour</option>
                            </select>
                            <label class="form-label mb-3">Ghi chú<sup class="text-danger">*</sup>: </label>
                            <textarea class="w-100 form-control border-0 mb-4" rows="5" cols="10"
                                      name="notes" placeholder="Nhập ghi chú của bạn" required></textarea>

                            <button class="w-100 btn form-control border-secondary py-3 bg-white text-primary "
                                    type="submit">Submit
                            </button>
                        </form>
                    </div>
                    <div class="col-lg-5">
                        <div class="d-flex p-4 rounded mb-4 bg-white">
                            <i class="fas fa-map-marker-alt fa-2x text-primary me-4"></i>
                            <div>
                                <h4>Address</h4>
                                <p class="mb-2">123 Street New York.USA</p>
                            </div>
                        </div>
                        <div class="d-flex p-4 rounded mb-4 bg-white">
                            <i class="fas fa-envelope fa-2x text-primary me-4"></i>
                            <div>
                                <h4>Mail Us</h4>
                                <p class="mb-2">info@example.com</p>
                            </div>
                        </div>
                        <div class="d-flex p-4 rounded bg-white">
                            <i class="fa fa-phone-alt fa-2x text-primary me-4"></i>
                            <div>
                                <h4>Telephone</h4>
                                <p class="mb-2">(+012) 3456 7890</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
@endsection
