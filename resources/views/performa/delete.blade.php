@extends('layouts.app')

@section('title', 'Hapus Performa')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Hapus Performa</h2>

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
@endsection
