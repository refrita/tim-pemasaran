@extends('layouts.app')

@section('title', 'Hapus Performa')

@section('content')
<p>Yakin ingin menghapus data performa tanggal {{ $item['tanggal'] }}?</p>
<form action="/performa/{{ $performa['id'] }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Ya, Hapus</button>
    <a href="/performa">Batal</a>
</form>
@endsection
