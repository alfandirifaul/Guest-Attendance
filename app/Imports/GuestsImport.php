<?php

namespace App\Imports;

use App\Models\Guest;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class GuestsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // Log the row to see its contents
        Log::info('Row data:', $row);

        // Ensure required fields are not null
        if (!isset($row['nama'], $row['asal_instansi'], $row['tujuan'], $row['menemui'], $row['nomor_telepon'], $row['waktu'])) {
            Log::error('Missing required fields in row:', $row);
            return null;
        }

        return new Guest([
            'nama' => $row['nama'],
            'asal_instansi' => $row['asal_instansi'],
            'tujuan' => $row['tujuan'],
            'bertemu_dengan' => $row['menemui'],
            'nomor_hp' => $row['nomor_telepon'],
            'created_at' => Carbon::createFromFormat('l, d-m-Y H:i:s', $row['waktu']),
            'updated_at' => Carbon::createFromFormat('l, d-m-Y H:i:s', $row['waktu']),
            'foto' => 'null',
        ]);
    }
}
