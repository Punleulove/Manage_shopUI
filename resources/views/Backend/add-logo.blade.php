@extends('backend.master')
@section('content')

@section('site-title')
    Admin | Add Post
@endsection
@section('page-main-title')
    Add Logo
@endsection

@if (Session::has('success'))
    <script>
        Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Your work has been saved",
            showConfirmButton: false,
            timer: 1500
        });
    </script>
@endif

<!-- Content wrapper -->
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="col-xl-12">
            <!-- File input -->
            <form action="/admin/add-logo" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    @if (Session::has('message'))
                        <p class="text-danger text-center">{{ Session::get('message') }}</p>
                    @endif
                    <div class="card-body">

                        <div class="row">
                            <div class="mb-3 col-12">
                                <label for="formFile" class="form-label text-danger">Recommend image size ..x..
                                    pixels.</label>
                                <input class="form-control" type="file" name="thumbnail" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="submit" class="btn btn-primary" value="Add Post">
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection
