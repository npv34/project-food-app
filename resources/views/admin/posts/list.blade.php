@extends('admin.master')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">
            Danh sach bai viet
        </h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    <a class="btn btn-success" href="{{ route('posts.create') }}">Them moi</a>
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div class="form-group">
                        <div class="row" style="margin-left: 0">
                            <select class="form-control col-12 col-md-2" name="" id="">
                                <option value="">Chon tac vu</option>
                                <option value="">Delete</option>
                                <option value="">Update</option>
                            </select>
                            <button class="btn btn-primary">Apply</button>
                        </div>

                    </div>

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th><input type="checkbox" id="check-all-post"></th>
                            <th class="">STT</th>
                            <th>Title</th>
                            <th>Categories</th>
                            <th>Image</th>
                            <th>Desc</th>
                            <th>User</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th><input type="checkbox" id="check-all-post"></th>
                            <th class="">STT</th>
                            <th>Title</th>
                            <th>Categories</th>
                            <th>Image</th>
                            <th>Desc</th>
                            <th>User</th>
                            <th></th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @forelse($posts as $key => $post)
                            <tr>
                                <td><input type="checkbox"></td>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $post->title }}</td>
                                <td>
                                    @if($post->types->count() > 0)
                                        @foreach($post->types as $type)
                                            {{ $type->name . "," }}
                                        @endforeach
                                    @else
                                        {{ 'Chua phan loai' }}
                                    @endif
                                </td>
                                <td><img width="100" src="{{ asset('storage/' . $post->image) }}" alt=""></td>
                                <td>{{ $post->desc }}</td>
                                <td>{{ $post->user->name }}</td>
                                <td>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td>No data</td>
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
