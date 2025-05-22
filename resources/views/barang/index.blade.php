@extends('layouts.app')

@section('content')
<div class="page-header">
  <h4 class="page-title">Data Barang</h4>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <div class="card-title">List Barang</div>
      </div>
      <div class="card-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nama Barang</th>
              <th>Jenis</th>
              <th>Stok</th>
              <th>Stok Minimum</th>
              <th>Satuan</th>
              <th>Foto</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($barang as $item)
              <tr>
                <td>{{ $item->id_barang }}</td>
                <td>{{ $item->nama_barang }}</td>
                <td>{{ $item->jenis_relation->nama_jenis ?? '-' }}</td>
                <td>{{ $item->stok }}</td>
                <td>{{ $item->stok_minimum }}</td>
                <td>{{ $item->satuan_relation->nama_satuan ?? '-' }}</td>
                <td>
                  @if ($item->foto)
                    <img src="{{ asset('storage/foto/' . $item->foto) }}" alt="foto" width="60">
                  @else
                    -
                  @endif
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
