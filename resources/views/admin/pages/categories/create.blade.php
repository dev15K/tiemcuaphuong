@extends('admin.layouts.master')
@section('title')
    Thêm mới danh mục sản phẩm
@endsection
@section('content')
    <div class="pagetitle">
        <h1>Thêm mới danh mục sản phẩm</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang quản trị</a></li>
                <li class="breadcrumb-item active">Thêm mới danh mục sản phẩm</li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <form method="post" action="{{ route('admin.categories.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form-group col-md-8">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="status">Status</label>
                    <select id="status" required name="status" class="form-control">
                        <option value="" selected>Choose...</option>
                        <option
                            value="{{ \App\Enums\CategoryStatus::ACTIVE() }}">{{ \App\Enums\CategoryStatus::ACTIVE() }}</option>
                        <option
                            value="{{ \App\Enums\CategoryStatus::INACTIVE() }}">{{ \App\Enums\CategoryStatus::INACTIVE() }}</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Thêm mới</button>
        </form>
    </section>
@endsection
