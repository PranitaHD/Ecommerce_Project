<?php

namespace App\Exports;

use App\Models\Secret;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;

class SecretsExport implements FromCollection, ShouldAutoSize, WithHeadings, WithEvents, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Secret::all();
    }
    public function headings(): array
    {
        return ['ID', 'Name', 'Slug', 'Created At', 'Updated At'];
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
    public function map($secret): array
    {
        return [
            $secret->id,
            $secret->name,
            $secret->slug,
            $secret->created_at->format('Y-m-d H:i:s'),
            $secret->updated_at->format('Y-m-d H:i:s')
        ];
    }
}
