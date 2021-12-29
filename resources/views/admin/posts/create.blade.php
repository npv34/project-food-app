@extends('admin.master')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h1 class="h3 mb-2 text-gray-800">Thêm mới bài viết</h1>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" name="title" class="form-control" id="" aria-describedby="emailHelp" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="">Desc</label>
                            <input type="text" name="desc" class="form-control" id="" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="">Content</label>
                            <textarea class="form-control" id="" rows="3" name="content_post"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection
