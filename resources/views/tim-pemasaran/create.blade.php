@extends('layouts.app')

@section('title', 'Tambah Anggota Tim')

@section('content')
<form action="/tim-pemasaran" method="POST">
    @csrf
    Nama: <input type="text" name="nama_anggota"><br>
    Jabatan: <input type="text" name="jabatan"><br>
    Nama Pengguna: <input type="text" name="nama_pengguna"><br>
    Kata Sandi: <input type="password" name="kata_sandi"><br>
    ID Platform: <input type="number" name="id_platform"><br>
    ID Pemasaran: <input type="number" name="id_pemasaran"><br>
    <button type="submit">Simpan</button>
</form>
@endsection
