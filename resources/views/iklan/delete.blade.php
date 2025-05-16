@extends('layouts.app')

@section('title', 'Konfirmasi Hapus Iklan')

@section('content')
<div class="card p-4 shadow-sm">
    <h2 class="mb-4 text-danger">Konfirmasi Hapus Iklan</h2>

    <p>Yakin ingin menghapus iklan <strong>{{ $iklan->nama }}</strong>?</p>

    <form action="{{ route('iklan.destroy', $iklan->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Ya, Hapus</button>
        <a href="{{ route('iklan.index') }}" class="btn btn-secondary ms-2">Batal</a>
    </form>
</div>
@endsection
