@extends('admin.layouts.master')
@section('title')
    Danh sách sản phẩm
@endsection
@section('content')
    <div class="pagetitle">
        <h1>Danh sách sản phẩm</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang quản trị</a></li>
                <li class="breadcrumb-item active">Danh sách sản phẩm</li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <table class="table table-hover">
            <colgroup>
                <col width="5%">
                <col width="10%">
                <col width="x">
                <col width="8%">
                <col width="8%">
                <col width="15%">
                <col width="8%">
                <col width="8%">
                <col width="10%">
            </colgroup>
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Thumbnail</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Sale price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Category</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <td>
                        <img src="{{ $product->thumbnail }}" alt="{{ $product->name }}"
                             style="max-width: 100px; object-fit: cover">
                    </td>
                    <td>{{ $product->name }}</td>
                    <td>{{ number_format($product->price) }} VND</td>
                    <td>{{ number_format($product->sale_price) }} VND</td>
                    <td>{{ number_format($product->quantity) }} {{ $product->unit }}</td>
                    <td>{{ $product->categories->name }}</td>
                    <td>{{ $product->status }}</td>
                    <td>
                        <div class="d-flex gap-2 justify-content-center">
                            <a href="{{ route('admin.products.detail', $product->id) }}" class="btn btn-primary btn-sm">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="{{ route('admin.products.delete', $product->id) }}" method="post">
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
            @if(count($products) == 0)
                <tr>
                    <td class="text-center" colspan="10">No data</td>
                </tr>
            @endif
            </tbody>
        </table>
        {{ $products->links('pagination::bootstrap-5') }}
    </section>
@endsection
