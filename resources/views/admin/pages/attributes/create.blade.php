@extends('admin.layouts.master')
@section('title')
    Thêm mới thuộc tính
@endsection
@section('content')
    <div class="pagetitle">
        <h1>Thêm mới thuộc tính</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang quản trị</a></li>
                <li class="breadcrumb-item active">Thêm mới thuộc tính</li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <form method="post" action="{{ route('admin.attributes.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form-group col-md-8">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="status">Status</label>
                    <select id="status" name="status" class="form-control" required>
                        <option value="" selected>Choose...</option>
                        <option value="{{ \App\Enums\AttributeStatus::ACTIVE }}">{{ \App\Enums\AttributeStatus::ACTIVE }}</option>
                        <option value="{{ \App\Enums\AttributeStatus::INACTIVE }}">{{ \App\Enums\AttributeStatus::INACTIVE }}</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Thêm mới</button>
        </form>
    </section>
@endsection
