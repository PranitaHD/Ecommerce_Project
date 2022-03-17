<?php

namespace App\Imports;

use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\ToModel;

class TransactionsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Transaction([
            'order_id' => $row[1],
            'mode' => $row[2],
            'type' => $row[3],
        ]);
    }
}
