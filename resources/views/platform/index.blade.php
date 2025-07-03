@extends('layouts.app')

@section('title', 'Daftar Platform')

@section('content')
<div class="container mt-5">

    {{-- Flash Message --}}
    @if(session('success'))
        <div class="alert alert-success shadow-sm rounded-pill px-4 py-2 text-center text-dark fw-semibold">
            ✅ {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger shadow-sm rounded-pill px-4 py-2 text-center text-dark fw-semibold">
            ⚠️ {{ session('error') }}
        </div>
    @endif

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-2">
        <h2 class="fw-bold text-primary-emphasis">📱 Daftar Platform</h2>
        <a href="{{ route('platform.create') }}" class="btn btn-success rounded-pill fw-semibold shadow-sm">
            ➕ Tambah Platform
        </a>
    </div>

    {{-- Tabel atau Kosong --}}
    @if ($platform->isEmpty())
        <div class="alert alert-info shadow-sm rounded-3 text-center">
            ℹ️ Belum ada data platform. Yuk tambahkan sekarang!
        </div>
    @else
        <div class="table-responsive shadow-sm rounded-4 border border-2 border-light-subtle">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light text-center">
                    <tr class="text-dark fw-semibold">
                        <th>📛 Nama</th>
                        <th>📂 Jenis</th>
                        <th style="width: 200px;">⚙️ Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($platform as $p)
                        <tr class="bg-body-secondary text-dark">
                            <td class="text-start ps-4">{{ $p->nama }}</td>
                            <td>{{ $p->jenis }}</td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('platform.show', $p->id) }}" class="btn btn-sm btn-outline-info rounded-pill" title="Lihat">
                                        🔍
                                    </a>
                                    <a href="{{ route('platform.edit', $p->id) }}" class="btn btn-sm btn-outline-warning rounded-pill" title="Edit">
                                        ✏️
                                    </a>
                                    <form action="{{ route('platform.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill" title="Hapus">
                                            🗑️
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    {{-- Kembali --}}
    <div class="mt-4">
        <a href="{{ url('/') }}" class="btn btn-outline-secondary rounded-pill shadow-sm">
            ← Kembali ke Beranda
        </a>
    </div>
</div>
@endsection
