<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Mail\GuestRegisteredMail;
use Illuminate\Support\Facades\Mail;


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
                'nomor_hp' => 'required|digits_between:9,15',
                'foto' => 'required|string',
            ], [
                'nama.required' => 'Nama wajib diisi.',
                'asal_instansi.required' => 'Asal instansi harus diisi.',
                'tujuan.required' => 'Tujuan kunjungan harus diisi.',
                'nomor_hp.required' => 'Nomor HP wajib diisi.',
                'nomor_hp.digits_between' => 'Nomor HP harus terdiri dari 9-15 digit.',
                'foto.required' => 'Lakukan Capture Photo'
            ]);


        $image = $request->input('foto');
        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        $imageName = time() . '.png';

        Storage::disk('public')->put('image/' . $imageName, base64_decode($image));

        $guests = Guest::create([
            'nama' => $request->nama,
            'asal_instansi' => $request->asal_instansi,
            'tujuan' => $request->tujuan,
            'nomor_hp' => $request->nomor_hp,
            'foto' => $imageName,
        ]);

        $adminEmail = 'admin@example.com';
        Mail::to($adminEmail)->send(new GuestRegisteredMail($guests));

        return redirect()->route('guests.index')
            ->with('success', 'Guest registered successfully.');
    }

    public function showAll()
    {
        $guests = Guest::all();
        return view('guests.all', compact('guests'));
    }
}

