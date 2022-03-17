<?php

namespace App\Http\Controllers;

use App\Exports\OrdersExport;
use App\Imports\OrdersImport;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user', 'product')->get();
        return view('orders.index', compact('orders'));
    }

    public function edit($id)
    {
        $order = Order::find($id);
        $users = User::all();
        $products = Product::all();
        return view('orders.edit', compact('order', 'users', 'products'));
    }

    public function update($id, Request $request)
    {
        $order = Order::find($id);
        $order->product_id = $request->product_id;
        $order->price = $request->price;
        $order->tax = $request->tax;
        $order->delivery_charges = $request->delivery_charges;
        $order->quantity = $request->quantity;
        $order->total = $request->total;
        $order->status = $request->status;
        $order->tracking_number = $request->tracking_number;
        $order->update();
        if($order)
            request()->session()->flash('orderUpdated','Successfully updated order details..!!');
        return redirect()->route('orders.index');
    }

    public function delete($id)
    {
        $order = Order::find($id);
        $order->delete();
        if($order)
            request()->session()->flash('orderDeleted','Successfully deleted order details..!!');
        return redirect()->route('orders.index');
    }

    public function export_excel()
    {
        return Excel::download(new OrdersExport(), 'orders.xlsx');
    }

    public function export_csv()
    {
        return Excel::download(new OrdersExport(), 'orders.csv');
    }

    public function import_orders()
    {
        Excel::import(new OrdersImport(), request()->file('import'));
        return redirect()->route('orders.index');
    }
}
