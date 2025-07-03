@extends('layouts.app')

@section('title', 'Detail Anggota Tim')

@section('content')
<div class="container mt-5">
    <div class="mb-4 border-bottom pb-2 d-flex align-items-center gap-2">
        <h2 class="fw-bold text-primary-emphasis">📋 Detail Anggota Tim</h2>
    </div>

    <div class="card shadow-sm rounded-4 border border-light-subtle mb-4">
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <strong class="text-secondary">🆔 ID:</strong>
                    <span class="ms-2 text-dark">{{ $tim->id }}</span>
                </li>
                <li class="list-group-item">
                    <strong class="text-secondary">👤 Nama:</strong>
                    <span class="ms-2 text-dark">{{ $tim->nama_anggota }}</span>
                </li>
                <li class="list-group-item">
                    <strong class="text-secondary">💼 Jabatan:</strong>
                    <span class="ms-2 text-dark">{{ $tim->jabatan_anggota }}</span>
                </li>
                <li class="list-group-item">
                    <strong class="text-secondary">🧾 Nama Pengguna:</strong>
                    <span class="ms-2 text-dark">{{ $tim->nama_pengguna }}</span>
                </li>
                <li class="list-group-item">
                    <strong class="text-secondary">📱 ID Platform:</strong>
                    <span class="ms-2 text-dark">{{ $tim->id_platform }}</span>
                </li>
                <li class="list-group-item">
                    <strong class="text-secondary">💰 ID Biaya Pemasaran:</strong>
                    <span class="ms-2 text-dark">{{ $tim->id_biaya_pemasaran }}</span>
                </li>
            </ul>
        </div>
    </div>

    <a href="{{ route('tim-pemasaran.index') }}" class="btn btn-outline-secondary rounded-pill shadow-sm">
        ← Kembali ke Daftar
    </a>
</div>
@endsection