@extends('layouts.app')

@section('title', 'Detail Biaya Pemasaran')

@section('content')
<div class="card p-4 shadow-sm">
    <h2 class="mb-4">Detail Biaya Pemasaran</h2>

    <p><strong>Total Anggaran:</strong> {{ $biaya['total_anggaran'] }}</p>
    <p><strong>Anggaran Tersedia:</strong> {{ $biaya['anggaran_tersedia'] }}</p>
    <p><strong>Bulan Berlaku:</strong> {{ $biaya['bulan_berlaku'] }}</p>
    <p><strong>Status:</strong> {{ $biaya['status'] }}</p>

    <a href="{{ route('biaya-pemasaran.index') }}" class="btn btn-secondary mt-3">← Kembali ke daftar</a>
</div>
@endsection
