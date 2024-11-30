<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guest;


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
        $request->validate([
            'nama' => 'required|string|max:255',
            'asal_instansi' => 'required|string|max:255',
            'tujuan' => 'required|string|max:255',
            'nomor_hp' => 'required|string|max:15',
            'foto' => 'required|string',
        ]);

        // image handle
        $image = $request->input('foto');
        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        $imageName = time() . '.png';
        File::put(public_path('images') . '/' . $imageName, base64_decode($image));

        Guest::create([
            'nama' => $request->nama,
            'asal_instansi' => $request->asal_instansi,
            'tujuan' => $request->tujuan,
            'nomor_hp' => $request->nomor_hp,
            'foto' => $imageName,
        ]);

        return redirect()->route('guests.create')
            ->with('success', 'Guest registered successfully.');
    }
}
