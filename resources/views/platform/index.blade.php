@extends('layouts.app')

@section('title', 'Daftar Platform')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Daftar Platform</h2>
        <a href="{{ route('platform.create') }}" class="btn btn-success">+ Tambah Platform</a>
    </div>

    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>Nama Platform</th>
                <th>Jenis</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($platform as $p)
                <tr>
                    <td>{{ $p->nama }}</td>
                    <td>{{ $p->jenis }}</td>
                    <td>
                        <a href="{{ route('platform.show', $p->id) }}" class="btn btn-info btn-sm">Lihat</a>
                        <a href="{{ route('platform.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <a href="{{ route('platform.delete', $p->id) }}" class="btn btn-danger btn-sm">Hapus</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ url('/') }}" class="btn btn-secondary mt-3">← Kembali ke beranda</a>
</div>
@endsection
