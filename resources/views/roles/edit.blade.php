@extends('dashboard')
@section('content')

<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fal fa-edit icon-gradient bg-ripe-malin"></i>
            </div>
            <div>Edit Role
                <div class="page-title-subheading">Edit details in the following fields below with correct information.</div>
            </div>
        </div>
        <div class="page-title-actions">
            <div class="d-inline-block">
                <a href="{{route('roles.create')}}" type="button" aria-haspopup="true" aria-expanded="false" class="btn-shadow btn btn-info">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fal fa-plus fa-w-20"></i>
                    </span>
                    Add Roles
                </a>
                <a href="{{route('roles.index')}}" type="button" aria-haspopup="true" aria-expanded="false" class="btn-shadow btn btn-info">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fal fa-pencil-alt fa-w-20"></i>
                    </span>
                    Manage Roles
                </a>
            </div>
        </div>
    </div>
</div>

<div class="main-card mb-3 card">
    <div class="card-body">
        <h4 class="mt-2">
            <span>It only takes a <span class="text-success">few seconds</span> to edit details of a role.</span>
        </h4><br>
        <form method="post" action="{{route('roles.update', $role->id)}}" id="signupForm" class="col-md-10 mx-auto">
            @method('POST')
            @csrf
            <div class="form-group">
                <h5 class="card-title">NAME</h5>
                <div><input name="name" id="name" type="text" class="form-control" value="{{$role->name}}"></div>
            </div>
            <div class="form-group">
                <h5 class="card-title">SLUG</h5>
                <div><input name="slug" id="slug" type="text" class="form-control" value="{{$role->slug}}"></div>
            </div>
            <div class="form-group">
                <div class="modal-footer d-block text-center">
                    <button class="btn-wide btn-pill btn-shadow btn-hover-shine btn btn-primary btn-lg btn-gradient-primary">Update Role Details</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
