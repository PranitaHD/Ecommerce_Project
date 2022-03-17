@extends('dashboard')
@section('content')

<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fal fa-edit icon-gradient bg-ripe-malin"></i>
            </div>
            <div>Edit Product
                <div class="page-title-subheading">Edit details in the following fields below with correct information.</div>
            </div>
        </div>
        <div class="page-title-actions">
            <div class="d-inline-block">
                <a href="{{route('products.create')}}" type="button" aria-haspopup="true" aria-expanded="false" class="btn-shadow btn btn-info">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fal fa-plus fa-w-20"></i>
                    </span>
                    Add Products
                </a>
                <a href="{{route('products.index')}}" type="button" aria-haspopup="true" aria-expanded="false" class="btn-shadow btn btn-info">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fal fa-pencil-alt fa-w-20"></i>
                    </span>
                    Manage Products
                </a>
            </div>
        </div>
    </div>
</div>

<div class="main-card mb-3 card">
    <div class="card-body">
        <h4 class="mt-2">
            <span>It only takes a <span class="text-success">few seconds</span> to edit details of a product.</span>
        </h4><br>
        <form method="post" action="{{route('products.update', $product->id)}}" id="signupForm" class="col-md-10 mx-auto" enctype="multipart/form-data">
            @method('POST')
            @csrf
            <div class="form-group">
                <h5 class="card-title">NAME</h5>
                <div><input name="name" id="name" type="text" class="form-control" value="{{$product->name}}"></div>
            </div>
            <div class="form-group">
                <h5 class="card-title">DESCRIPTION</h5>
                <div><input name="description" id="description" type="text" class="form-control" value="{{$product->description}}"></div>
            </div>
            <div class="form-group">
                <h5 class="card-title">DISCOUNT</h5>
                <div><input name="discount" id="discount" type="number" class="form-control" value="{{$product->discount}}"></div>
            </div>
            <div class="form-group">
                <h5 class="card-title">PRICE</h5>
                <div><input name="price" id="price" type="number" class="form-control" value="{{$product->price}}"></div>
            </div>
            <div class="form-group">
                <h5 class="card-title">SECRET CODE</h5>
                <div>
                    <select name="secret_code" id="secret_code" class="form-control">
                        <option value="" class="option_color">Select Secret Code</option>
                        @foreach ($secrets as $secret)
                            <option value="{{$secret->id}}" {{$product->secret_code == $secret->id  ? 'selected' : ''}}>{{$secret->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <h5 class="card-title">STATUS</h5>
                <div>
                    <select name="status" id="status" class="form-control">
                        <option value="" class="option_color">Select Status</option>
                        <option {{$product->status == 'Active'  ? 'selected' : ''}}>Active</option>
                        <option {{$product->status == 'Deactive'  ? 'selected' : ''}}>Deactive</option>
                    </select></div>
            </div>
            <div class="form-group">
                <h5 class="card-title">Product Image</h5>
                <div>
                    <input type="file" name="image" id="image" class="form-control-file">
                    <img src="/product_images/{{$product->image}}" width="300px">
                </div>
            </div>
            <div class="form-group">
                <div class="modal-footer d-block text-center">
                    <button class="btn-wide btn-pill btn-shadow btn-hover-shine btn btn-primary btn-lg btn-gradient-primary">Update Product Details</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
