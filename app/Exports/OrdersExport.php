<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;

class OrdersExport implements FromCollection, ShouldAutoSize, WithHeadings, WithEvents, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Order::all();
    }
    public function headings(): array
    {
        return ['ID', 'User_ID', 'Product_ID', 'Price', 'Tax', 'Delivery Charges', 'Quantity', 'Total', 'Status', 'Tracking Number', 'Created At', 'Updated At'];
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
    public function map($order): array
    {
        return [
            $order->id,
            $order->user_id,
            $order->product_id,
            $order->price,
            $order->tax,
            $order->delivery_charges,
            $order->quantity,
            $order->total,
            $order->status,
            $order->tracking_number,
            $order->created_at->format('Y-m-d H:i:s'),
            $order->updated_at->format('Y-m-d H:i:s')
        ];
    }
}
