@extends('layouts.app')

@section('title', 'Konfirmasi Hapus Platform')

@section('content')
<p>Yakin ingin menghapus platform {{ $platform->nama }}?</p>
<form action="/platform/{{ $platform->id }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Ya, Hapus</button>
    <a href="/platform">Batal</a>
</form>
@endsection
