@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


<div class="d-flex justify-content-center align-items-center vh-80 flex-row gap-5">
    <a href="{{ route('depo_urun_ekle') }}" class="btn btn-primary btn-lg w-25">Depo & Ürün Ekle</a>
    <a href="{{ route('depo-urun.sec') }}" class="btn btn-primary btn-lg w-25">Depo & Ürün Seç</a>
</div>

<div class="container " style="margin-top: 50px;">
    <form method="GET" action="{{ route('depo-urun.ara') }}" class="d-flex flex-column align-items-center">
        <input type="text" name="name" class="text-black" placeholder="Ürün gir">
        <button type="submit" class="btn btn-primary mt-2 text-white">ARA</button>
        @if(isset($aranan_urun))
            <h1 class="text-white">{{ $aranan_urun }}</h1>
            @if($urunler->isNotEmpty())
                @foreach($urunler as $urun)
                    <p class="text-white">{{ $urun->istif->depo->depo_adi }}</p>
                    <p class="text-white">{{ $urun->istif->istif_name }}</p>
                @endforeach
            @else
                <p class="text-white">Ürün Bulunamadı</p>
            @endif
        @endif


    </form>
</div>

@endsection