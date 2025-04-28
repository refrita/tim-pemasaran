@extends('layouts.app')

@section('title', 'Edit Biaya Pemasaran')

@section('content')
<form action="/biaya-pemasaran/{{ $item['id'] }}" method="POST">
    @csrf
    @method('PUT')
    Total Anggaran: <input type="number" name="total_anggaran" value="{{ $item['total_anggaran'] }}"><br>
    Anggaran Tersedia: <input type="number" name="anggaran_tersedia" value="{{ $item['anggaran_tersedia'] }}"><br>
    Bulan Berlaku: <input type="date" name="bulan_berlaku" value="{{ $item['bulan_berlaku'] }}"><br>
    Status: <input type="text" name="status" value="{{ $item['status'] }}"><br>
    <button type="submit">Update</button>
</form>
@endsection
