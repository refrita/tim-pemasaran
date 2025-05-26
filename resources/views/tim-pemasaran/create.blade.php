@extends('layouts.app')

@section('title', 'Tambah Anggota Tim')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Tambah Anggota Tim Pemasaran</h2>

    {{-- Flash/Error --}}
    @if(session('error'))
        <div class="alert alert-danger">
            <strong>{{ session('error') }}</strong>
            @if($errors->any())
                <ul class="mb-0">
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    @endif

    <form method="POST" action="{{ route('tim-pemasaran.store') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nama Anggota</label>
            <input type="text" name="nama_anggota" class="form-control @error('nama_anggota') is-invalid @enderror" value="{{ old('nama_anggota') }}">
            @error('nama_anggota')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Jabatan</label>
            <input type="text" name="jabatan_anggota" class="form-control @error('jabatan_anggota') is-invalid @enderror" value="{{ old('jabatan_anggota') }}">
            @error('jabatan_anggota')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Nama Pengguna</label>
            <input type="text" name="nama_pengguna" class="form-control @error('nama_pengguna') is-invalid @enderror" value="{{ old('nama_pengguna') }}">
            @error('nama_pengguna')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Kata Sandi</label>
            <input type="password" name="kata_sandi" class="form-control @error('kata_sandi') is-invalid @enderror">
            @error('kata_sandi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">ID Platform</label>
            <input type="number" name="id_platform" class="form-control @error('id_platform') is-invalid @enderror" value="{{ old('id_platform') }}">
            @error('id_platform')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">ID Biaya Pemasaran</label>
            <input type="number" name="id_biaya_pemasaran" class="form-control @error('id_biaya_pemasaran') is-invalid @enderror" value="{{ old('id_biaya_pemasaran') }}">
            @error('id_biaya_pemasaran')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('tim-pemasaran.index') }}" class="btn btn-secondary ms-2">← Kembali</a>
    </form>
</div>
@endsection
