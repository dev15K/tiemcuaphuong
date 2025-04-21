@extends('admin.layouts.master')
@section('title')
    Chi tiết thuộc tính
@endsection
@section('content')
    <div class="pagetitle">
        <h1>Chi tiết thuộc tính</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang quản trị</a></li>
                <li class="breadcrumb-item active">Chi tiết thuộc tính</li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <form method="post" action="{{ route('admin.attributes.update', $attribute->id) }}"
              enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="form-group col-md-8">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name"
                           value="{{ $attribute->name }}" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="status">Status</label>
                    <select id="status" name="status" class="form-control" required>
                        <option value="" selected>Choose...</option>
                        <option {{ $attribute->status == \App\Enums\AttributeStatus::ACTIVE ? 'selected' : '' }}
                                value="{{ \App\Enums\AttributeStatus::ACTIVE }}">{{ \App\Enums\AttributeStatus::ACTIVE }}</option>
                        <option {{ $attribute->status == \App\Enums\AttributeStatus::INACTIVE ? 'selected' : '' }}
                                value="{{ \App\Enums\AttributeStatus::INACTIVE }}">{{ \App\Enums\AttributeStatus::INACTIVE }}</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Lưu thay đổi</button>
        </form>
    </section>
@endsection
