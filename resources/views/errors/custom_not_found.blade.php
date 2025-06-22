@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Pencarian Data</h2>

    {{-- Box Error --}}
    <div class="card p-4 shadow-sm border-danger">
        <h4 class="text-danger">Data Tidak Ditemukan</h4>
        <p class="mb-0">{{ $message ?? 'Data yang Anda cari tidak tersedia atau sudah dihapus.' }}</p>
    </div>

    {{-- Kotak Pencarian --}}
    <form action="{{ route('tim-pemasaran.search') }}" method="GET" class="row g-2 mb-4">
        <div class="col-md-10">
            <input type="text" name="keyword" class="form-control" placeholder="Cari berdasarkan ID atau Nama Pengguna..." value="{{ request('keyword') }}">
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary w-100">
                🔍 Cari
            </button>
        </div>
    </form>

    {{-- Tombol Kembali --}}
    <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">
        &larr; Kembali
    </a>
</div>
@endsection
