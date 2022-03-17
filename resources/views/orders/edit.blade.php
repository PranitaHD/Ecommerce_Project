@extends('dashboard')
@section('content')

<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fal fa-edit icon-gradient bg-ripe-malin"></i>
            </div>
            <div>Edit Order
                <div class="page-title-subheading">Edit details in the following fields below with correct information.</div>
            </div>
        </div>
        <div class="page-title-actions">
            <div class="d-inline-block">
                <a href="{{route('orders.index')}}" type="button" aria-haspopup="true" aria-expanded="false" class="btn-shadow btn btn-info">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fal fa-pencil-alt fa-w-20"></i>
                    </span>
                    Manage Orders
                </a>
            </div>
        </div>
    </div>
</div>

<div class="main-card mb-3 card">
    <div class="card-body">
        <h4 class="mt-2">
            <span>It only takes a <span class="text-success">few seconds</span> to edit details of a order.</span>
        </h4><br>
        <form method="post" action="{{route('orders.update', $order->id)}}" id="signupForm" class="col-md-10 mx-auto">
            @method('POST')
            @csrf
            <div class="form-group">
                <h5 class="card-title">USER</h5>
                <div>
                    <select name="user_id" id="user_id" class="form-control">
                        <option value="" class="option_color">Select User</option>
                        @foreach ($users as $user)
                            <option value="{{$user->id}}" {{$order->user_id == $user->id  ? 'selected' : ''}}>{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <h5 class="card-title">PRODUCT</h5>
                <div>
                    <select name="product_id" id="product_id" class="form-control">
                        <option value="" class="option_color">Select Product</option>
                        @foreach ($products as $product)
                            <option value="{{$product->id}}" {{$order->product_id == $product->id  ? 'selected' : ''}}>{{$product->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <h5 class="card-title">PRICE</h5>
                <div><input name="price" id="price" type="number" class="form-control" value="{{$order->price}}"></div>
            </div>
            <div class="form-group">
                <h5 class="card-title">TAX</h5>
                <div><input name="tax" id="tax" type="number" class="form-control" value="{{$order->tax}}"></div>
            </div>
            <div class="form-group">
                <h5 class="card-title">DELIVERY CHARGES</h5>
                <div><input name="delivery_charges" id="delivery_charges" type="number" class="form-control" value="{{$order->delivery_charges}}"></div>
            </div>
            <div class="form-group">
                <h5 class="card-title">QUANTITY</h5>
                <div><input name="quantity" id="quantity" type="number" class="form-control" value="{{$order->quantity}}"></div>
            </div>
            <div class="form-group">
                <h5 class="card-title">TOTAL</h5>
                <div><input name="total" id="total" type="number" class="form-control" value="{{$order->total}}"></div>
            </div>
            <div class="form-group">
                <h5 class="card-title">STATUS</h5>
                <div>
                    <select name="status" id="status" class="form-control">
                        <option value="" class="option_color">Select Status</option>
                        <option {{$order->status == 'Ordered'  ? 'selected' : ''}}>Ordered</option>
                        <option {{$order->status == 'Delivered'  ? 'selected' : ''}}>Delivered</option>
                        <option {{$order->status == 'Cancelled'  ? 'selected' : ''}}>Cancelled</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <h5 class="card-title">TRACKING NUMBER</h5>
                <div><input name="tracking_number" id="tracking_number" type="number" class="form-control" value="{{$order->tracking_number}}"></div>
            </div>
            <div class="form-group">
                <div class="modal-footer d-block text-center">
                    <button class="btn-wide btn-pill btn-shadow btn-hover-shine btn btn-primary btn-lg btn-gradient-primary">Update Order Details</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
