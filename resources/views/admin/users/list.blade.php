@extends('admin.master')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">@lang('message.user_list')</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            @can('crud-user')
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <a class="btn btn-success" href="{{ route('users.create') }}">@lang('message.add_new')</a>
                    </h6>
                </div>
            @endcan
            @if(session()->has('add_success'))
                {{ session()->get('add_success') }}
            @endif

            <div class="message-succsess"></div>
            <div class="card-body">

                <div class="table-responsive">
                    <div class="col-12 m-2">
                        {{ $users->links() }}
                    </div>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            @can('crud-user')
                                <th></th>
                            @endcan
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            @can('crud-user')
                                <th></th>
                            @endcan
                        </tr>
                        </tfoot>
                        <tbody>
                        @forelse($users as $user)
                            <tr class="user-item" id="user-{{$user->id}}">
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @forelse($user->roles as $role)
                                        {{ $role->name . ', ' }}
                                    @empty
                                        Chua phan quyen
                                    @endforelse
                                </td>
                                @can('crud-user')
                                    <td>

                                        <button type="button" data-id="{{ $user->id }}"
                                                class="btn btn-danger delete-user">
                                            @lang('message.delete_button')
                                        </button>

                                    </td>
                                @endcan
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">No data</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    {{ $users->links() }}
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
