<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'name' => $row[1],
            'description' => $row[2],
            'image' => $row[3],
            'discount' => $row[4],
            'price' => $row[5],
            'secret_code' => $row[6],
            'status' => $row[7],
        ]);
    }
}
