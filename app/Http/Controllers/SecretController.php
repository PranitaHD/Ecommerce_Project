<?php

namespace App\Http\Controllers;

use App\Exports\SecretsExport;
use App\Imports\SecretsImport;
use App\Models\Secret;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SecretController extends Controller
{
    public function index()
    {
        $secrets = Secret::all();
        return view('secrets.index', compact('secrets'));
    }

    public function edit($id)
    {
        $secret = Secret::find($id);
        return view('secrets.edit', compact('secret'));
    }

    public function update($id, Request $request)
    {
        $secret = Secret::find($id);
        $secret->name = $request->name;
        $secret->slug = $request->slug;
        $secret->update();
        if($secret)
            request()->session()->flash('secretUpdated','Successfully updated secret details..!!');
        return redirect()->route('secrets.index');
    }

    public function delete($id)
    {
        $secret = Secret::find($id);
        $secret->delete();
        if($secret)
            request()->session()->flash('secretDeleted','Successfully deleted secret details..!!');
        return redirect()->route('secrets.index');
    }

    public function export_excel()
    {
        return Excel::download(new SecretsExport(), 'secrets.xlsx');
    }

    public function export_csv()
    {
        return Excel::download(new SecretsExport(), 'secrets.csv');
    }

    public function import_secrets()
    {
        Excel::import(new SecretsImport(), request()->file('import'));
        return redirect()->route('secrets.index');
    }
}
