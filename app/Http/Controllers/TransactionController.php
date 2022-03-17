<?php

namespace App\Http\Controllers;

use App\Exports\TransactionsExport;
use App\Imports\TransactionsImport;
use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();
        return view('transactions.index', compact('transactions'));
    }

    public function edit($id)
    {
        $transaction = Transaction::find($id);
        $orders = Order::all();
        return view('transactions.edit', compact('transaction', 'orders'));
    }

    public function update($id, Request $request)
    {
        $transaction = Transaction::find($id);
        $transaction->user_id = $request->user_id;
        $transaction->order_id = $request->order_id;
        $transaction->type = $request->type;
        $transaction->mode = $request->mode;
        $transaction->status = $request->status;
        $transaction->update();
        if($transaction)
            request()->session()->flash('transactionUpdated','Successfully updated transaction details..!!');
        return redirect()->route('transactions.index');
    }

    public function delete($id)
    {
        $transaction = Transaction::find($id);
        $transaction->delete();
        if($transaction)
            request()->session()->flash('transactionDeleted','Successfully deleted transaction details..!!');
        return redirect()->route('transactions.index');
    }

    public function export_excel()
    {
        return Excel::download(new TransactionsExport(), 'transactions.xlsx');
    }

    public function export_csv()
    {
        return Excel::download(new TransactionsExport(), 'transactions.csv');
    }

    public function import_transactions()
    {
        Excel::import(new TransactionsImport(), request()->file('import'));
        return redirect()->route('transactions.index');
    }
}
