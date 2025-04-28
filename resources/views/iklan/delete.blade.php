@extends('layouts.app')

@section('title', 'Hapus Iklan')

@section('content')
<p>Yakin ingin menghapus iklan "{{ $item['judul_iklan'] }}"?</p>
<form action="/iklan/{{ $item['id'] }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Ya, Hapus</button>
    <a href="/iklan">Batal</a>
</form>
@endsection
