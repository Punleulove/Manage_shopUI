@extends('backend.master')
@section('content')

    @section('site-title')
        Admin | Update News
    @endsection
    @section('page-main-title')
      Update News
    @endsection

    <!-- Content wrapper -->
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
        @if (Session::has('success'))
        <script>
            Swal.fire({
                title: "Good job!",
                text: "insert Success !",
                icon: "success"
            });
        </script>
        @endif
        @if (Session::has('unsuccess'))
        <script>
            Swal.fire({
                title: " Error!",
                text: " wrong data!",
                icon: "error"
            });
        </script>

        @endif
            <div class="col-xl-12">
                <!-- File input -->
                <form action="/admin/update-news" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        {{-- @if (Session::has('message'))
                            <p class="text-danger text-center">{{ Session::get('message') }}</p>
                        @endif --}}
                        <div class="card-body">

                            <div class="row">
                                <div class="mb-3 col-6">
                                    <input type="text" name="update_id" value="{{$data->id}}" id="">
                                    <label for="formFile" class="form-label">Tiitle</label>
                                    <input class="form-control" value="{{$data->title}}" type="text" name="title" />
                                </div>
                                </div>

                                <div class="mb-3 col-6">
                                   <label for="formFile" class="form-label">Thumbnail</label>
                                     <input class="form-control" type="file" name="thumbnail" />
                                    <input type="text" name="old_thumbnail" id="" value="{{$data->thumbnail}}">
                                </div>
                                <div class="mb-3 col-6">
                                   <label for="formFile" class="form-label">Banner</label>
                                     <input class="form-control" type="file" name="banner" />
                                    <input type="text" name="old_banner" id="" value="{{$data->banner}}">
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="formFile" class="form-label">News Type</label>
                                    <select name="newstype" class="form-control size-color" multiple="multiple">
                                       <option value="Entertainment">Entertainment</option>
                                        <option value="Technology">Technology</option>
                                        <option value="Social life">Social life</option>
                                        <option value="Sport">Sport</option>
                                    </select>
                                </div>
                                <div class="mb-3 col-12">
                                    <label for="formFile" class="form-label text-danger">Description</label>
                                    <textarea name="description" class="form-control" value="" cols="30" rows="10">{{$data->description}}</textarea>
                                </div>
                            </div>
                            <div class="mb-3">
                                <input type="submit" class="btn btn-primary" value="Update News">
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection
