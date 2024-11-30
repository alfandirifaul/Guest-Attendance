@extends('layouts.app')

@section('content')

    <div class="px-8 py-8">
        <div class="px-4 py-4 flex items-center justify-center mb-8">
            <h1 class="font-bold text-2xl">Guest List</h1>
        </div>

        <div class="flex justify-center">
            <table class="px-8 py-8 border-collapse border border-gray-300">
                <thead>
                <tr class="bg-blue-300">
                    <th class="border border-gray-300 px-4 py-2">Nama</th>
                    <th class="border border-gray-300 px-4 py-2">Asal Istansi</th>
                    <th class="border border-gray-300 px-4 py-2">Tujuan</th>
                    <th class="border border-gray-300 px-4 py-2">Nomor HP</th>
                    <th class="border border-gray-300 px-4 py-2">Foto</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($guests as $guest)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $guest->nama }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $guest->asal_instansi }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $guest->tujuan }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $guest->nomor_hp }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            @if ($guest->foto)
                                <img src="{{ asset('storage/' . $guest->foto) }}" width="100">
                            @else
                                No Photo
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
