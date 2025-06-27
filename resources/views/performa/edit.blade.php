@extends('layouts.app')

@section('title', 'Edit Performa')

@section('content')
<div class="container mt-4">
    <div class="card p-4 shadow-sm">
        <h2 class="mb-4">Edit Performa</h2>

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

        <form method="POST" action="{{ route('performa.update', $performa->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Jumlah Tayang</label>
                <input type="number" name="jumlah_tayang" class="form-control @error('jumlah_tayang') is-invalid @enderror" value="{{ old('jumlah_tayang', $performa->jumlah_tayang) }}" required>
                @error('jumlah_tayang')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Jumlah Klik</label>
                <input type="number" name="jumlah_klik" class="form-control @error('jumlah_klik') is-invalid @enderror" value="{{ old('jumlah_klik', $performa->jumlah_klik) }}" required>
                @error('jumlah_klik')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Konversi</label>
                <input type="number" step="0.01" name="konversi" class="form-control @error('konversi') is-invalid @enderror" value="{{ old('konversi', $performa->konversi) }}" required>
                @error('konversi')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal</label>
                <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{ old('tanggal', \Illuminate\Support\Carbon::parse($performa->tanggal)->format('Y-m-d')) }}" required>
                @error('tanggal')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label">ID Platform</label>
                <input type="number" name="id_platform" class="form-control @error('id_platform') is-invalid @enderror" value="{{ old('id_platform', $performa->id_platform) }}" required>
                @error('id_platform')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('performa.index') }}" class="btn btn-secondary ms-2">← Kembali</a>
        </form>
    </div>
</div>
@endsection
