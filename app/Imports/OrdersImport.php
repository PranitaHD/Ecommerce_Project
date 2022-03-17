<?php

namespace App\Imports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\ToModel;

class OrdersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Order([
            'user_id' => $row[1],
            'product_id' => $row[2],
            'price' => $row[3],
            'tax' => $row[4],
            'delivery_charges' => $row[5],
            'quantity' => $row[6],
            'total' => $row[7],
            'status' => $row[8],
            'tracking_number' => $row[9],
        ]);
    }
}
