@extends('layouts.app')

@section('title', 'Performa Iklan')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Daftar Performa Iklan</h2>
        <a href="{{ route('performa.create') }}" class="btn btn-success">+ Tambah Performa</a>
    </div>

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
                    <td>{{ $p->tanggal }}</td>
                    <td>{{ $p->jumlah_tayang }}</td>
                    <td>{{ $p->jumlah_klik }}</td>
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

    <a href="{{ url('/') }}" class="btn btn-secondary mt-3">← Kembali ke beranda</a>
</div>
@endsection
