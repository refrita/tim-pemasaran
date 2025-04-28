@extends('layouts.app')

@section('title', 'Tambah Biaya Pemasaran')

@section('content')
<form action="/biaya-pemasaran" method="POST">
    @csrf
    Total Anggaran: <input type="number" name="total_anggaran"><br>
    Anggaran Tersedia: <input type="number" name="anggaran_tersedia"><br>
    Bulan Berlaku: <input type="date" name="bulan_berlaku"><br>
    Status: <input type="text" name="status"><br>
    <button type="submit">Simpan</button>
</form>
@endsection
