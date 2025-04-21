@extends('admin.layouts.master')
@section('title')
    Danh sách giá trị thuộc tính
@endsection
@section('content')
    <div class="pagetitle">
        <h1>Danh sách giá trị thuộc tính</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang quản trị</a></li>
                <li class="breadcrumb-item active">Danh sách giá trị thuộc tính</li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <table class="table table-hover">
            <colgroup>
                <col width="10%"/>
                <col width="x"/>
                <col width="20%"/>
                <col width="10%"/>
                <col width="10%"/>
            </colgroup>
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Attribute</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($properties as $property)
                <tr>
                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <td>{{ $property->name }}</td>
                    <td>{{ $property->attribute->name }}</td>
                    <td>{{ $property->status }}</td>
                    <td>
                        <div class="d-flex gap-2 justify-content-center">
                            <a href="{{ route('admin.properties.detail', $property->id) }}" class="btn btn-primary btn-sm">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="{{ route('admin.properties.delete', $property->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            @if(count($properties) == 0)
                <tr>
                    <td class="text-center" colspan="5">No data</td>
                </tr>
            @endif
            </tbody>
        </table>
    </section>
@endsection
