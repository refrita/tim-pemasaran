@extends('layouts.app')

@section('title', 'Performa Iklan')

@section('content')
<div class="container mt-4">
    {{-- Flash messages --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">
            <strong>{{ session('error') }}</strong>
            @if($errors->any())
                <ul class="mb-0">
                    @foreach($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Daftar Performa Iklan</h2>
        <a href="{{ route('performa.create') }}" class="btn btn-success">+ Tambah Performa</a>
    </div>

    @if($performa->isEmpty())
        <div class="alert alert-info">Belum ada data performa.</div>
    @else
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>Tanggal</th>
                    <th>Tayang</th>
                    <th>Klik</th>
                    <th>Konversi</th>
                    <th>ID Platform</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($performa as $p)
                    <tr>
                        <td>{{ \Illuminate\Support\Carbon::parse($p->tanggal)->format('d-m-Y') }}</td>
                        <td>{{ number_format($p->jumlah_tayang) }}</td>
                        <td>{{ number_format($p->jumlah_klik) }}</td>
                        <td>{{ $p->konversi }}</td>
                        <td>{{ $p->id_platform }}</td>
                        <td>
                            <a href="{{ route('performa.show', $p->id) }}" class="btn btn-info btn-sm">Lihat</a>
                            <a href="{{ route('performa.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <a href="{{ route('performa.delete', $p->id) }}" class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <a href="{{ url('/') }}" class="btn btn-secondary mt-3">← Kembali ke beranda</a>
</div>
@endsection
