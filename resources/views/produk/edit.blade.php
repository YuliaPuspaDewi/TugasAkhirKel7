@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Form Edit Produk</h5>
            <div class="col-sm-8">
                <form class="row g-3 mt-2" action="{{ url('produk/' . $row->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama*</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $row->nama }}" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi*</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="{{ $row->deskripsi }}" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga*</label>
                        <input type="number" class="form-control" id="harga" name="harga" value="{{ $row->harga }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="stok" class="form-label">Stok*</label>
                        <input type="text" class="form-control" id="stok" name="stok" value="{{ $row->stok }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar*</label>
                        <input type="file" class="form-control" id="gambar" name="gambar">
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ url('produk') }}" class="btn btn-warning">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
