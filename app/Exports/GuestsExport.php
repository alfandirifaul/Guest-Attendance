<?php

namespace App\Exports;

use App\Models\Guest;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithEvents;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
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
            $guest->image = asset('images/' . $guest->foto);
            return [
                'number' => $index + 1,
                'id' => $guest->id,
                'name' => $guest->nama,
                'origin' => $guest->asal_instansi,
                'purpose' => $guest->tujuan,
                'meet' => $guest->bertemu_dengan,
                'phone_number' => $guest->nomor_hp,
                'time' => $guest->created_at->format('l, d-m-Y H:i:s'),
                'photo' => $guest->foto,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'No.',
            'ID',
            'Nama',
            'Asal Instansi',
            'Tujuan',
            'Menemui',
            'Nomor Telepon',
            'Waktu',
            'Image URL',
            'Foto',
        ];
    }
    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:Z1')->applyFromArray([
            'font' => [
                'bold' => true,
                'size' => 12
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER
            ],
        ]);

        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();

        $sheet->getStyle("A2:{$highestColumn}{$highestRow}")->applyFromArray([
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER
            ],
        ]);
    }


    public function registerEvents(): array
    {
        return [
            \Maatwebsite\Excel\Events\AfterSheet::class => function(\Maatwebsite\Excel\Events\AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();

                foreach ($event->sheet->getDelegate()->getRowIterator() as $row) {
                    $guest = Guest::find($row->getCellIterator()->current()->getValue());
                    if ($guest && isset($guest->foto)) {
                        $fileName = $guest->foto;
                        $filePath = public_path('storage/image/' . $fileName);

                        if (file_exists($filePath)) {
                            $drawing = new Drawing();
                            $drawing->setName('logo')
                                ->setDescription('logo')
                                ->setPath($filePath)
                                ->setWidth(90)
                                ->setCoordinates('J' . $row->getRowIndex())
                                ->setWorksheet($sheet)
                                ->setWidthAndHeight(80, 80)
                                ->setOffsetX(5)
                                ->setOffsetY(5);
                        }
                        $sheet->getRowDimension($row->getRowIndex())->setRowHeight(60);
                    }
                }

                // Set column widths
                $sheet->getColumnDimension('A')->setWidth(10);
                $sheet->getColumnDimension('B')->setWidth(10);
                $sheet->getColumnDimension('C')->setWidth(20);
                $sheet->getColumnDimension('D')->setWidth(25);
                $sheet->getColumnDimension('E')->setWidth(20);
                $sheet->getColumnDimension('F')->setWidth(30);
                $sheet->getColumnDimension('G')->setWidth(30);
                $sheet->getColumnDimension('H')->setWidth(30);
                $sheet->getColumnDimension('I')->setWidth(50);
                $sheet->getColumnDimension('J')->setWidth(50);

                // Apply borders to all cells
                $sheet->getStyle('A1:J' . $sheet->getHighestRow())->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                ]);

                // Apply background color to the header row
                $sheet->getStyle('A1:J1')->applyFromArray([
                    'fill' => [
                        'fillType' => Fill::FILL_SOLID,
                        'color' => ['argb' => 'FFFF00'],
                    ],
                ]);
            },
        ];
    }
}
