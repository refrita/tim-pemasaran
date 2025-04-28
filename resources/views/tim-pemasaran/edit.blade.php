@extends('layouts.app')

@section('title', 'Edit Anggota Tim')

@section('content')
<form action="/tim-pemasaran/{{ $item['id'] }}" method="POST">
    @csrf
    @method('PUT')
    Nama: <input type="text" name="nama_anggota" value="{{ $item['nama_anggota'] }}"><br>
    Jabatan: <input type="text" name="jabatan" value="{{ $item['jabatan'] }}"><br>
    Nama Pengguna: <input type="text" name="nama_pengguna" value="{{ $item['nama_pengguna'] }}"><br>
    Kata Sandi: <input type="password" name="kata_sandi"><br>
    ID Platform: <input type="number" name="id_platform" value="{{ $item['id_platform'] }}"><br>
    ID Pemasaran: <input type="number" name="id_pemasaran" value="{{ $item['id_pemasaran'] }}"><br>
    <button type="submit">Update</button>
</form>
@endsection
