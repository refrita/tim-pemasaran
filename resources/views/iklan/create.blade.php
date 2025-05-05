@extends('layouts.app')

@section('title', 'Tambah Iklan')

@section('content')
<form action="/iklan" method="POST">
    @csrf
    Nama Iklan: <input type="text" name="nama"><br>
    Kategori: <input type="text" name="kategori"><br>
    Tanggal Peluncuran: <input type="date" name="tanggal_peluncuran"><br>
    Tanggal Selesai: <input type="date" name="tanggal_selesai"><br>
    ID Biaya Pemasaran: <input type="number" name="id_biaya_pemasaran"><br>
    ID Platform: <input type="number" name="id_platform"><br>
    <button type="submit">Simpan</button>
</form>
@endsection
