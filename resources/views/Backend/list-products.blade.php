@extends('backend.master')
@section('content')
    <div class="content-wrapper">
    @section('site-title')
        Admin | List Post
    @endsection
    @section('page-main-title')
        List Post
    @endsection

    <div class="container-xxl flex-grow-1 container-p-y">
        @if (Session::has('success'))
            <script>
                Swal.fire({
                    title: "Good job!",
                    text: "Update Success !",
                    icon: "success"
                });
            </script>
        @endif
        <div class="card">
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>name</th>
                            <th>stock</th>
                            <th>regular price</th>
                            <th>discount</th>
                            <th>Sale Price</th>
                            <th>color</th>
                            <th>size</th>
                            <th>category</th>
                            <th>User</th>
                            <th>thumbnail</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($data as $item)
                            <tr>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                <strong>{{ $item->name }}</strong></td>
                                <td>{{ $item->stock_qty }}</td>
                                <td>{{ $item->regular_price }}$</td>
                                <td>{{ $item->discount }}%</td>
                                <td>{{ $item->sale_price }}$</td>
                                <td>{{ $item->color }}</td>
                                <td>{{ $item->size }}</td>
                                <td>{{ $item->cateName }}</td>
                                <td>{{ $item->userName }}</td>
                                <td>
                                    <img src="{{ url('Images/' . $item->thumbnail) }}" alt="" width="80px">
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item"
                                                href="/admin/update-product/{{ $item->id }}"><i
                                                    class="bx bx-edit-alt me-1"></i> Edit</a>
                                            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#basicModal"
                                                id="remove-post-key" data-value="{{ $item->id }}"
                                                href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-3">
            <form action="/admin/delete-product" method="post">
                @csrf
                <div class="modal fade" id="basicModal" tabindex="-1" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">Are you sure to remove this post?</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-footer">
                                <input type="text" id="remove-val" name="remove_id">
                                <button type="submit" class="btn btn-danger">Confirm</button>
                                <button type="button" class="btn btn-outline-secondary"
                                    data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
            </form>
        </div>

        <hr class="my-5" />
    </div>
    <!-- / Content -->
</div>
</div>

@endsection
