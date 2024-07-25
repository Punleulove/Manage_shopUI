@extends('backend.master')
@section('content')

    @section('site-title')
        Admin | Update Post
    @endsection
    @section('page-main-title')
        Update Product
    @endsection

    <!-- Content wrapper -->
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="col-xl-12">
                <!-- File input -->
                <form action="/admin/update-product-submit" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        @if (Session::has('message'))
                            <p class="text-danger text-center">{{ Session::get('message') }}</p>
                        @endif
                        <div class="card-body">

                            <input type="hidden" name="id" value="{{ $product[0]->id }}">
                            <input type="hidden" name="oldThumbnail" value="{{ $product[0]->thumbnail }}">

                            <div class="row">
                                <div class="mb-3 col-6">
                                    <label for="formFile" class="form-label">Name</label>
                                    <input class="form-control" type="text" name="name" value="{{ $product[0]->name }}" />
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="formFile" class="form-label">Quantity</label>
                                    <input class="form-control" type="text" name="qty" value="{{ $product[0]->quantity }}" />
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="formFile" class="form-label">Regular Price</label>
                                    <input class="form-control" type="number" name="regular_price" value="{{ $product[0]->regular_price }}" />
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="formFile" class="form-label">Sale Price</label>
                                    <input class="form-control" type="number" name="sale_price" value="{{ $product[0]->sale_price }}" />
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="formFile" class="form-label">Available Size</label>
                                    <select name="size[]" class="form-control size-color" multiple="multiple">
                                        @foreach ($attrSize as $sizeVal)
                                            @if (in_array($sizeVal, $size))
                                                <option selected value="{{ $sizeVal }}">{{ $sizeVal }}</option>
                                            @else
                                                <option value="{{ $sizeVal }}">{{ $sizeVal }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="formFile" class="form-label">Available Color</label>
                                    <select name="color[]" class="form-control size-color" multiple="multiple">
                                        @foreach ($attrColor as $colorVal)
                                            @if (in_array($colorVal, $color))
                                                <option selected value="{{ $colorVal }}">{{ $colorVal }}</option>
                                            @else
                                                <option value="{{ $colorVal }}">{{ $colorVal }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="formFile" class="form-label">Category</label>
                                    <select name="category" class="form-control">
                                        @foreach ($category as $catVal)
                                            @if ($catVal->id == $product[0]->category_id)
                                                <option selected value="{{ $catVal->id }}">{{ $catVal->name }}</option>
                                            @else
                                                <option value="{{ $catVal->id }}">{{ $catVal->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 col-4">
                                    <label for="formFile" class="form-label text-danger">Recommend image size ..x.. pixels.</label>
                                    <input class="form-control" type="file" name="thumbnail" />
                                </div>
                                <div class="mb-3 col-2">
                                    <img src="../../uploads/{{ $product[0]->thumbnail }}" width="80px">
                                </div>
                                <div class="mb-3 col-12">
                                    <label for="formFile" class="form-label text-danger">Description</label>
                                    <textarea name="description" class="form-control" cols="30" rows="10">{{ $product[0]->description }}</textarea>
                                </div>
                            </div>
                            <div class="mb-3">
                                <input type="submit" class="btn btn-primary" value="Update Post">
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection
