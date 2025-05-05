@extends('layouts.app')

@section('title', 'Edit Iklan')

@section('content')
<form action="/iklan/{{ $iklan->id }}" method="POST">
    @csrf
    @method('PUT')
    Nama Iklan: <input type="text" name="nama" value="{{ $iklan->nama }}"><br>
    Kategori: <input type="text" name="kategori" value="{{ $iklan->kategori }}"><br>
    Tanggal Peluncuran: <input type="date" name="tanggal_peluncuran" value="{{ $iklan->tanggal_peluncuran }}"><br>
    Tanggal Selesai: <input type="date" name="tanggal_selesai" value="{{ $iklan->tanggal_selesai }}"><br>
    ID Biaya Pemasaran: <input type="number" name="id_biaya_pemasaran" value="{{ $iklan->id_biaya_pemasaran }}"><br>
    ID Platform: <input type="number" name="id_platform" value="{{ $iklan->id_platform }}"><br>
    <button type="submit">Update</button>
</form>

<a href="{{ route('iklan.index') }}" style="display: inline-block; margin-top: 20px;">← Kembali ke daftar</a>
@endsection
