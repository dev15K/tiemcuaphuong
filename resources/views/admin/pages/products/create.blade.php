@extends('admin.layouts.master')
@section('title')
    Thêm mới sản phẩm
@endsection
@section('content')
    <div class="pagetitle">
        <h1>Thêm mới sản phẩm</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang quản trị</a></li>
                <li class="breadcrumb-item active">Thêm mới sản phẩm</li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <form method="post" action="" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Tên sản phẩm</label>
                <input type="text" class="form-control" id="name" placeholder="Enter name"
                       value="" name="name" required>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="price">Giá cũ</label>
                    <input type="number" min="1" class="form-control form_input_"
                           value="" id="price" name="price" required/>
                </div>
                <div class="form-group col-md-4">
                    <label for="sale_price">Giá mới</label>
                    <input type="number" min="1" class="form-control form_input_"
                           value="" id="sale_price" name="sale_price" required/>
                </div>
                <div class="form-group col-md-4">
                    <label for="quantity">Số lượng</label>
                    <input type="number" min="1" class="form-control form_input_"
                           value="" id="quantity" name="quantity" required/>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="unit">Unit</label>
                    <input type="text" class="form-control"
                           value="" id="unit" name="unit" required/>
                </div>
                <div class="form-group col-md-6">
                    <label for="origin">Origin</label>
                    <input type="text" class="form-control"
                           value="" id="origin" name="origin" required/>
                </div>
            </div>

            <div class="form-group">
                <label for="short_description">Mô tả ngắn</label>
                <textarea class="form-control tinymce-editor" id="short_description" name="short_description"
                          rows="10"></textarea>
            </div>

            <div class="form-group">
                <label for="description">Mô tả</label>
                <textarea class="form-control tinymce-editor" id="description" name="description"
                          rows="10"></textarea>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="product_date">Product date</label>
                    <input type="date" class="form-control"
                           value="" id="product_date" name="product_date" required/>
                </div>
                <div class="form-group col-md-6">
                    <label for="expiry_date">Expiry date</label>
                    <input type="date" class="form-control"
                           value="" id="expiry_date" name="expiry_date" required/>
                </div>
            </div>

            <div class="form-group">
                <label for="usage_instructions">Hướng dẫn sử dụng</label>
                <textarea class="form-control" id="usage_instructions" name="usage_instructions"
                          rows="10"></textarea>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="file">Hình ảnh</label>
                    <input type="file" class="form-control form_input_" id="thumbnail"
                           name="thumbnail" required/>
                </div>
                <div class="form-group col-md-6">
                    <label for="file">Hình ảnh chi tiết</label>
                    <input type="file" class="form-control form_input_" id="gallery"
                           name="gallery" multiple required/>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="category_id">Category</label>
                    <select id="category_id" name="category_id" class="form-control">
                        <option value="" selected>Choose...</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="status">Status</label>
                    <select id="status" name="status" class="form-control">
                        <option value="" selected>Choose...</option>
                        <option
                            value="{{ \App\Enums\ProductStatus::ACTIVE() }}">{{ \App\Enums\ProductStatus::ACTIVE() }}</option>
                        <option
                            value="{{ \App\Enums\ProductStatus::INACTIVE() }}">{{ \App\Enums\ProductStatus::INACTIVE() }}</option>
                    </select>
                </div>
            </div>

            <div class="row mt-3">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <label>
                        Thông tin sản phẩm
                    </label>

                    <button class="btn btn-outline-primary btn-sm"
                            type="button" onClick="addTableOption()">Thêm giá trị thuộc tính
                    </button>
                </div>
                <div id="render_table_attr">

                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-2">Thêm mới</button>
        </form>
    </section>

    <script>
        const attributes = {!! json_encode($attributes) !!};

        const htmlTableOption = `<table class="table table-bordered">
                        <colgroup>
                            <col width="x"/>
                            <col width="10%"/>
                            <col width="10%"/>
                            <col width="10%"/>
                            <col width="5%"/>
                        </colgroup>
                        <thead>
                        <tr>
                            <th class="align-middle">
                                <div class="d-flex align-items-center gap-4">
                                    <p>Thuộc tính</p>
                                    <button type="button" class="btn btn-outline-warning btn-sm"
                                            onclick="addProperty(this)">Thêm
                                    </button>
                                </div>
                            </th>
                            <th>Số lượng</th>
                            <th>Giá cũ</th>
                            <th>Giá mới</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <div class="list_option">
                                    <div class="row attribute_property_item_">
                                        <div class="form-group col-md-5">
                                            <label for="attribute_item">Thuộc tính</label>
                                            <select name="attribute_item" class="form-select form_input_" onchange="getPropertyByAttribute(this)">
                                                <option value="">-- Chọn thuộc tính --</option>
                                                ${attributes.map((attribute) => `<option value="${attribute.id}">${attribute.name}</option>`).join('')}
                                            </select>
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label for="property_item">Giá trị thuộc tính</label>
                                            <select name="property_item" class="form-select form_input_">
                                                <option value="">-- Chọn giá trị thuộc tính --</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2 mt-4">
                                            <button type="button" onclick="removePropertyItem(this)" class="btn btn-danger">Xoá</button>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <input type="number" min="1" class="form-control form_input_" name="option_quantity"
                                       required/>
                            </td>
                            <td>
                                <input type="number" class="form-control form_input_" name="option_price" min="1"
                                       required/>
                            </td>
                            <td>
                                <input type="number" class="form-control form_input_" name="option_sale_price" min="1"
                                       required/>
                            </td>
                            <td rowSpan="3" class="text-center align-middle">
                                <button class="btn btn-danger btn-sm" onclick="removeTableOption(this)"
                                        type="button">Xoá
                                </button>
                            </td>
                        </tr>
                        </tbody>
                    </table>`;

        $(document).ready(function () {
            $('#render_table_attr').append(htmlTableOption);
        })

        function addTableOption() {
            $('#render_table_attr').append(htmlTableOption);
        }

        function getPropertyByAttribute(el) {
            let attr = $(el).val();

            getListProperty(attr, el);
        }

        function generatePropertyItem(array_attr) {
            return `<div class="row attribute_property_item_">
                <div class="form-group col-md-5">
                    <label for="attribute_item">Thuộc tính</label>
                    <select name="attribute_item" class="form-select form_input_" onchange="getPropertyByAttribute(this)">
                        <option value="">-- Chọn thuộc tính --</option>
                        ${attributes.filter((attribute) => !array_attr.includes(attribute.id))
                .map((attribute) => `<option value="${attribute.id}">${attribute.name}</option>`)
                .join('')}
                    </select>
                </div>
                <div class="form-group col-md-5">
                    <label for="property_item">Giá trị thuộc tính</label>
                    <select name="property_item" class="form-select form_input_">
                        <option value="">-- Chọn giá trị thuộc tính --</option>
                    </select>
                </div>
                <div class="col-md-2 mt-4">
                    <button type="button" onclick="removePropertyItem(this)" class="btn btn-danger">Xoá</button>
                </div>
            </div>`;
        }

        function addProperty(el) {
            let array_attr = [];
            $(el).closest('table').find('.list_option .attribute_property_item_').each(function () {
                let attr = $(this).find('select[name="attribute_item"]').val();
                attr = parseInt(attr);
                array_attr.push(attr)
            })

            array_attr = array_attr.filter(onlyUnique);
            $(el).closest('table').find('.list_option').append(generatePropertyItem(array_attr));
        }

        function onlyUnique(value, index, array) {
            return array.indexOf(value) === index;
        }

        function removePropertyItem(el) {
            $(el).closest('.attribute_property_item_').remove();
        }

        function removeTableOption(el) {
            $(el).closest('table').remove();
        }

        async function getListProperty(attribute_id, el) {
            let url = '{{ route('api.properties.list') }}?attribute_id=' + attribute_id;

            await $.ajax({
                url: url,
                type: 'GET',
                async: false,
                success: function (data, textStatus) {
                    renderProperty(el, data.data);
                },
                error: function (request, status, error) {
                    let data = JSON.parse(request.responseText);
                    alert(data.message);
                }
            });
        }

        function renderProperty(el, data) {
            let html = '';
            for (let i = 0; i < data.length; i++) {
                html += `<option value="${data[i].id}">${data[i].name}</option>`;
            }
            $(el).parent().next().find('select[name="property_item"]').html(html);
        }
    </script>
@endsection
