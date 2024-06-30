@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow-sm border-0 rounded">
                <img src="{{ asset('images/' . $item->gambar) }}" class="img-fluid rounded-top" alt="{{ $item->nama }}">
            </div>
        </div>
        <div class="col-md-6">
            <h1>{{ $item->nama }}</h1>
            <p class="text-muted">{{ $item->deskripsi }}</p>
            <p><strong>Harga:</strong> Rp. {{ number_format($item->harga, 0, ',', '.') }}</p>
            <p><strong>Stok:</strong> {{ $item->stok }}</p>
            <a href="{{ url('/dashboard') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
