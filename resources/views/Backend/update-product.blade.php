@extends('backend.master')
@section('content')

    @section('site-title')
        Admin | Update Product
    @endsection
    @section('page-main-title')
       Update Product
    @endsection

    <!-- Content wrapper -->
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">


        @if (Session::has('unsuccess'))
        <script>
            Swal.fire({
                title: " Error!",
                text: "update faild!",
                icon: "error"
            });
        </script>

        @endif
            <div class="col-xl-12">
                <!-- File input -->
                <form action="/admin/update-product" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        {{-- @if (Session::has('message'))
                            <p class="text-danger text-center">{{ Session::get('message') }}</p>
                        @endif --}}
                        <div class="card-body">

                            <div class="row">
                                <div class="mb-3 col-6">
                                    <input type="text" name="update_id" value="{{$data->id}}" id="">
                                    <label for="formFile" class="form-label">Name</label>
                                    <input class="form-control" value="{{$data->name}}" type="text" name="name" />
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="formFile" class="form-label">Quantity</label>
                                    <input class="form-control" value="{{$data->stock_qty}}" type="text" name="qty" />
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="formFile" class="form-label">Regular Price</label>
                                    <input class="form-control" value="{{$data->regular_price}}" type="number" name="regular_price" />
                                </div>
                                 <div class="mb-3 col-6">
                                    <label for="formFile" class="form-label">Discount</label>
                                    <select name="discount" class="form-control size-color" multiple="multiple">
                                        <option value="0" @if($data->discount==0)
                                              selected
                                        @endif>0%</option>
                                         <option value="5" @if($data->discount==5)
                                              selected
                                        @endif>5%</option>
                                         <option value="10" @if($data->discount==10)
                                              selected
                                        @endif>10%</option>
                                         <option value="20" @if($data->discount==20)
                                              selected
                                        @endif>20%</option>
                                    </select>
                                </div>

                                <div class="mb-3 col-6">
                                    <label for="formFile" class="form-label">Available Size</label>
                                    <select name="size[]" class="form-control size-color" multiple="multiple">
                                        <option value="S">S</option>
                                        <option value="M">M</option>
                                        <option value="L">L</option>
                                        <option value="XL">XL</option>
                                    </select>
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="formFile" class="form-label">Available Color</label>
                                    <select name="color[]" class="form-control size-color" multiple="multiple">
                                        <option value="Red">Red</option>
                                        <option value="Blue">Blue</option>
                                        <option value="Grey">Grey</option>
                                        <option value="Black">Black</option>
                                    </select>
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="formFile" class="form-label">Category</label>
                                    <select name="category" class="form-control">
                                         @foreach ($category as $item){
                                            <option value="{{$item->id}}" @if($data->category_id==$item->id)
                                              selected
                                              @endif>{{$item->thumbnail}}</option>
                                         }
                                         @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="formFile" class="form-label text-danger">Recommend image size ..x.. pixels.</label>
                                    <input class="form-control" type="file" name="thumbnail" />
                                    <input type="text" name="old_thumbnail" id="" value="{{$data->thumbnail}}">

                                </div>
                                <div class="mb-3 col-12">
                                    <label for="formFile" class="form-label text-danger">Description</label>
                                    <textarea name="description"  class="form-control" cols="30" rows="10">{{$data->description}}</textarea>
                                </div>
                            </div>
                            <div class="mb-3">
                                <input type="submit" class="btn btn-primary" value="Update product">
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection
