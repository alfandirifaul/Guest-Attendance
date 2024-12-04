<?php

namespace App\Exports;

use App\Models\Guest;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithEvents;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;

class GuestsExport implements FromCollection, WithHeadings, WithStyles, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Guest::orderBy('created_at', 'desc')->get()->map(function($guest, $index){
            return [
                'number' => $index + 1,
                'name' => $guest->nama,
                'origin' => $guest->asal_instansi,
                'purpose' => $guest->tujuan,
                'phone_number' => $guest->nomor_hp,
                'time' => $guest->created_at->format('l, d-m-Y H:i:s'),
            ];
        });
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama',
            'Asal Instansi',
            'Tujuan',
            'Nomor Telepon',
            'Waktu',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold and center aligned
            1 => ['font' => ['bold' => true, 'size' => 12], 'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER]],
        ];
    }

    public function registerEvents(): array
    {
        return [
            \Maatwebsite\Excel\Events\AfterSheet::class => function(\Maatwebsite\Excel\Events\AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();

                // Set column widths
                $sheet->getColumnDimension('A')->setWidth(5);
                $sheet->getColumnDimension('B')->setWidth(20);
                $sheet->getColumnDimension('C')->setWidth(25);
                $sheet->getColumnDimension('D')->setWidth(20);
                $sheet->getColumnDimension('E')->setWidth(30);
                $sheet->getColumnDimension('F')->setWidth(30);

                // Apply borders to all cells
                $sheet->getStyle('A1:F' . $sheet->getHighestRow())->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                ]);

                // Apply background color to the header row
                $sheet->getStyle('A1:F1')->applyFromArray([
                    'fill' => [
                        'fillType' => Fill::FILL_SOLID,
                        'color' => ['argb' => 'FFFF00'],
                    ],
                ]);
            },
        ];
    }
}
