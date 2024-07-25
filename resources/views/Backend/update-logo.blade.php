@extends('backend.master')
@section('content')

@section('site-title')
    Admin | Update Post
@endsection
@section('page-main-title')
    Update Logo
@endsection

<!-- Content wrapper -->
<div class="content-wrapper">

    @if (Session::has('unsccess'))
        <script>
            Swal.fire({
                title: "Good job!",
                text: "Not update !",
                icon: "error",
            });
        </script>
    @endif

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="col-xl-12">
            <!-- File input -->
            <form action="/admin/update-logo" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    @if (Session::has('message'))
                        <p class="text-danger text-center">{{ Session::get('message') }}</p>
                    @endif
                    <div class="card-body">
                        <input type="hidden" name="update_id" value="{{ $data->id }}">
                        <div class="row">
                            <div class="mb-2 col-12">
                                <img src="{{ url('Images/' . $data->thumbnail) }}" width="100px">
                            </div>
                            <div class="mb-3 col-12">
                                <label for="formFile" class="form-label text-danger">Recommend image size ..x..
                                    pixels.</label>
                                <input class="form-control" type="file" name="thumbnail" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="submit" class="btn btn-primary" value="Update Logo">
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection
