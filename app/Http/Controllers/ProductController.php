<?php

namespace App\Http\Controllers;

use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use App\Models\Product;
use App\Models\Secret;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    public function create()
    {
        $secrets = Secret::all();
        return view('products.create', compact('secrets'));
    }

    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->discount = $request->discount;
        $product->price = $request->price;
        $product->secret_code = $request->secret_code;
        $product->status = $request->status;
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('product_images/', $filename);
            $product->image = $filename;
        }
        $product->save();
        if($product)
            request()->session()->flash('productAdded','Successfully saved product details..!!');
        return redirect()->route('products.create');
    }

    public function index()
    {
        $products = Product::with('secret')->get();
        return view('products.index', compact('products'));
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $secrets = Secret::all();
        return view('products.edit', compact('product', 'secrets'));
    }

    public function update($id, Request $request)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->discount = $request->discount;
        $product->price = $request->price;
        $product->secret_code = $request->secret_code;
        $product->status = $request->status;
        if($request->hasFile('image'))
        {
            $destination = 'product_images/'.$product->image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('product_images/', $filename);
            $product->image = $filename;
        }
        $product->update();
        if($product)
            request()->session()->flash('productUpdated','Successfully updated product details..!!');
        return redirect()->route('products.index');
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $destination = 'product_images/'.$product->image;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $product->delete();
        if($product)
            request()->session()->flash('productDeleted','Successfully deleted product details..!!');
        return redirect()->route('products.index');
    }

    public function export_excel()
    {
        return Excel::download(new ProductsExport(), 'products.xlsx');
    }

    public function export_csv()
    {
        return Excel::download(new ProductsExport(), 'products.csv');
    }

    public function import_products()
    {
        Excel::import(new ProductsImport(), request()->file('import'));
        return redirect()->route('products.index');
    }
}
