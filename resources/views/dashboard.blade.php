@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="text-center">Produk Kami</h2><br>
    <div class="row justify-content-center">
        @foreach($items as $item)
            <div class="col-md-4 col-lg-3 mb-4">
                <div class="card h-100 shadow-sm border-0 rounded">
                    <img src="{{ asset('images/' . $item->gambar) }}" class="card-img-top img-fluid rounded-top" alt="{{ $item->nama }}" style="height: 200px; object-fit: cover;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-truncate">{{ $item->nama }}</h5>
                        <p class="card-text text-muted">{{ Str::limit($item->deskripsi, 50) }}</p>
                        <p class="card-text text-success"><strong>Rp. {{ number_format($item->harga, 0, ',', '.') }}</strong></p>
                        <a href="{{ url('produk/' . $item->id) }}" class="btn btn-primary mt-auto">Detail</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
 
@endsection
