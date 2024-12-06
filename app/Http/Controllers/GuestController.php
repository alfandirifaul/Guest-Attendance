<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Guest;
use App\Imports\GuestsImport;
use App\Exports\GuestsExport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Mail\GuestRegisteredMail;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class GuestController extends Controller
{
    public function index()
    {
        $guests = Guest::orderBy('created_at', 'desc')
            ->get();
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
                'bertemu_dengan' => 'required|string|max:255',
                'nomor_hp' => 'required|digits_between:9,15',
                'foto' => 'required|string',
            ], [
                'nama.required' => 'Nama wajib diisi.',
                'asal_instansi.required' => 'Asal instansi harus diisi.',
                'tujuan.required' => 'Tujuan kunjungan harus diisi.',
                'bertemu_dengan.required' => 'Nama orang yang ditemui harus diisi.',
                'nomor_hp.required' => 'Nomor HP wajib diisi.',
                'nomor_hp.digits_between' => 'Nomor HP harus terdiri dari 9-15 digit.',
                'foto.required' => 'Lakukan Capture Photo',
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
            'bertemu_dengan' => $request->bertemu_dengan,
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
        $guests = Guest::orderBy('created_at', 'desc')
            ->paginate(50);
        return view('guests.all', [
            'title' => 'All Guest List',
            'guests' => $guests,
        ]);
    }

    public function showPersonal($id)
    {
        $guest = Guest::findOrFail($id);

        return view('guests.personal', compact('guest'));
    }

    public function dashboard()
    {
        $recentGuests = Guest::orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        $weeklyGuests = Guest::whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek()
        ])->count();

        $monthlyGuests = Guest::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->count();

        $yearlyGuests = Guest::whereYear('created_at', Carbon::now()->year)
            ->count();

        $totalGuests = Guest::count();

        $user = Auth::user();

        return view('guests.dashboard', compact(
            'recentGuests',
            'weeklyGuests',
            'monthlyGuests',
            'yearlyGuests',
            'totalGuests',
            'user',
        ));
    }

    public function weeklyGuests()
    {
        $weeklyGuests = Guest::whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek()
        ])->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('guests.all', [
            'title' => 'Weekly Guests',
            'guests' => $weeklyGuests,
        ]);
    }

    public function monthlyGuests()
    {
        $monthlyGuests = Guest::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->orderBy('created_at', 'desc')
            ->paginate(30);

        return view('guests.all', [
            'title' => 'Monthly Guests',
            'guests' => $monthlyGuests,
        ]);
    }

    public function yearlyGuests()
    {
        $yearlyGuests = Guest::whereYear('created_at', Carbon::now()->year)
            ->orderBy('created_at', 'desc')
            ->paginate(60);

        return view('guests.all', [
            'title' => 'Yearly Guests',
            'guests' => $yearlyGuests
        ]);
    }

    public function exportGuests()
    {
        $fileUrl = route('guests.export');

        return view('guests.export', compact('fileUrl'));
    }

    public function importGuests(Request $request)
    {
        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $file->move('GuestsList', $fileName);

        Excel::import(new GuestsImport, public_path('GuestsList/'.$fileName));

        return redirect('/dashboard');

    }
}

