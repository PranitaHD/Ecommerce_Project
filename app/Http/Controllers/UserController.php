<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Imports\UsersImport;
use App\Models\City;
use App\Models\Country;
use App\Models\Role;
use App\Models\State;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function create()
    {
        $roles = Role::all();
        $data['countries'] = Country::get(["name", "id"]);
        return view('users.create', $data, compact('roles'));
    }

    public function fetchState(Request $request)
    {
        $data['states'] = State::where("country_id",$request->country_id)->get(["name", "id"]);
        return response()->json($data);
    }

    public function fetchCity(Request $request)
    {
        $data['cities'] = City::where("state_id",$request->state_id)->get(["name", "id"]);
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->mobile = $request->mobile;
        $user->address = $request->address;
        $user->country_id = $request->country_id;
        $user->state_id = $request->state_id;
        $user->city_id = $request->city_id;
        $user->pincode = $request->pincode;
        $user->role_id = $request->role_id;
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('user_images/', $filename);
            $user->image = $filename;
        }
        $user->save();
        if($user)
            request()->session()->flash('userAdded','Successfully saved user details..!!');
        return redirect()->route('users.create');
    }

    public function index()
    {
        $users = User::with('country', 'state', 'city', 'role')->get();
        return view('users.index', compact('users'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        $data['countries'] = Country::get(["name", "id"]);
        $data['states'] = State::get(["name", "id"]);
        $data['cities'] = City::get(["name", "id"]);
        return view('users.edit', $data, compact('user','roles'));
    }

    public function update($id, Request $request)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->mobile = $request->mobile;
        $user->address = $request->address;
        $user->country_id = $request->country_id;
        $user->state_id = $request->state_id;
        $user->city_id = $request->city_id;
        $user->pincode = $request->pincode;
        $user->role_id = $request->role_id;
        if($request->hasFile('image'))
        {
            $destination = 'user_images/'.$user->image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('user_images/', $filename);
            $user->image = $filename;
        }
        $user->update();
        if($user)
            request()->session()->flash('userUpdated','Successfully updated user details..!!');
        return redirect()->route('users.index');
    }

    public function delete($id)
    {
        $user = User::find($id);
        $destination = 'user_images/'.$user->image;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $user->delete();
        if($user)
            request()->session()->flash('userDeleted','Successfully deleted user details..!!');
        return redirect()->route('users.index');
    }

    public function export_excel()
    {
        return Excel::download(new UsersExport(), 'users.xlsx');
    }

    public function export_csv()
    {
        return Excel::download(new UsersExport(), 'users.csv');
    }

    public function import_users()
    {
        Excel::import(new UsersImport(), request()->file('import'));
        return redirect()->route('users.index');
    }
}
