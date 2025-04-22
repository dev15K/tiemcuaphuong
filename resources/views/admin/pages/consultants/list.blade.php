@extends('admin.layouts.master')
@section('title')
    Danh sách Book Tour & Làm giấy thông hành
@endsection
@section('content')
    <div class="pagetitle">
        <h1>Danh sách Book Tour & Làm giấy thông hành</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang quản trị</a></li>
                <li class="breadcrumb-item active">Danh sách Book Tour & Làm giấy thông hành</li>
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
                <col width="30%">
                <col width="10%">
                <col width="10%">
            </colgroup>
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Full Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Service Required</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($consultants as $consultant)
                <tr>
                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <td>{{ $consultant->full_name }}</td>
                    <td>{{ $consultant->email }}</td>
                    <td>{{ $consultant->phone }}</td>
                    <td>{{ $consultant->service_required }}</td>
                    <td>{{ $consultant->status }}</td>
                    <td>
                        <div class="d-flex gap-2 justify-content-center">
                            <a href="{{ route('admin.consultants.detail', $consultant->id) }}"
                               class="btn btn-primary btn-sm">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="{{ route('admin.consultants.delete', $consultant->id) }}" method="post">
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
            @if(count($consultants) == 0)
                <tr>
                    <td class="text-center" colspan="7">No data</td>
                </tr>
            @endif
            </tbody>
        </table>
        {{ $consultants->links('pagination::bootstrap-5') }}
    </section>
@endsection
