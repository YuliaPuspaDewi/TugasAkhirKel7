@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-warning text-white">{{ __('Home') }}</div>

                <div class="card-body">
                    <div class="alert alert-warning" role="alert">
                        {{ __('Selamat datang di toko online Khayrscarf Hijab. Kami dengan hangat menyambut Anda di Khayrscarf Hijab, destinasi utama untuk hijab dan busana muslimah berkualitas. Di sini, kami menghadirkan berbagai pilihan hijab yang anggun, nyaman, dan trendi untuk menunjang penampilan Anda sehari-hari.') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
