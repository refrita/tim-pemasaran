@extends('layouts.app')

@section('title', 'Konfirmasi Hapus')

@section('content')
<div class="container mt-4">
    <h2>Konfirmasi Hapus Anggota Tim</h2>

    <div class="alert alert-danger">
        Yakin ingin menghapus <strong>{{ $tim->nama_anggota }}</strong> ({{ $tim->jabatan_anggota }})?
    </div>

    <form action="{{ route('tim-pemasaran.destroy', $tim->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Ya, Hapus</button>
        <a href="{{ route('tim-pemasaran.index') }}" class="btn btn-secondary ms-2">Batal</a>
    </form>
</div>
@endsection
