@extends('layouts.app') {{-- pastikan layout utama ada --}}

@section('content')
<div class="container mt-5">
    <h2>Dashboard Inventory</h2>

    <div class="row mt-4">
        <div class="col-md-3">
            <div class="card text-bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Barang</h5>
                    <p class="card-text fs-3">{{ $barang }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Barang Masuk</h5>
                    <p class="card-text fs-3">{{ $masuk }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-bg-danger mb-3">
                <div class="card-body">
                    <h5 class="card-title">Barang Keluar</h5>
                    <p class="card-text fs-3">{{ $keluar }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-bg-secondary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Jenis Barang</h5>
                    <p class="card-text fs-3">{{ $jenis }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
