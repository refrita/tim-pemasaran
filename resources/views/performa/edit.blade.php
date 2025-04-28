@extends('layouts.app')

@section('title', 'Edit Performa')

@section('content')
<form action="/performa/{{ $item['id'] }}" method="POST">
    @csrf
    @method('PUT')
    Jumlah Tayang: <input type="number" name="jumlah_tayang" value="{{ $item['jumlah_tayang'] }}"><br>
    Jumlah Klik: <input type="number" name="jumlah_klik" value="{{ $item['jumlah_klik'] }}"><br>
    Konversi: <input type="number" name="konversi" value="{{ $item['konversi'] }}"><br>
    Tanggal: <input type="date" name="tanggal" value="{{ $item['tanggal'] }}"><br>
    Iklan:
    <select name="id_iklan">
        @foreach ($iklan as $id => $nama)
            <option value="{{ $id }}" {{ $id == $item['id_iklan'] ? 'selected' : '' }}>{{ $nama }}</option>
        @endforeach
    </select><br>
    <button type="submit">Update</button>
</form>
@endsection
