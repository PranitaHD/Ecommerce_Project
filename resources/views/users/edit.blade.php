@extends('dashboard')
@section('content')

<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fal fa-edit icon-gradient bg-ripe-malin"></i>
            </div>
            <div>Edit User
                <div class="page-title-subheading">Edit details in the following fields below with correct information.</div>
            </div>
        </div>
        <div class="page-title-actions">
            <div class="d-inline-block">
                <a href="{{route('users.create')}}" type="button" aria-haspopup="true" aria-expanded="false" class="btn-shadow btn btn-info">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fal fa-plus fa-w-20"></i>
                    </span>
                    Add Users
                </a>
                <a href="{{route('users.index')}}" type="button" aria-haspopup="true" aria-expanded="false" class="btn-shadow btn btn-info">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fal fa-pencil-alt fa-w-20"></i>
                    </span>
                    Manage Users
                </a>
            </div>
        </div>
    </div>
</div>

<div class="main-card mb-3 card">
    <div class="card-body">
        <h4 class="mt-2">
            <span>It only takes a <span class="text-success">few seconds</span> to edit details of a user.</span>
        </h4><br>
        <form method="post" action="{{route('users.update', $user->id)}}" id="signupForm" class="col-md-10 mx-auto" enctype="multipart/form-data">
            @method('POST')
            @csrf
            <div class="form-group">
                <h5 class="card-title">NAME</h5>
                <div><input name="name" id="name" type="text" class="form-control" value="{{$user->name}}"></div>
            </div>
            <div class="form-group">
                <h5 class="card-title">EMAIL</h5>
                <div><input name="email" id="email" type="email" class="form-control" value="{{$user->email}}"></div>
            </div>
            <div class="form-group">
                <h5 class="card-title">PASSWORD</h5>
                <div>
                    <input name="password" id="password" type="password" class="form-control" value="{{$user->password}}" crypt="bcrypt">
                    {{-- <i class="far fa-eye" id="togglePassword"></i> --}}
                    <div class="form-check">
                        <input type="checkbox" id="agree" name="agree" value="agree" class="form-check-input" onclick="showPassword()">
                        <label class="form-check-label">Show Password</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <h5 class="card-title">MOBILE</h5>
                <div><input name="mobile" id="mobile" type="number" class="form-control" value="{{$user->mobile}}"></div>
            </div>
            <div class="form-group">
                <h5 class="card-title">ADDRESS</h5>
                <div><input name="address" id="address" class="form-control" value="{{$user->address}}"></div>
            </div>
            <div class="form-group">
                <h5 class="card-title">COUNTRY</h5>
                <div>
                    <select name="country_id" id="country-dd" class="form-control">
                        <option value="" class="option_color">Select Country</option>
                        @foreach ($countries as $data)
                            <option value="{{$data->id}}" {{$user->country_id == $data->id  ? 'selected' : ''}}>
                                {{$data->name}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <h5 class="card-title">STATE</h5>
                <div>
                    <select name="state_id" id="state-dd" class="form-control">
                        <option value="" class="option_color">Select State</option>
                        @foreach ($states as $data)
                            <option value="{{$data->id}}" {{$user->state_id == $data->id  ? 'selected' : ''}}>
                                {{$data->name}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <h5 class="card-title">CITY</h5>
                <div>
                    <select name="city_id" id="city-dd" class="form-control">
                        <option value="" class="option_color">Select City</option>
                        @foreach ($cities as $data)
                            <option value="{{$data->id}}" {{$user->city_id == $data->id  ? 'selected' : ''}}>
                                {{$data->name}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <h5 class="card-title">PIN CODE</h5>
                <div><input name="pincode" id="pincode" type="number" class="form-control" value="{{$user->pincode}}"></div>
            </div>
            <div class="form-group">
                <h5 class="card-title">ROLE</h5>
                <div>
                    <select name="role_id" id="role_id" class="form-control">
                        <option value="" class="option_color">Select Role</option>
                        @foreach ($roles as $role )
                            <option value="{{$role->id}}" {{$user->role_id == $role->id  ? 'selected' : ''}}>{{$role->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <h5 class="card-title">Profile</h5>
                <div>
                    <input type="file" name="image" id="image" class="form-control-file">
                    <img src="/user_images/{{$user->image}}" width="300px">
                </div>
            </div>
            <div class="form-group">
                <div class="modal-footer d-block text-center">
                    <button class="btn-wide btn-pill btn-shadow btn-hover-shine btn btn-primary btn-lg btn-gradient-primary">Update User Details</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
