@extends('layouts.app')

@section('title', 'Tambah Anggota Tim')

@section('content')
<div class="container mt-5">
    <div class="mb-4 border-bottom pb-2 d-flex align-items-center gap-2">
        <h2 class="fw-bold text-primary-emphasis">➕ Tambah Anggota Tim Pemasaran</h2>
    </div>

    @if(session('error'))
        <div class="alert alert-danger shadow-sm rounded-pill px-4 py-2 text-center text-dark fw-semibold">
            ⚠️ {{ session('error') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger rounded-3 shadow-sm">
            <strong>Terjadi kesalahan:</strong>
            <ul class="mb-0 mt-1">
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('tim-pemasaran.store') }}" class="mt-4 shadow-sm p-4 rounded-4 border bg-light-subtle">
        @csrf

        <div class="row">
            <div class="col-md-6">
                <!-- Nama Anggota -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">👤 Nama Anggota</label>
                    <input type="text" name="nama_anggota" 
                           class="form-control @error('nama_anggota') is-invalid @enderror" 
                           value="{{ old('nama_anggota') }}" required>
                    @error('nama_anggota')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Jabatan -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">💼 Jabatan</label>
                    <input type="text" name="jabatan_anggota" 
                           class="form-control @error('jabatan_anggota') is-invalid @enderror" 
                           value="{{ old('jabatan_anggota') }}" required>
                    @error('jabatan_anggota')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Nama Pengguna -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">🧾 Nama Pengguna</label>
                    <input type="text" name="nama_pengguna" 
                           class="form-control @error('nama_pengguna') is-invalid @enderror" 
                           value="{{ old('nama_pengguna') }}" required>
                    @error('nama_pengguna')
                        <div class="invalid-feedback">
                            {{ $message == 'The nama pengguna has already been taken.' ? 'Nama pengguna sudah dipakai.' : $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <!-- Kata Sandi -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">🔒 Kata Sandi</label>
                    <input type="password" name="kata_sandi" 
                           class="form-control @error('kata_sandi') is-invalid @enderror" 
                           required minlength="8">
                    <small class="text-muted">Minimal 8 karakter</small>
                    @error('kata_sandi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Konfirmasi Kata Sandi -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">🔁 Konfirmasi Kata Sandi</label>
                    <input type="password" name="kata_sandi_confirmation" 
                           class="form-control" required minlength="8">
                </div>

                <!-- ID Platform -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">📱 Platform</label>
                    <select name="id_platform" class="form-select @error('id_platform') is-invalid @enderror" required>
                        <option value="">Pilih Platform</option>
                        @foreach($platforms as $platform)
                            <option value="{{ $platform->id }}" @selected(old('id_platform') == $platform->id)>
                                {{ $platform->nama }} ({{ $platform->jenis }})
                            </option>
                        @endforeach
                    </select>
                    @error('id_platform')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Pilih Biaya Pemasaran -->
                <!-- Pilih Biaya Pemasaran -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">💰 Biaya Pemasaran</label>
                    <select name="id_biaya_pemasaran" class="form-select @error('id_biaya_pemasaran') is-invalid @enderror" required>
                        <option value="">Pilih Biaya Pemasaran</option>
                        @foreach($biaya_pemasarans as $biaya)
                            <option value="{{ $biaya->id }}" @selected(old('id_biaya_pemasaran') == $biaya->id)>
                                {{ $biaya->display }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_biaya_pemasaran')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('tim-pemasaran.index') }}" class="btn btn-outline-secondary rounded-pill shadow-sm">
                ← Kembali
            </a>
            <button type="submit" class="btn btn-primary rounded-pill px-4 fw-semibold shadow-sm">
                💾 Simpan
            </button>
        </div>
    </form>
</div>
@endsection