@extends('dashboard')
@section('content')

@if(session('productUpdated'))
    <div class="alert alert-success d-flex align-items-center" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Success:">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </svg>&nbsp;&nbsp;
        <div><strong>{{session('productUpdated')}}</strong></div>
    </div><br>
@endif
@if(session('productDeleted'))
    <div class="alert alert-success d-flex align-items-center" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Success:">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </svg>&nbsp;&nbsp;
        <div><strong>{{session('productDeleted')}}</strong></div>
    </div><br>
@endif

<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fal fa-pencil-alt icon-gradient bg-ripe-malin"></i>
            </div>
            <div>Manage Products
                <div class="page-title-subheading">Manage the data or details of the existing product.</div>
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
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card-header">Manage Products
            <div class="btn-actions-pane-right">
                <a href="{{route('products.export_excel')}}" class="btn btn-outline-dark">Excel</a>
                <a href="{{route('products.export_csv')}}" class="btn btn-outline-dark">CSV</a>
                <button data-clipboard-target="#example" class="clipboard-trigger btn btn-outline-dark">Copy</button>
                <button class="btn btn-outline-dark" onclick="printTable()">Print</button>
            </div>
        </div>
        <div class="main-card mb-3 card">
            <div class="card-body">
                <form action="{{route('products.import')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group">
                        <button class="mr-2 btn-icon btn-icon-only btn btn-outline-dark">
                            <input type="file" name="import" id="import" class="form-control-file">
                        </button>
                        <input type="submit" class="btn btn-wide btn-outline-dark" value="Import Excel In Table">
                    </div>
                </form>&nbsp;
                <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Description</th>
                            <th class="text-center">Discount</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Secret Code</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Product Image</th>
                            <th class="text-center">QR Code</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td class="text-center">{{$product->id}}</td>
                            <td class="text-center">{{$product->name}}</td>
                            <td class="text-center">{{$product->description}}</td>
                            <td class="text-center">{{$product->discount}}</td>
                            <td class="text-center">{{$product->price}}</td>
                            <td class="text-center">{{@$product->secret['name']}}</td>
                            <td class="text-center">
                                @if($product->status == "Active")
                                    <div class="badge badge-success">{{$product->status}}</div>
                                @else
                                    <div class="badge badge-danger">{{$product->status}}</div>
                                @endif
                            </td>
                            <td class="text-center">
                                {{-- @if(empty($product->image)) --}}
                                @if(($product->image) == "NULL")
                                    <img src="{{'product-image.png'}}" width="50" class="rounded">
                                @else
                                    <img src="/product_images/{{$product->image}}" width="50" class="rounded">
                                @endif
                            </td>
                            <td class="text-center">
                                <?php
                                    $p = $product->id;
                                    $s = $product->secret->name;
                                ?>
                                <div class="col-4 d-flex justify-content-center">
                                    {!! DNS2D::getBarcodeHTML($p ."-". $s, 'QRCODE') !!}
                                </div>
                            </td>
                            <td class="text-center">
                                <a href="{{route('products.edit', $product->id)}}">
                                    <button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-outline-2x btn btn-outline-success"><i class="fal fa-edit btn-icon-wrapper"></i></button>
                                </a>
                                <a href="{{route('products.delete', $product->id)}}">
                                    <button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-outline-2x btn btn-outline-danger"><i class="fal fa-trash-alt btn-icon-wrapper"></i></button>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th rowspan="1" colspan="1" class="text-center">ID</th>
                            <th rowspan="1" colspan="1" class="text-center">Name</th>
                            <th rowspan="1" colspan="1" class="text-center">Description</th>
                            <th rowspan="1" colspan="1" class="text-center">Discount</th>
                            <th rowspan="1" colspan="1" class="text-center">Price</th>
                            <th rowspan="1" colspan="1" class="text-center">Secret Code</th>
                            <th rowspan="1" colspan="1" class="text-center">Status</th>
                            <th rowspan="1" colspan="1" class="text-center">Product Image</th>
                            <th rowspan="1" colspan="1" class="text-center">QR Code</th>
                            <th rowspan="1" colspan="1" class="text-center">Actions</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
