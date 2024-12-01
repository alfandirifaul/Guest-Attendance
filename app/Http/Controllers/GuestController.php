<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class GuestController extends Controller
{
    public function index()
    {
        $guests = Guest::all();
        return view('guests.index', compact('guests'));
    }

    public function create()
    {
        return view('guests.create');
    }

    public function store(Request $request)
    {
        // image handle
        $image = $request->input('foto');
        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        $imageName = time() . '.png';

        // Simpan gambar menggunakan Storage
        Storage::disk('public')->put('image/' . $imageName, base64_decode($image));

        Guest::create([
            'nama' => $request->nama,
            'asal_instansi' => $request->asal_instansi,
            'tujuan' => $request->tujuan,
            'nomor_hp' => $request->nomor_hp,
            'foto' => $imageName,
        ]);

        return redirect()->route('guests.index')
            ->with('success', 'Guest registered successfully.');
    }
}
