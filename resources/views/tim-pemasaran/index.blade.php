@extends('layouts.app')

@section('title', 'Daftar Tim Pemasaran')

@section('content')
<div class="container mt-4">
    {{-- Flash Message --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Daftar Tim Pemasaran</h2>
        <a href="{{ route('tim-pemasaran.create') }}" class="btn btn-success">+ Tambah Anggota</a>
    </div>

    @if ($tim->isEmpty())
        <div class="alert alert-info">Belum ada data anggota tim pemasaran.</div>
    @else
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tim as $t)
                    <tr>
                        <td>{{ $t->nama_anggota }}</td>
                        <td>{{ $t->jabatan_anggota }}</td>
                        <td>
                            <a href="{{ route('tim-pemasaran.show', $t->id) }}" class="btn btn-info btn-sm">Lihat</a>
                            <a href="{{ route('tim-pemasaran.edit', $t->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <a href="{{ route('tim-pemasaran.delete', $t->id) }}" class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <a href="{{ url('/') }}" class="btn btn-secondary mt-3">← Kembali ke beranda</a>
</div>
@endsection
