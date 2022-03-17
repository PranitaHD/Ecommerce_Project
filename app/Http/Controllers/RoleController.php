<?php

namespace App\Http\Controllers;

use App\Exports\RolesExport;
use App\Imports\RolesImport;
use App\Models\Role;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class RoleController extends Controller
{
    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request)
    {
        $role = new Role();
        $role->name = $request->name;
        $role->slug = $request->slug;
        $role->save();
        if($role)
            request()->session()->flash('roleAdded',"Successfully saved role details..!!");
        return redirect()->route('roles.create');
    }

    public function index()
    {
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }

    public function edit($id)
    {
        $role = Role::find($id);
        return view('roles.edit', compact('role'));
    }

    public function update($id, Request $request)
    {
        $role = Role::find($id);
        $role->name = $request->name;
        $role->slug = $request->slug;
        $role->update();
        if($role)
            request()->session()->flash('roleUpdated','Successfully updated role details..!!');
        return redirect()->route('roles.index');
    }

    public function delete($id)
    {
        $role = Role::find($id);
        $role->delete();
        if($role)
            request()->session()->flash('roleDeleted','Successfully deleted role details..!!');
        return redirect()->route('roles.index');
    }

    public function export_excel()
    {
        return Excel::download(new RolesExport(), 'roles.xlsx');
    }

    public function export_csv()
    {
        return Excel::download(new RolesExport(), 'roles.csv');
    }

    public function import_roles()
    {
        Excel::import(new RolesImport(), request()->file('import'));
        return redirect()->route('roles.index');
    }
}
