@extends('backend.master')
@section('content')

    @section('site-title')
        Admin | Add News
    @endsection
    @section('page-main-title')
        Add News
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
                <form action="/admin/add-news" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        {{-- @if (Session::has('message'))
                            <p class="text-danger text-center">{{ Session::get('message') }}</p>
                        @endif --}}
                        <div class="card-body">

                            <div class="row">
                                <div class="mb-3 col-6">
                                    <input type="hidden" name="update_id" id="">
                                    <label for="formFile" class="form-label">Tiitle</label>
                                    <input class="form-control" type="text" name="title" />
                                </div>
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="formFile" class="form-label text-danger">Thumbnail</label>
                                    <input class="form-control" type="file" name="thumbnail" />
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="formFile" class="form-label text-danger">Banner</label>
                                    <input class="form-control" type="file" name="banner" />
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
                                    <textarea name="description" class="form-control" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="mb-3">
                                <input type="submit" class="btn btn-primary" value="Add News">
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection
