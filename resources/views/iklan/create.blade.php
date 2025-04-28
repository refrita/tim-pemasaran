@extends('layouts.app')

@section('title', 'Tambah Iklan')

@section('content')
<form action="/iklan" method="POST">
    @csrf
    Judul Iklan: <input type="text" name="judul_iklan"><br>
    Deskripsi: <textarea name="deskripsi"></textarea><br>
    Tanggal Mulai: <input type="date" name="tanggal_mulai"><br>
    Tanggal Selesai: <input type="date" name="tanggal_selesai"><br>
    Status: <input type="text" name="status"><br>
    Tim Pemasaran:
    <select name="id_tim_pemasaran">
        @foreach ($tim as $id => $nama)
            <option value="{{ $id }}">{{ $nama }}</option>
        @endforeach
    </select><br>
    <button type="submit">Simpan</button>
</form>
@endsection
