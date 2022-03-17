<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;

class UsersExport implements FromCollection, ShouldAutoSize, WithHeadings, WithEvents, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::all();
    }
    public function headings(): array
    {
        return ['ID', 'Name', 'Email', 'Password', 'Mobile', 'Address', 'Country_ID', 'State_ID', 'City_ID', 'PinCode', 'Role_ID', 'Profile', 'Created At', 'Updated At'];
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
    public function map($user): array
    {
        return [
            $user->id,
            $user->name,
            $user->email,
            $user->password,
            $user->mobile,
            $user->address,
            $user->country_id,
            $user->state_id,
            $user->city_id,
            $user->pincode,
            $user->role_id,
            $user->image,
            $user->created_at->format('Y-m-d H:i:s'),
            $user->updated_at->format('Y-m-d H:i:s')
        ];
    }
}
