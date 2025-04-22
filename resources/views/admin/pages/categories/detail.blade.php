@extends('admin.layouts.master')
@section('title')
    Chi tiết danh mục sản phẩm
@endsection
@section('content')
    <div class="pagetitle">
        <h1>Chi tiết danh mục sản phẩm</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang quản trị</a></li>
                <li class="breadcrumb-item active">Chi tiết danh mục sản phẩm</li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <form method="post" action="{{ route('admin.categories.update', $category->id) }}"
              enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="form-group col-md-8">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name"
                           value="{{ $category->name }}" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="status">Status</label>
                    <select id="status" required name="status" class="form-control">
                        <option value="" selected>Choose...</option>
                        <option {{ $category->status == \App\Enums\CategoryStatus::ACTIVE() ? 'selected' : '' }}
                                value="{{ \App\Enums\CategoryStatus::ACTIVE() }}">{{ \App\Enums\CategoryStatus::ACTIVE() }}</option>
                        <option {{ $category->status == \App\Enums\CategoryStatus::INACTIVE() ? 'selected' : '' }}
                                value="{{ \App\Enums\CategoryStatus::INACTIVE() }}">{{ \App\Enums\CategoryStatus::INACTIVE() }}</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Lưu thay đổi</button>
        </form>
    </section>
@endsection
