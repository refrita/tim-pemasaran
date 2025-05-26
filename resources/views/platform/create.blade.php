@extends('layouts.app')

@section('title', 'Tambah Platform')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Tambah Platform</h2>

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

    <form action="{{ route('platform.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nama Platform</label>
            <input
                type="text"
                name="nama_platform"
                class="form-control @error('nama_platform') is-invalid @enderror"
                value="{{ old('nama_platform') }}"
            >
            @error('nama_platform')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Jenis Platform</label>
            <input
                type="text"
                name="jenis_platform"
                class="form-control @error('jenis_platform') is-invalid @enderror"
                value="{{ old('jenis_platform') }}"
            >
            @error('jenis_platform')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('platform.index') }}" class="btn btn-secondary ms-2">← Kembali ke daftar</a>
    </form>
</div>
@endsection
