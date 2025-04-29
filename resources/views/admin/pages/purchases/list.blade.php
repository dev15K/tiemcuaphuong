@extends('admin.layouts.master')
@section('title')
    Danh sách đơn đặt hàng
@endsection
@section('content')
    <div class="pagetitle">
        <h1>Danh sách đơn đặt hàng</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang quản trị</a></li>
                <li class="breadcrumb-item active">Danh sách đơn đặt hàng</li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <table class="table table-hover">
            <colgroup>
                <col width="5%">
                <col width="x">
                <col width="10%">
                <col width="10%">
                <col width="10%">
                <col width="10%">
                <col width="10%">
                <col width="10%">
            </colgroup>
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Họ và tên</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Product</th>
                <th scope="col">Quantity</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($purchases as $purchase)
                <tr>
                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <td>{{ $purchase->full_name }}</td>
                    <td>{{ $purchase->email }}</td>
                    <td>{{ $purchase->phone }}</td>
                    <td>
                        <a href="{{ $purchase->product_link }}" class="btn btn-sm btn-success">
                            <i class="bi bi-eye"></i> Xem sản phẩm</a>
                    </td>
                    <td>{{ $purchase->quantity }}</td>
                    <td>{{ $purchase->status }}</td>
                    <td>
                        <div class="d-flex gap-2 justify-content-center">
                            <a href="{{ route('admin.purchases.detail', $purchase->id) }}"
                               class="btn btn-primary btn-sm">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="{{ route('admin.purchases.delete', $purchase->id) }}" method="post">
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
            @if(count($purchases) == 0)
                <tr>
                    <td class="text-center" colspan="8">No data</td>
                </tr>
            @endif
            </tbody>
        </table>
        {{ $purchases->links('pagination::bootstrap-5') }}
    </section>
@endsection
