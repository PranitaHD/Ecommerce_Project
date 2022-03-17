<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'name' => $row[1],
            'email' => $row[2],
            'password' => Hash::make($row[3]),
            'mobile' => $row[4],
            'address' => $row[5],
            'country_id' => $row[6],
            'state_id' => $row[7],
            'city_id' => $row[8],
            'pincode' => $row[9],
            'role_id' => $row[10],
            'image' => $row[11],
        ]);
    }
}
