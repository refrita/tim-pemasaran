@extends('layouts.app')

@section('title', 'Detail Performa')

@section('content')
<div class="container mt-4">
    <div class="card p-4 shadow-sm border-0">
        <h2 class="mb-4 text-primary">
            📊 Detail Performa Iklan
        </h2>

        <ul class="list-group mb-4">
            <li class="list-group-item">
                🆔 <strong>ID:</strong> {{ $performa->id }}
            </li>
            <li class="list-group-item">
                📅 <strong>Tanggal:</strong> {{ $performa->tanggal }}
            </li>
            <li class="list-group-item">
                👁️ <strong>Jumlah Tayang:</strong> {{ number_format($performa->jumlah_tayang) }} tayangan
            </li>
            <li class="list-group-item">
                🖱️ <strong>Jumlah Klik:</strong> {{ number_format($performa->jumlah_klik) }} klik
            </li>
            <li class="list-group-item">
                💡 <strong>Konversi:</strong> {{ $performa->konversi }}%
            </li>
            <li class="list-group-item">
                🌐 <strong>ID Platform:</strong> {{ $performa->id_platform }}
            </li>
        </ul>

        <a href="{{ route('performa.index') }}" class="btn btn-outline-primary">
            ← Kembali ke Daftar Performa
        </a>
    </div>
</div>
@endsection
