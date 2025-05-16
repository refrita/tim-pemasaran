@extends('layouts.app')

@section('title', 'Detail Iklan')

@section('content')
<div class="card p-4 shadow-sm">
    <h2 class="mb-4">Detail Iklan</h2>

    <p><strong>Nama Iklan:</strong> {{ $iklan->nama }}</p>
    <p><strong>Kategori:</strong> {{ $iklan->kategori }}</p>
    <p><strong>Tanggal Peluncuran:</strong> {{ $iklan->tanggal_peluncuran }}</p>
    <p><strong>Tanggal Selesai:</strong> {{ $iklan->tanggal_selesai }}</p>
    <p><strong>ID Biaya Pemasaran:</strong> {{ $iklan->id_biaya_pemasaran }}</p>
    <p><strong>ID Platform:</strong> {{ $iklan->id_platform }}</p>

    <a href="{{ route('iklan.index') }}" class="btn btn-secondary mt-3">← Kembali ke daftar</a>
</div>
@endsection
