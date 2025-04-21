@extends('admin.layouts.master')
@section('title')
    Chi tiết giá trị thuộc tính
@endsection
@section('content')
    <div class="pagetitle">
        <h1>Chi tiết giá trị thuộc tính</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang quản trị</a></li>
                <li class="breadcrumb-item active">Chi tiết giá trị thuộc tính</li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <form method="post" action="{{ route('admin.properties.update', $property->id) }}"
              enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $property->name }}" required>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="attribute_id">Attribute</label>
                    <select id="attribute_id" name="attribute_id" class="form-control" required>
                        <option value="" selected>Choose...</option>
                        @foreach($attributes as $attribute)
                            <option {{ $property->attribute_id == $attribute->id ? 'selected' : '' }}
                                    value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="thumbnail">Thumbnail</label>
                    <input class="form-control" type="file" name="thumbnail" value="thumbnail">
                    <img src="{{ $property->thumbnail }}" width="100" class=" mt-2">
                </div>
                <div class="form-group col-md-4">
                    <label for="status">Status</label>
                    <select id="status" name="status" class="form-control" required>
                        <option value="" selected>Choose...</option>
                        <option {{ $property->status == \App\Enums\PropertyStatus::ACTIVE ? 'selected' : '' }}
                                value="{{ \App\Enums\PropertyStatus::ACTIVE }}">{{ \App\Enums\PropertyStatus::ACTIVE }}</option>
                        <option {{ $property->status == \App\Enums\PropertyStatus::INACTIVE ? 'selected' : '' }}
                                value="{{ \App\Enums\PropertyStatus::INACTIVE }}">{{ \App\Enums\PropertyStatus::INACTIVE }}</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Lưu thay đổi</button>
        </form>
    </section>
@endsection
