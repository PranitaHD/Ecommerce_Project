@extends('dashboard')
@section('content')

@if(session('userAdded'))
    <div class="alert alert-success d-flex align-items-center" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Success:">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </svg>&nbsp;&nbsp;
        <div><strong>{{session('userAdded')}}</strong></div>
    </div><br>
@endif

<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fal fa-plus icon-gradient bg-ripe-malin"></i>
            </div>
            <div>Add Users
                <div class="page-title-subheading">Enter all valid details in the following fields below.</div>
            </div>
        </div>
        <div class="page-title-actions">
            <div class="d-inline-block">
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
            <span>It only takes a <span class="text-success">few seconds</span> to add a new user.</span>
        </h4><br>
        <form action="{{route('users.store')}}" method="post" id="signupForm" class="col-md-10 mx-auto" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <h5 class="card-title">NAME</h5>
                <div><input name="name" id="name" placeholder="Name here..." type="text" class="form-control"></div>
            </div>
            <div class="form-group">
                <h5 class="card-title">EMAIL</h5>
                <div><input name="email" id="email" placeholder="Email here..." type="email" class="form-control"></div>
            </div>
            <div class="form-group">
                <h5 class="card-title">PASSWORD</h5>
                <div>
                    <input name="password" id="password" placeholder="Password here..." type="password" class="form-control" crypt="bcrypt">
                    {{-- <i class="far fa-eye" id="togglePassword"></i> --}}
                    <div class="form-check">
                        <input type="checkbox" id="agree" name="agree" value="agree" class="form-check-input" onclick="showPassword()">
                        <label class="form-check-label">Show Password</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <h5 class="card-title">MOBILE</h5>
                <div><input name="mobile" id="mobile" placeholder="Mobile here..." type="number" class="form-control"></div>
            </div>
            <div class="form-group">
                <h5 class="card-title">ADDRESS</h5>
                <div><textarea name="address" id="address" placeholder="Address here..." class="form-control"></textarea></div>
            </div>
            <div class="form-group">
                <h5 class="card-title">COUNTRY</h5>
                <div>
                    <select name="country_id" id="country-dd" class="form-control">
                        <option value="" class="option_color">Select Country</option>
                        @foreach ($countries as $data)
                            <option value="{{$data->id}}">
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
                    </select>
                </div>
            </div>
            <div class="form-group">
                <h5 class="card-title">CITY</h5>
                <div>
                    <select name="city_id" id="city-dd" class="form-control">
                        <option value="" class="option_color">Select City</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <h5 class="card-title">PIN CODE</h5>
                <div><input name="pincode" id="pincode" placeholder="Pin Code here..." type="number" class="form-control"></div>
            </div>
            <div class="form-group">
                <h5 class="card-title">ROLE</h5>
                <div>
                    <select name="role_id" id="role_id" class="form-control">
                        <option value="" class="option_color">Select Role</option>
                        @foreach ($roles as $role )
                            <option value="{{$role->id}}">{{$role->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <h5 class="card-title">PROFILE</h5>
                <div>
                    <input name="image" id="image" type="file" class="form-control-file">
                    <small class="form-text text-muted">Please select your profile image.</small>
                </div>
            </div>
            <div class="form-group">
                <div class="modal-footer d-block text-center">
                    <button class="btn-wide btn-pill btn-shadow btn-hover-shine btn btn-primary btn-lg btn-gradient-primary">Add New User</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
