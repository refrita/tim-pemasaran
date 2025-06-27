@extends('layouts.app')

@section('title', 'Tambah Anggota Tim')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Tambah Anggota Tim Pemasaran</h2>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Terjadi kesalahan:</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('tim-pemasaran.store') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nama Anggota</label>
            <input type="text" name="nama_anggota" class="form-control" value="{{ old('nama_anggota') }}" required>
            @error('nama_anggota')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Jabatan</label>
            <input type="text" name="jabatan_anggota" class="form-control" value="{{ old('jabatan_anggota') }}" required>
            @error('jabatan_anggota')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Nama Pengguna</label>
            <input type="text" name="nama_pengguna" class="form-control" value="{{ old('nama_pengguna') }}" required>
            @error('nama_pengguna')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Kata Sandi</label>
            <input type="password" name="kata_sandi" class="form-control" required>
            @error('kata_sandi')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">ID Platform</label>
            <input type="number" name="id_platform" class="form-control" value="{{ old('id_platform') }}" required>
            @error('id_platform')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">ID Biaya Pemasaran</label>
            <input type="number" name="id_biaya_pemasaran" class="form-control" value="{{ old('id_biaya_pemasaran') }}" required>
            @error('id_biaya_pemasaran')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('tim-pemasaran.index') }}" class="btn btn-secondary ms-2">← Kembali</a>
    </form>
</div>
@endsection
