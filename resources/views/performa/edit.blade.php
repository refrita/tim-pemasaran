@extends('layouts.app')

@section('title', 'Edit Performa')

@section('content')
<form action="/performa/{{ $performa['id'] }}" method="POST">
    @csrf
    @method('PUT')
    Jumlah Tayang: <input type="number" name="jumlah_tayang" value="{{ $performa['jumlah_tayang'] }}"><br>
    Jumlah Klik: <input type="number" name="jumlah_klik" value="{{ $performa['jumlah_klik'] }}"><br>
    Konversi: <input type="number" name="konversi" value="{{ $performa['konversi'] }}"><br>
    Tanggal: <input type="date" name="tanggal" value="{{ $performa['tanggal'] }}"><br>
    <button type="submit">Update</button>
</form>
@endsection
