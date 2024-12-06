<?php

namespace App\Imports;

use App\Models\Guest;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use PhpOffice\PhpSpreadsheet\Spreadsheet\Date;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class GuestsImport implements ToModel, WithHeadingRow
{
    use Importable;
    public function model(array $row)
    {
       $timestamp = Carbon::createFromFormat('l, d-m-Y H:i:s', $row['waktu'])->toDateString();

       $guests = new Guest([
           'nama' => $row['nama'],
           'asal_instansi' => $row['asal_instansi'],
           'tujuan' => $row['tujuan'],
           'bertemu_dengan' => $row['menemui'],
           'nomor_hp' => $row['nomor_telepon'],
           'foto' => 'null',
       ]);

       $guests->created_at = $timestamp;
       $guests->updated_at = $timestamp;

       $guests->save(['timestamps' => false]);

       return $guests;
    }
}
