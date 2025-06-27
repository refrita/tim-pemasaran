@extends('layouts.app')

@section('title', 'Edit Platform')

@section('content')
<div class="card p-4 shadow-sm">
    <h2 class="mb-4">Edit Platform</h2>

    @if(session('error'))
        <div class="alert alert-danger mb-3">
            <strong>{{ session('error') }}</strong>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger mb-3">
            <strong>Terjadi kesalahan:</strong>
            <ul class="mb-0">
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('platform.update', $platform->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama Platform</label>
            <input type="text" name="nama_platform" class="form-control @error('nama_platform') is-invalid @enderror" value="{{ old('nama_platform', $platform->nama) }}" required>
            @error('nama_platform')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Jenis Platform</label>
            <input type="text" name="jenis_platform" class="form-control @error('jenis_platform') is-invalid @enderror" value="{{ old('jenis_platform', $platform->jenis) }}" required>
            @error('jenis_platform')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('platform.index') }}" class="btn btn-secondary ms-2">← Kembali ke daftar</a>
    </form>
</div>
@endsection
