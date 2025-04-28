@extends('layouts.app')

@section('title', 'Dashboard IklanApp')

@section('content')
<div class="container">
    <h1 class="my-4">Dashboard IklanApp</h1>
    
    <div class="row">
        <!-- Marketing Team Summary -->
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Tim Pemasaran</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">Kelola anggota tim pemasaran dan akses platform.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="/tim-pemasaran" class="btn btn-sm btn-primary">Lihat Tim</a>
                        <small><a href="/tim-pemasaran/create" class="text-muted">Tambah Anggota</a></small>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Platforms Summary -->
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">Platform Iklan</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">Kelola platform iklan seperti Google Ads, Facebook Ads, dll.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="/platform" class="btn btn-sm btn-success">Lihat Platform</a>
                        <small><a href="/platform/create" class="text-muted">Tambah Platform</a></small>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Marketing Budget Summary -->
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0">Biaya Pemasaran</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">Kelola anggaran dan biaya pemasaran bulanan.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="/biaya-pemasaran" class="btn btn-sm btn-info">Lihat Biaya</a>
                        <small><a href="/biaya-pemasaran/create" class="text-muted">Tambah Biaya</a></small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <!-- Ads Summary -->
        <div class="col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-header bg-warning text-dark">
                    <h5 class="mb-0">Iklan Aktif</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">Kelola semua iklan yang sedang berjalan.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="/iklan" class="btn btn-sm btn-warning">Lihat Iklan</a>
                        <small><a href="/iklan/create" class="text-muted">Buat Iklan Baru</a></small>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Performance Summary -->
        <div class="col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-header bg-danger text-white">
                    <h5 class="mb-0">Performa Iklan</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">Pantau performa dan konversi dari iklan Anda.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="/performa" class="btn btn-sm btn-danger">Lihat Performa</a>
                        <small><a href="/performa/create" class="text-muted">Tambah Data</a></small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Quick Stats Section -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-secondary text-white">
                    <h5 class="mb-0">Statistik Cepat</h5>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-md-3">
                            <h4>2</h4>
                            <p class="text-muted">Anggota Tim</p>
                        </div>
                        <div class="col-md-3">
                            <h4>2</h4>
                            <p class="text-muted">Platform</p>
                        </div>
                        <div class="col-md-3">
                            <h4>2</h4>
                            <p class="text-muted">Iklan Aktif</p>
                        </div>
                        <div class="col-md-3">
                            <h4>2</h4>
                            <p class="text-muted">Data Performa</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection