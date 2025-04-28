@extends('layouts.app')

@section('title', 'Konfirmasi Hapus Biaya Pemasaran')

@section('content')
<p>Yakin ingin menghapus biaya pemasaran bulan {{ $item['bulan_berlaku'] }}?</p>
<form action="/biaya-pemasaran/{{ $item['id'] }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Ya, Hapus</button>
    <a href="/biaya-pemasaran">Batal</a>
</form>
@endsection
