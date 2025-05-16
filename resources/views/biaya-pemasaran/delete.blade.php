@extends('layouts.app')

@section('title', 'Konfirmasi Hapus Biaya Pemasaran')

@section('content')
<div class="card p-4 shadow-sm">
    <h2 class="mb-4 text-danger">Konfirmasi Hapus</h2>

    <p>Yakin ingin menghapus biaya pemasaran bulan <strong>{{ $biaya['bulan_berlaku'] }}</strong>?</p>

    <form action="/biaya-pemasaran/{{ $biaya['id'] }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Ya, Hapus</button>
        <a href="{{ route('biaya-pemasaran.index') }}" class="btn btn-secondary ms-2">Batal</a>
    </form>
</div>
@endsection
