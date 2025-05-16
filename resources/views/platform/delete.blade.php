@extends('layouts.app')

@section('title', 'Konfirmasi Hapus Platform')

@section('content')
<div class="container mt-4">
    <h2>Konfirmasi Hapus</h2>

    <div class="alert alert-danger">
        Yakin ingin menghapus platform <strong>{{ $platform->nama }}</strong>?
    </div>

    <form action="{{ route('platform.destroy', $platform->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Ya, Hapus</button>
        <a href="{{ route('platform.index') }}" class="btn btn-secondary ms-2">Batal</a>
    </form>
</div>
@endsection
