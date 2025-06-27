@extends('layouts.app')

@section('title', 'Detail Iklan')

@section('content')
<div class="card p-4 shadow-sm">
    <h2 class="mb-4">Detail Iklan</h2>

    {{-- Flash messages --}}
    @if (session('success'))
        <div class="alert alert-success mb-3">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger mb-3">{{ session('error') }}</div>
    @endif

    <p><strong>ID:</strong> {{ $iklan->id }}</p>
    <p><strong>Nama Iklan:</strong> {{ $iklan->nama }}</p>
    <p><strong>Kategori:</strong> {{ $iklan->kategori }}</p>
    <p><strong>Tanggal Peluncuran:</strong> {{ \Carbon\Carbon::parse($iklan->tanggal_peluncuran)->format('d M Y') }}</p>
    <p><strong>Tanggal Selesai:</strong> {{ \Carbon\Carbon::parse($iklan->tanggal_selesai)->format('d M Y') }}</p>
    <p><strong>ID Biaya Pemasaran:</strong> {{ $iklan->id_biaya_pemasaran }}</p>
    <p><strong>ID Platform:</strong> {{ $iklan->id_platform }}</p>

    <div class="mt-4">
        <a href="{{ route('iklan.edit', $iklan->id) }}" class="btn btn-warning me-2">Edit</a>
        <a href="{{ route('iklan.delete', $iklan->id) }}" class="btn btn-danger me-2">Hapus</a>
        <a href="{{ route('iklan.index') }}" class="btn btn-secondary">← Kembali ke daftar</a>
    </div>
</div>
@endsection
