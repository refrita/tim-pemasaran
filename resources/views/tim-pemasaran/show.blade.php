@extends('layouts.app')

@section('title', 'Detail Anggota Tim')

@section('content')
<div class="container mt-4">
    <h2>Detail Anggota Tim</h2>

    <ul class="list-group mb-3">
        <li class="list-group-item"><strong>Nama:</strong> {{ $tim->nama_anggota }}</li>
        <li class="list-group-item"><strong>Jabatan:</strong> {{ $tim->jabatan_anggota }}</li>
        <li class="list-group-item"><strong>Nama Pengguna:</strong> {{ $tim->nama_pengguna }}</li>
        <li class="list-group-item"><strong>ID Platform:</strong> {{ $tim->id_platform }}</li>
        <li class="list-group-item"><strong>ID Biaya Pemasaran:</strong> {{ $tim->id_biaya_pemasaran }}</li>
    </ul>

    <a href="{{ route('tim-pemasaran.index') }}" class="btn btn-secondary">← Kembali</a>
</div>
@endsection
