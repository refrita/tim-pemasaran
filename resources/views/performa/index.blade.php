@extends('layouts.app')

@section('title', 'Performa Iklan')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-body">
            {{-- Flash messages --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i> <strong>{{ session('error') }}</strong>
                    @if($errors->any())
                        <ul class="mb-0 mt-1">
                            @foreach($errors->all() as $err)
                                <li>{{ $err }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="mb-0">📊 Daftar Performa Iklan</h3>
                <a href="{{ route('performa.create') }}" class="btn btn-success">
                    <i class="bi bi-plus-circle me-1"></i> Tambah Performa
                </a>
            </div>

            @if($performa->isEmpty())
                <div class="alert alert-info text-center">Belum ada data performa yang tercatat.</div>
            @else
                <div class="table-responsive">
                    <table class="table table-striped table-bordered align-middle">
                        <thead class="table-light">
                            <tr class="text-center">
                                <th scope="col">Tanggal</th>
                                <th scope="col">Tayang</th>
                                <th scope="col">Klik</th>
                                <th scope="col">Konversi</th>
                                <th scope="col">Platform</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($performa as $p)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($p->tanggal)->format('d M Y') }}</td>
                                    <td>{{ number_format($p->jumlah_tayang) }}</td>
                                    <td>{{ number_format($p->jumlah_klik) }}</td>
                                    <td>{{ $p->konversi }}</td>
                                    <td>{{ $p->id_platform }}</td>
<td class="text-center">
    <a href="{{ route('performa.show', $p->id) }}" class="btn btn-info btn-sm me-1">
        👁️ <i class="bi bi-eye"></i>
    </a>
    <a href="{{ route('performa.edit', $p->id) }}" class="btn btn-warning btn-sm me-1">
        ✏️ <i class="bi bi-pencil-square"></i>
    </a>
    <form action="{{ route('performa.destroy', $p->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm">
            🗑️ <i class="bi bi-trash"></i>
        </button>
    </form>
</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

            <a href="{{ url('/') }}" class="btn btn-secondary mt-3">
                ← Kembali ke beranda
            </a>
        </div>
    </div>
</div>
@endsection
