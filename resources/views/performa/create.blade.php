@extends('layouts.app')

@section('title', 'Tambah Performa')

@section('content')
<form action="/performa" method="POST">
    @csrf
    Jumlah Tayang: <input type="number" name="jumlah_tayang"><br>
    Jumlah Klik: <input type="number" name="jumlah_klik"><br>
    Konversi: <input type="number" name="konversi"><br>
    Tanggal: <input type="date" name="tanggal"><br>
    Iklan:
    <select name="id_iklan">
        @foreach ($iklan as $id => $nama)
            <option value="{{ $id }}">{{ $nama }}</option>
        @endforeach
    </select><br>
    <button type="submit">Simpan</button>
</form>
@endsection
