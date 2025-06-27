@extends('layouts.app')

@section('title', 'Daftar Iklan')

@section('content')
    @if (session('success'))
        <div class="alert alert-success mb-3">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger mb-3">{{ session('error') }}</div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Daftar Iklan</h2>
        <a href="{{ route('iklan.create') }}" class="btn btn-primary">+ Tambah Iklan</a>
    </div>

    @if($iklans->isEmpty())
        <div class="alert alert-info">Belum ada data iklan.</div>
    @else
        <div class="list-group">
            @foreach ($iklans as $i)
                <div class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <strong>{{ $i->nama }}</strong> — {{ $i->kategori }}
                    </div>
                    <div>
                        <a href="{{ route('iklan.show', $i->id) }}" class="btn btn-sm btn-info">Lihat</a>
                        <a href="{{ route('iklan.edit', $i->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <a href="{{ route('iklan.delete', $i->id) }}" class="btn btn-sm btn-danger">Hapus</a>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <a href="{{ url('/') }}" class="btn btn-secondary mt-4">← Kembali</a>
@endsection
