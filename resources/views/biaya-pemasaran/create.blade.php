@extends('layouts.app')

@section('title', 'Tambah Biaya Pemasaran')

@section('content')
<div class="container mt-5">
    <div class="mb-4 border-bottom pb-2 d-flex align-items-center gap-2">
        <h2 class="fw-bold text-primary-emphasis">➕ Tambah Biaya Pemasaran</h2>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger rounded-3 shadow-sm">
            <strong>Terjadi kesalahan:</strong>
            <ul class="mb-0 mt-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('biaya-pemasaran.store') }}" method="POST" class="shadow-sm p-4 rounded-4 border bg-light-subtle">
        @csrf

        <div class="row">
            <div class="col-md-6">
                <!-- Total Anggaran -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">💰 Total Anggaran (Rp)</label>
                    <input 
                        type="number" 
                        name="total_anggaran" 
                        class="form-control @error('total_anggaran') is-invalid @enderror" 
                        value="{{ old('total_anggaran') }}"
                        min="0"
                        required
                    >
                    @error('total_anggaran')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Anggaran Tersedia -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">📦 Anggaran Tersedia (Rp)</label>
                    <input 
                        type="number" 
                        name="anggaran_tersedia" 
                        class="form-control @error('anggaran_tersedia') is-invalid @enderror" 
                        value="{{ old('anggaran_tersedia') }}"
                        min="0"
                        required
                    >
                    @error('anggaran_tersedia')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <!-- Bulan Berlaku -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">📅 Bulan Berlaku</label>
                    <input 
                        type="date" 
                        name="bulan_berlaku" 
                        class="form-control @error('bulan_berlaku') is-invalid @enderror" 
                        value="{{ old('bulan_berlaku') }}"
                        required
                    >
                    @error('bulan_berlaku')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Status -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">📊 Status</label>
                    <select 
                        name="status" 
                        class="form-select @error('status') is-invalid @enderror" 
                        required
                    >
                        <option value="">Pilih Status</option>
                        <option value="aktif" @selected(old('status') == 'aktif')>Aktif</option>
                        <option value="nonaktif" @selected(old('status') == 'nonaktif')>Nonaktif</option>
                        <option value="terpakai" @selected(old('status') == 'terpakai')>Terpakai</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('biaya-pemasaran.index') }}" class="btn btn-outline-secondary rounded-pill shadow-sm">
                ← Kembali
            </a>
            <button type="submit" class="btn btn-primary rounded-pill px-4 fw-semibold shadow-sm">
                💾 Simpan
            </button>
        </div>
    </form>
</div>

@push('scripts')
<script>
    // Validasi real-time anggaran tersedia
    document.querySelector('input[name="total_anggaran"]').addEventListener('input', function() {
        const anggaranTersedia = document.querySelector('input[name="anggaran_tersedia"]');
        if (parseInt(anggaranTersedia.value) > parseInt(this.value)) {
            anggaranTersedia.setCustomValidity('Anggaran tersedia tidak boleh melebihi total anggaran');
        } else {
            anggaranTersedia.setCustomValidity('');
        }
    });
</script>
@endpush
@endsection