@extends('layouts.app')

@section('title', 'Detail Biaya Pemasaran')

@section('content')
<div class="card p-4 shadow-sm">
    <h2 class="mb-4">Detail Biaya Pemasaran</h2>

    {{-- Pesan sukses dari session --}}
    @if (session('success'))
        <div class="alert alert-success mb-3">{{ session('success') }}</div>
    @endif

    {{-- Pesan error dari session --}}
    @if (session('error'))
        <div class="alert alert-danger mb-3">{{ session('error') }}</div>
    @endif

    <p><strong>ID:</strong> {{ $biaya->id }}</p>
    <p><strong>Total Anggaran:</strong> Rp{{ number_format($biaya['total_anggaran']) }}</p>
    <p><strong>Anggaran Tersedia:</strong> Rp{{ number_format($biaya['anggaran_tersedia']) }}</p>
    <p><strong>Bulan Berlaku:</strong> {{ \Carbon\Carbon::parse($biaya['bulan_berlaku'])->format('F Y') }}</p>
    <p><strong>Status:</strong> {{ $biaya['status'] }}</p>

    <div class="mt-4">
        <a href="{{ route('biaya-pemasaran.edit', $biaya->id) }}" class="btn btn-warning me-2">Edit</a>
        <a href="{{ route('biaya-pemasaran.delete', $biaya->id) }}" class="btn btn-danger me-2">Hapus</a>
        <a href="{{ route('biaya-pemasaran.index') }}" class="btn btn-secondary">← Kembali ke daftar</a>
    </div>
</div>
@endsection
