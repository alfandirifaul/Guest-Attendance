@extends('layouts.app')

@section('content')
    <h1>New Guest Registered</h1>
    <p>Name: {{ $guest->nama }}</p>
    <p>Institution: {{ $guest->asal_instansi }}</p>
    <p>Purpose: {{ $guest->tujuan }}</p>
    <p>Phone: {{ $guest->nomor_hp }}</p>
    <p><img src="{{ asset('storage/image/' . $guest->foto) }}" alt="Guest Photo" style="max-width: 200px;"></p>
@endsection
