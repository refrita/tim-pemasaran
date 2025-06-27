@extends('layouts.app')

@section('title', 'Hapus Platform')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Hapus Platform</h2>

    <div class="alert alert-danger">
        Yakin ingin menghapus platform <strong>{{ $platform->nama }}</strong>?
    </div>

    <form method="POST" action="{{ route('platform.destroy', $platform->id) }}">
        @csrf
        @method('DELETE')

        <button type="submit" class="btn btn-danger">Ya, Hapus</button>
        <a href="{{ route('platform.index') }}" class="btn btn-secondary ms-2">Batal</a>
    </form>
</div>
@endsection
