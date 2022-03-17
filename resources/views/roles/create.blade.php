@extends('dashboard')
@section('content')

@if(session('roleAdded'))
    <div class="alert alert-success d-flex align-items-center" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Success:">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </svg>&nbsp;&nbsp;
        <div><strong>{{session('roleAdded')}}</strong></div>
    </div><br>
@endif

<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fal fa-plus icon-gradient bg-ripe-malin"></i>
            </div>
            <div>Add Roles
                <div class="page-title-subheading">Enter details for role in the following fields below.</div>
            </div>
        </div>
        <div class="page-title-actions">
            <div class="d-inline-block">
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
            <span>It only takes a <span class="text-success">few seconds</span> to add a new role.</span>
        </h4><br>
        <form action="{{route('roles.store')}}" method="post" id="signupForm" class="col-md-10 mx-auto">
            @csrf
            <div class="form-group">
                <h5 class="card-title">NAME</h5>
                <div><input name="name" id="name"  placeholder="Name here..." type="text" class="form-control"></div>
            </div>
            <div class="form-group">
                <h5 class="card-title">SLUG</h5>
                <div><textarea name="slug" id="slug"  placeholder="Slug here..." type="text" class="form-control"></textarea></div>
            </div>
            <div class="form-group">
                <div class="modal-footer d-block text-center">
                    <button class="btn-wide btn-pill btn-shadow btn-hover-shine btn btn-primary btn-lg btn-gradient-primary">Add New Role</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
