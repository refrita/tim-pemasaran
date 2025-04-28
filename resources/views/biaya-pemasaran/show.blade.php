@extends('layouts.app')

@section('title', 'Detail Biaya Pemasaran')

@section('content')
<p>Total Anggaran: {{ number_format($item['total_anggaran']) }}</p>
<p>Anggaran Tersedia: {{ number_format($item['anggaran_tersedia']) }}</p>
<p>Bulan Berlaku: {{ $item['bulan_berlaku'] }}</p>
<p>Status: {{ $item['status'] }}</p>
<a href="/biaya-pemasaran">Kembali</a>
@endsection
