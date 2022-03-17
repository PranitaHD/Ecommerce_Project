<?php

namespace App\Imports;

use App\Models\Secret;
use Maatwebsite\Excel\Concerns\ToModel;

class SecretsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Secret([
            'name' => $row[1],
            'slug' => $row[2],
        ]);
    }
}
