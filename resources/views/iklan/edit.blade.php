@extends('layouts.app')

@section('title', 'Edit Iklan')

@section('content')
<form action="/iklan/{{ $item['id'] }}" method="POST">
    @csrf
    @method('PUT')
    Judul Iklan: <input type="text" name="judul_iklan" value="{{ $item['judul_iklan'] }}"><br>
    Deskripsi: <textarea name="deskripsi">{{ $item['deskripsi'] }}</textarea><br>
    Tanggal Mulai: <input type="date" name="tanggal_mulai" value="{{ $item['tanggal_mulai'] }}"><br>
    Tanggal Selesai: <input type="date" name="tanggal_selesai" value="{{ $item['tanggal_selesai'] }}"><br>
    Status: <input type="text" name="status" value="{{ $item['status'] }}"><br>
    Tim Pemasaran:
    <select name="id_tim_pemasaran">
        @foreach ($tim as $id => $nama)
            <option value="{{ $id }}" {{ $id == $item['id_tim_pemasaran'] ? 'selected' : '' }}>{{ $nama }}</option>
        @endforeach
    </select><br>
    <button type="submit">Update</button>
</form>
@endsection
