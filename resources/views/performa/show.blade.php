@extends('layouts.app')

@section('title', 'Detail Performa')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Detail Performa</h2>

    <ul class="list-group mb-3">
        <li class="list-group-item"><strong>ID:</strong> {{ $performa->['id'] }}</li>
        <li class="list-group-item"><strong>Tanggal:</strong> {{ $performa['tanggal'] }}</li>
        <li class="list-group-item"><strong>Jumlah Tayang:</strong> {{ $performa['jumlah_tayang'] }}</li>
        <li class="list-group-item"><strong>Jumlah Klik:</strong> {{ $performa['jumlah_klik'] }}</li>
        <li class="list-group-item"><strong>Konversi:</strong> {{ $performa['konversi'] }}</li>
        <li class="list-group-item"><strong>ID Platform:</strong> {{ $performa['id_platform'] }}</li>
    </ul>

    <a href="{{ route('performa.index') }}" class="btn btn-secondary">← Kembali ke daftar</a>
</div>
@endsection
