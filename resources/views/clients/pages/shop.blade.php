@extends('clients.layouts.master')
@section('title')
    Cửa hàng
@endsection
@section('content')
    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Cửa hàng</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item active text-white">Cửa hàng</li>
        </ol>
    </div>
    <!-- Single Page Header End -->

    <!-- Fruits Shop Start-->
    <div class="container-fluid fruite py-5">
        <div class="container py-5">
            <h1 class="mb-4">Cửa hàng</h1>
            <div class="row g-4">
                <div class="col-lg-12">
                    <div class="row g-4">
                        <div class="col-xl-3">
                            <div class="input-group w-100 mx-auto d-flex">
                                <input type="text" name="keyword" class="form-control p-3"
                                       placeholder="Nhập từ khóa tìm kiếm..."
                                       aria-describedby="search-icon-1">
                                <span id="search-icon-1" class="input-group-text p-3"><i
                                        class="fa fa-search"></i></span>
                            </div>
                        </div>
                        <div class="col-6"></div>
                        <div class="col-xl-3">
                            <div class="bg-light ps-3 py-3 rounded d-flex justify-content-between mb-4">
                                <label for="sort_by">Sắp xếp mặc định:</label>
                                <select id="sort_by" name="sort_by" class="border-0 form-select-sm bg-light me-3">
                                    <option value="desc">Từ cao đến thấp</option>
                                    <option value="asc">Từ thấp đến cao</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row g-4">
                        <div class="col-lg-3">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <h4>Categories</h4>
                                        <ul class="list-unstyled fruite-categorie">
                                            @foreach($categories as $category)
                                                <li>
                                                    <div class="d-flex justify-content-between fruite-name">
                                                        <a href="?category={{ $category->id }}">
                                                            {{ $category->name }}
                                                        </a>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <h4 class="mb-2">Price</h4>
                                        <input type="range" class="form-range w-100" id="rangeInput" name="rangeInput"
                                               min="0" max="500" value="0" oninput="amount.value=rangeInput.value">
                                        <output id="amount" name="amount"
                                                for="rangeInput">0
                                        </output>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    @foreach($attributes as $attribute)
                                        @if(count($attribute['properties']) > 0)
                                            <div class="mb-3">
                                                <h5>{{ $attribute['name'] }}</h5>
                                                @foreach($attribute['properties'] as $property)
                                                    <div class="mb-2">
                                                        <input type="radio" class="me-2"
                                                               id="{{ $attribute['name'] }}-{{ $property['name'] }}"
                                                               name="{{ $attribute['name'] }}-{{ $property['name'] }}"
                                                               value="{{ $attribute['name'] }}-{{ $property['name'] }}">
                                                        <label
                                                            for="{{ $attribute['name'] }}-{{ $property['name'] }}">{{ $property['name'] }}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-lg-12">
                                    <h4 class="mb-3">Sản phẩm mới nhất</h4>
                                    @foreach($news_products as $news_product)
                                        <div class="d-flex align-items-center justify-content-start">
                                            <div class="rounded me-4" style="width: 100px; height: 100px;">
                                                <img src="img/featur-1.jpg" class="img-fluid rounded" alt="">
                                            </div>
                                            <div>
                                                <h6 class="mb-2">Big Banana</h6>
                                                <div class="d-flex mb-2">
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="d-flex mb-2">
                                                    <h5 class="fw-bold me-2">2.99 $</h5>
                                                    <h5 class="text-danger text-decoration-line-through">4.11 $</h5>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="col-lg-12">
                                    <div class="position-relative">
                                        <img src="{{ asset('clients/img/banner-fruits.jpg') }}"
                                             class="img-fluid w-100 rounded" alt="">
                                        <div class="position-absolute"
                                             style="top: 50%; right: 10px; transform: translateY(-50%);">
                                            {{--                                            <h3 class="text-secondary fw-bold">Fresh <br> Fruits <br> Banner</h3>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="row g-4 justify-content-center">
                                @foreach($products as $product)
                                    @include('inc.product-item', ['product' => $product])
                                @endforeach

                                <div class="col-12">
                                    {{ $products->links('pagination::bootstrap-5') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fruits Shop End-->
@endsection
