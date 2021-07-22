@extends('admin.master')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Danh sach mon an</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    <a class="btn btn-success" href="">Them moi</a>
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th></th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @forelse($foods as $food)
                            <tr>
                                <td>{{ $food->name }}</td>
                                <td><img src="{{ $food->image }}" alt=""></td>
                                <td>{{ $food->price }}</td>
                                <td>
                                    <a href="" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @empty
                        <tr>
                            <td colspan="4">No data</td>
                        </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
