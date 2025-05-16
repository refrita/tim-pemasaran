@extends('layouts.app')

@section('title', 'Edit Biaya Pemasaran')

@section('content')
<div class="card p-4 shadow-sm">
    <h2 class="mb-4">Edit Biaya Pemasaran</h2>

    <form action="{{ route('biaya-pemasaran.update', $biaya['id']) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Total Anggaran</label>
            <input type="number" name="total_anggaran" class="form-control" value="{{ $biaya['total_anggaran'] }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Anggaran Tersedia</label>
            <input type="number" name="anggaran_tersedia" class="form-control" value="{{ $biaya['anggaran_tersedia'] }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Bulan Berlaku</label>
            <input type="date" name="bulan_berlaku" class="form-control" value="{{ \Carbon\Carbon::parse($biaya->bulan_berlaku)->format('Y-m-d') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Status</label>
            <input type="text" name="status" class="form-control" value="{{ $biaya['status'] }}">
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('biaya-pemasaran.index') }}" class="btn btn-secondary ms-2">← Kembali</a>
    </form>
</div>
@endsection
