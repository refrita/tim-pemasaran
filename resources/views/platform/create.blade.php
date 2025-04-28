@extends('layouts.app')

@section('title', 'Tambah Platform')

@section('content')
<form action="/platform" method="POST">
    @csrf
    Nama Platform: <input type="text" name="nama_platform"><br>
    Jenis Platform: <input type="text" name="jenis_platform"><br>
    <button type="submit">Simpan</button>
</form>
@endsection
