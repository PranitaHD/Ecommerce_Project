@extends('dashboard')
@section('content')

<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fal fa-edit icon-gradient bg-ripe-malin"></i>
            </div>
            <div>Edit Transaction
                <div class="page-title-subheading">Edit details in the following fields below with correct information.</div>
            </div>
        </div>
        <div class="page-title-actions">
            <div class="d-inline-block">
                <a href="{{route('transactions.index')}}" type="button" aria-haspopup="true" aria-expanded="false" class="btn-shadow btn btn-info">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fal fa-pencil-alt fa-w-20"></i>
                    </span>
                    Manage Transactions
                </a>
            </div>
        </div>
    </div>
</div>

<div class="main-card mb-3 card">
    <div class="card-body">
        <h4 class="mt-2">
            <span>It only takes a <span class="text-success">few seconds</span> to edit details of a transaction.</span>
        </h4><br>
        <form method="post" action="{{route('transactions.update', $transaction->id)}}" id="signupForm" class="col-md-10 mx-auto">
            @method('POST')
            @csrf
            <div class="form-group">
                <h5 class="card-title">ORDER ID</h5>
                <div>
                    <select name="order_id" id="order_id" class="form-control">
                        <option value="" class="option_color">Select Order Id</option>
                        @foreach ($orders as $order)
                            <option value="{{$order->id}}" {{$transaction->order_id == $order->id  ? 'selected' : ''}}>{{$order->id}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <h5 class="card-title">MODE</h5>
                <div>
                    <select name="mode" id="mode" class="form-control">
                        <option value="" class="option_color">Select Mode</option>
                        <option {{$transaction->mode == 'COD'  ? 'selected' : ''}}>COD</option>
                        <option {{$transaction->mode == 'Online'  ? 'selected' : ''}}>Online</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <h5 class="card-title">TYPE</h5>
                <div>
                    <select name="type" id="type" class="form-control">
                        <option value="" class="option_color">Select Type</option>
                        <option {{$transaction->type == 'Active'  ? 'selected' : ''}}>Active</option>
                        <option {{$transaction->type == 'Inactive'  ? 'selected' : ''}}>Inactive</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="modal-footer d-block text-center">
                    <button class="btn-wide btn-pill btn-shadow btn-hover-shine btn btn-primary btn-lg btn-gradient-primary">Update Transaction Details</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
