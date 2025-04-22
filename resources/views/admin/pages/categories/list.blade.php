@extends('admin.layouts.master')
@section('title')
    Danh sách danh mục sản phẩm
@endsection
@section('content')
    <div class="pagetitle">
        <h1>Danh sách danh mục sản phẩm</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang quản trị</a></li>
                <li class="breadcrumb-item active">Danh sách danh mục sản phẩm</li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <table class="table table-hover">
            <colgroup>
                <col width="10%"/>
                <col width="x"/>
                <col width="10%"/>
                <col width="10%"/>
            </colgroup>
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->status }}</td>
                    <td>
                        <div class="d-flex gap-2 justify-content-center">
                            <a href="{{ route('admin.categories.detail', $category->id) }}"
                               class="btn btn-primary btn-sm">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="{{ route('admin.categories.delete', $category->id) }}" method="post">
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
            @if(count($categories) == 0)
                <tr>
                    <td class="text-center" colspan="4">No data</td>
                </tr>
            @endif
            </tbody>
        </table>
        {{ $categories->links('pagination::bootstrap-5') }}
    </section>
@endsection
