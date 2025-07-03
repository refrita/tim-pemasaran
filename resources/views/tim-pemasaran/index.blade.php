@extends('layouts.app')

@section('title', 'Daftar Tim Pemasaran')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-primary-emphasis">👥 Daftar Tim Pemasaran</h2>
        <a href="{{ route('tim-pemasaran.create') }}" class="btn btn-primary rounded-pill shadow-sm">
            ➕ Tambah Anggota
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success shadow-sm rounded-pill px-4 py-2 text-center">
            ✅ {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger shadow-sm rounded-pill px-4 py-2 text-center">
            ⚠️ {{ session('error') }}
        </div>
    @endif

    <div class="card shadow-sm rounded-4">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-4">#</th>
                            <th>Nama Anggota</th>
                            <th>Jabatan</th>
                            <th>Biaya Pemasaran</th>
                            <th>Platform</th>
                            <th class="text-end pe-4">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($tim as $key => $anggota)
                        <tr>
                            <td class="ps-4">{{ $loop->iteration }}</td>
                            <td>{{ $anggota->nama_anggota }}</td>
                            <td>{{ $anggota->jabatan_anggota }}</td>
                            <td>
                                @if($anggota->biayaPemasaran)
                                    <span class="fw-semibold">{{ $anggota->biayaPemasaran->total_anggaran_formatted ?? 'Rp 0' }}</span>
                                    <small class="text-muted d-block">{{ $anggota->biayaPemasaran->status }}</small>
                                @else
                                    <span class="text-danger">Data tidak ditemukan</span>
                                @endif
                            </td>
                            <td>
                                @if($anggota->platform)
                                    {{ $anggota->platform->nama }}
                                    <small class="text-muted d-block">{{ $anggota->platform->jenis }}</small>
                                @else
                                    <span class="text-danger">Data tidak ditemukan</span>
                                @endif
                            </td>
                            <td class="text-end pe-4">
                                <div class="d-flex gap-2 justify-content-end">
                                    <a href="{{ route('tim-pemasaran.show', $anggota->id) }}" 
                                       class="btn btn-sm btn-outline-primary rounded-pill shadow-sm">
                                        👁️ Detail
                                    </a>
                                    <a href="{{ route('tim-pemasaran.edit', $anggota->id) }}" 
                                       class="btn btn-sm btn-outline-warning rounded-pill shadow-sm">
                                        ✏️ Edit
                                    </a>
                                    <form action="{{ route('tim-pemasaran.destroy', $anggota->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="btn btn-sm btn-outline-danger rounded-pill shadow-sm"
                                                onclick="return confirm('Hapus data ini?')">
                                            🗑️ Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-4">Belum ada data tim pemasaran</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @if($tim->hasPages())
    <div class="mt-4">
        {{ $tim->links() }}
    </div>
    @endif
</div>
@endsection