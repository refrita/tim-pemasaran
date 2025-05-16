@extends('layouts.app')

@section('title', 'Edit Anggota Tim')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Edit Anggota Tim</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('tim-pemasaran.update', $tim->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama Anggota</label>
            <input type="text" name="nama_anggota" value="{{ old('nama_anggota', $tim->nama_anggota) }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Jabatan</label>
            <input type="text" name="jabatan_anggota" value="{{ old('jabatan_anggota', $tim->jabatan_anggota) }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Nama Pengguna</label>
            <input type="text" name="nama_pengguna" value="{{ old('nama_pengguna', $tim->nama_pengguna) }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Kata Sandi</label>
            <input type="password" name="kata_sandi" placeholder="Biarkan kosong jika tidak ingin mengubah" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">ID Platform</label>
            <input type="number" name="id_platform" value="{{ old('id_platform', $tim->id_platform) }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">ID Biaya Pemasaran</label>
            <input type="number" name="id_biaya_pemasaran" value="{{ old('id_biaya_pemasaran', $tim->id_biaya_pemasaran) }}" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('tim-pemasaran.index') }}" class="btn btn-secondary ms-2">← Kembali</a>
    </form>
</div>
@endsection
