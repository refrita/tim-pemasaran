@extends('layouts.app')

@section('title', 'Konfirmasi Hapus')

@section('content')
<p>Yakin ingin menghapus {{ $item['nama_anggota'] }} ({{ $item['jabatan'] }})?</p>
<form action="/tim-pemasaran/{{ $item['id'] }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Ya, Hapus</button>
    <a href="/tim-pemasaran">Batal</a>
</form>
@endsection
