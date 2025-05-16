@extends('layouts.app')

@section('title', 'Tambah Biaya Pemasaran')

@section('content')
<div class="card p-4 shadow-sm">
    <h2 class="mb-4">Tambah Biaya Pemasaran</h2>

    <form action="/biaya-pemasaran" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Total Anggaran</label>
            <input type="number" name="total_anggaran" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Anggaran Tersedia</label>
            <input type="number" name="anggaran_tersedia" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Bulan Berlaku</label>
            <input type="date" name="bulan_berlaku" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Status</label>
            <input type="text" name="status" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('biaya-pemasaran.index') }}" class="btn btn-secondary ms-2">← Kembali</a>
    </form>
</div>
@endsection
