@extends('layouts.app')

@section('title', 'Konfirmasi Hapus Iklan')

@section('content')
<p>Yakin ingin menghapus iklan {{ $iklan->nama }}?</p>
<form action="/iklan/{{ $iklan->id }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Ya, Hapus</button>
    <a href="/iklan">Batal</a>
</form>
@endsection
