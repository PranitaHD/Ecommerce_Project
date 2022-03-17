@extends('dashboard')
@section('content')

@if(session('orderUpdated'))
    <div class="alert alert-success d-flex align-items-center" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Success:">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </svg>&nbsp;&nbsp;
        <div><strong>{{session('orderUpdated')}}</strong></div>
    </div><br>
@endif
@if(session('orderDeleted'))
    <div class="alert alert-success d-flex align-items-center" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Success:">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </svg>&nbsp;&nbsp;
        <div><strong>{{session('orderDeleted')}}</strong></div>
    </div><br>
@endif

<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fal fa-pencil-alt icon-gradient bg-ripe-malin"></i>
            </div>
            <div>Manage Orders
                <div class="page-title-subheading">Manage the data or details of the existing orders.</div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card-header">Manage Orders
            <div class="btn-actions-pane-right">
                <a href="{{route('orders.export_excel')}}" class="btn btn-outline-dark">Excel</a>
                <a href="{{route('orders.export_csv')}}" class="btn btn-outline-dark">CSV</a>
                <button data-clipboard-target="#example" class="clipboard-trigger btn btn-outline-dark">Copy</button>
                <button class="btn btn-outline-dark" onclick="printTable()">Print</button>
            </div>
        </div>
        <div class="main-card mb-3 card">
            <div class="card-body">
                <form action="{{route('orders.import')}}" method="post" enctype="multipart/form-data">
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
                            <th class="text-center">User</th>
                            <th class="text-center">Product</th>
                            {{-- <th class="text-center">Secret Code</th> --}}
                            <th class="text-center">QR Code</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Tax</th>
                            <th class="text-center">Delivery Charges</th>
                            <th class="text-center">Quantity</th>
                            <th class="text-center">Total</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Tracking Number</th>
                            <th class="text-center">Created At</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td class="text-center">{{$order->id}}</td>
                            <td class="text-center">{{@$order->user['name']}}</td>
                            <td class="text-center">{{@$order->product['name']}}</td>
                            @php
                                $scode = $order->product->secret_code;
                                $secret = App\Models\Secret::find($scode);
                                // $secret_name = @$secret->name;
                                // dd($secret_name);
                            @endphp
                            {{-- <td class="text-center">{{@$secret->name}}</td> --}}
                            <td class="text-center">
                                {{@$order->product['id']}}-{{@$secret->name}}
                            </td>
                            <td class="text-center">{{$order->price}}</td>
                            <td class="text-center">{{$order->tax}}</td>
                            <td class="text-center">{{$order->delivery_charges}}</td>
                            <td class="text-center">{{$order->quantity}}</td>
                            <td class="text-center">{{$order->total}}</td>
                            <td class="text-center">
                                @if($order->status == "Ordered")
                                    <div class="badge badge-info">{{$order->status}}</div>
                                @elseif($order->status == "Delivered")
                                    <div class="badge badge-success">{{$order->status}}</div>
                                @else
                                    <div class="badge badge-danger">{{$order->status}}</div>
                                @endif
                            </td>
                            <td class="text-center">{{$order->tracking_number}}</td>
                            <td class="text-center">{{$order->created_at}}</td>
                            <td class="text-center">
                                <a href="{{route('orders.edit', $order->id)}}">
                                    <button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-outline-2x btn btn-outline-success"><i class="fal fa-edit btn-icon-wrapper"></i></button>
                                </a>
                                <a href="{{route('orders.delete', $order->id)}}">
                                    <button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-outline-2x btn btn-outline-danger"><i class="fal fa-trash-alt btn-icon-wrapper"></i></button>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th rowspan="1" colspan="1" class="text-center">ID</th>
                            <th rowspan="1" colspan="1" class="text-center">User</th>
                            <th rowspan="1" colspan="1" class="text-center">Product</th>
                            {{-- <th rowspan="1" colspan="1" class="text-center">Secret Code</th> --}}
                            <th rowspan="1" colspan="1" class="text-center">QR Code</th>
                            <th rowspan="1" colspan="1" class="text-center">Price</th>
                            <th rowspan="1" colspan="1" class="text-center">Tax</th>
                            <th rowspan="1" colspan="1" class="text-center">Delivery Charges</th>
                            <th rowspan="1" colspan="1" class="text-center">Quantity</th>
                            <th rowspan="1" colspan="1" class="text-center">Total</th>
                            <th rowspan="1" colspan="1" class="text-center">Status</th>
                            <th rowspan="1" colspan="1" class="text-center">Tracking Number</th>
                            <th rowspan="1" colspan="1" class="text-center">Created At</th>
                            <th rowspan="1" colspan="1" class="text-center">Actions</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

