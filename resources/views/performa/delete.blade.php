@extends('layouts.app')

@section('title', 'Hapus Performa')

@section('content')
<div class="container mt-4">
    <div class="card p-4 shadow-sm">
        <h2 class="mb-3">Konfirmasi Hapus Performa</h2>

        {{-- Flash error --}}
        @if(session('error'))
            <div class="alert alert-danger mb-3">{{ session('error') }}</div>
        @endif

        <div class="alert alert-danger">
            Yakin ingin menghapus data performa tanggal <strong>{{ $performa['tanggal'] }}</strong>?
        </div>

        <form action="{{ route('performa.destroy', $performa['id']) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Ya, Hapus</button>
            <a href="{{ route('performa.index') }}" class="btn btn-secondary ms-2">Batal</a>
        </form>
    </div>
</div>
@endsection
