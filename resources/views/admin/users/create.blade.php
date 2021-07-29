@extends('admin.master')
@section('content')
    <div class="container-fluid">

        <div class="card">
            <h5 class="card-header">Add new user</h5>
            <div class="card-body">
                <form method="post" action="{{ route('users.store') }}">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" value="{{ old('name') }}" name="name"
                               class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                               id="exampleInputEmail1"
                               aria-describedby="emailHelp"
                        >
                        @error('email')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend" id="icon-eye-password">
                                <div class="input-group-text">
                                    <i class="fas fa-eye-slash" id="icon-eye"></i>
                                </div>
                            </div>
                            <input type="password" name="password" class="form-control" id="inputPassword"
                            >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password Confirmed</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-eye-slash" ></i>
                                </div>
                            </div>
                            <input type="password" name="password_confirmed" class="form-control"
                                   id="exampleInputPassword1"
                            >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Role</label>
                        <div class="col-sm-10 ">
                            @foreach($roles as $role)
                                <div class="form-check mt-2">
                                    <input class="form-check-input" name="roles[{{$role->id}}]" type="checkbox"
                                           value="{{$role->id}}" id="roleCheck{{$role->id}}">
                                    <label class="form-check-label" for="roleCheck{{$role->id}}">
                                        {{ $role->name }}
                                    </label>
                                </div>

                            @endforeach
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>

@endsection
