<?php

namespace App\Exports;

use App\Models\Role;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;

class RolesExport implements FromCollection, ShouldAutoSize, WithHeadings, WithEvents, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Role::all();
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
    public function map($role): array
    {
        return [
            $role->id,
            $role->name,
            $role->slug,
            $role->created_at->format('Y-m-d H:i:s'),
            $role->updated_at->format('Y-m-d H:i:s')
        ];
    }
}
