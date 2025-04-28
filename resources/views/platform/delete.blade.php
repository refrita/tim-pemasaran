@extends('layouts.app')

@section('title', 'Konfirmasi Hapus Platform')

@section('content')
<p>Yakin ingin menghapus platform {{ $item['nama_platform'] }}?</p>
<form action="/platform/{{ $item['id'] }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Ya, Hapus</button>
    <a href="/platform">Batal</a>
</form>
@endsection
