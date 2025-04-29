@extends('admin.layouts.master')
@section('title')
    Chi tiết Book Tour & Làm giấy thông hành
@endsection
@section('content')
    <div class="pagetitle">
        <h1>Chi tiết Book Tour & Làm giấy thông hành</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang quản trị</a></li>
                <li class="breadcrumb-item active">Chi tiết Book Tour & Làm giấy thông hành</li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <form method="post" action="{{ route('admin.consultants.update', $consultant->id) }}"
              enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="full_name">Họ và tên</label>
                <input type="text" class="form-control" id="full_name" value="{{ $consultant->full_name }}">
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" value="{{ $consultant->email }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="phone">Số điện thoại</label>
                    <input type="text" class="form-control" id="phone" value="{{ $consultant->phone }}">
                </div>
            </div>
            <div class="form-group">
                <label for="notes">Ghi chú</label>
                <textarea name="notes" id="notes" class="form-control"
                          rows="10">{{ $consultant->notes }}</textarea>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <div class="form-group">
                        <label for="service_required">Dịch vụ</label>
                        <input type="text" class="form-control" id="service_required"
                               value="{{ $consultant->service_required }}">
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="status">Trạng thái</label>
                    <select id="status" name="status" class="form-control">
                        <option {{ $consultant->status == \App\Enums\ConsultantStatus::PENDING() ? 'selected' : '' }}
                                value="{{ \App\Enums\ConsultantStatus::PENDING() }}">{{ \App\Enums\ConsultantStatus::PENDING() }}</option>
                        <option {{ $consultant->status == \App\Enums\ConsultantStatus::PROCESSING() ? 'selected' : '' }}
                                value="{{ \App\Enums\ConsultantStatus::PROCESSING() }}">{{ \App\Enums\ConsultantStatus::PROCESSING() }}</option>
                        <option {{ $consultant->status == \App\Enums\ConsultantStatus::CONFIRMED() ? 'selected' : '' }}
                                value="{{ \App\Enums\ConsultantStatus::CONFIRMED() }}">{{ \App\Enums\ConsultantStatus::CONFIRMED() }}</option>
                        <option {{ $consultant->status == \App\Enums\ConsultantStatus::COMPLETED() ? 'selected' : '' }}
                                value="{{ \App\Enums\ConsultantStatus::COMPLETED() }}">{{ \App\Enums\ConsultantStatus::COMPLETED() }}</option>
                        <option {{ $consultant->status == \App\Enums\ConsultantStatus::CANCELED() ? 'selected' : '' }}
                                value="{{ \App\Enums\ConsultantStatus::CANCELED() }}">{{ \App\Enums\ConsultantStatus::CANCELED() }}</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Lưu thay đổi</button>
        </form>
    </section>
@endsection
