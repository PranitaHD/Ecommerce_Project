<?php

namespace App\Exports;

use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;

class TransactionsExport implements FromCollection, ShouldAutoSize, WithHeadings, WithEvents, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Transaction::all();
    }
    public function headings(): array
    {
        return ['ID', 'Order_ID', 'Mode', 'Type', 'Created At', 'Updated At'];
    }
    public function registerEvents(): array
    {
        return[
            AfterSheet::class => function(AfterSheet $event) {
                $cellRange = 'A1:Z1';   // All headers
                $styleArray = [
                    'font' => [
                        'bold' => true,
                    ]
                ];
                $event->sheet->getDelegate()->getStyle('A1:Z1')->applyFromArray($styleArray);
            }
        ];
    }
    public function map($transaction): array
    {
        return [
            $transaction->id,
            $transaction->order_id,
            $transaction->mode,
            $transaction->type,
            $transaction->created_at->format('Y-m-d H:i:s'),
            $transaction->updated_at->format('Y-m-d H:i:s')
        ];
    }
}
