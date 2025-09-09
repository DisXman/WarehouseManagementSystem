<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
        /* .form-control{
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 10px;
            width: 50%;
        } */
        .custom-input {
            width: 300px;
            /* hem input hem buton aynı genişlik */
            height: 50px;
            /* yükseklik aynı */
            margin-top: 10px;
            border-radius: 10px;
            /* köşeleri yuvarlat */
        }
    </style>
</head>

<body>




    <!-- <div class="col-auto d-flex justify-content-center align-items-center flex-column" style="margin-top: 25px;"> -->


    <!-- DEPO EKLEME BÖLÜMÜ -->
    <form method="POST" action="{{ route('depolar.store') }}" class="col-auto d-flex justify-content-center align-items-center flex-column">
        @csrf
        <h1>Depo Ekle</h1>
        <input class="custom-input form-control form-control-lg" type="text" placeholder="Depo Adı Gir" name="depo_adi" aria-label=".form-control-lg example" style="margin-top: 25px;">
        <button type="submit" class="custom-input btn btn-primary mb-3">Depoyu Ekle</button>
    </form>


    <!-- İSTİF EKLEME BÖLÜMÜ -->
    <form method="POST" action="{{ route('istif.store') }}" class="col-auto d-flex justify-content-center align-items-center flex-column">
        @csrf
        <h1>İstif Ekle</h1>
        <select name="depo_id" class="form-select w-25" style="margin-top: 25px;" required>
            <option value="" selected disabled>Depo Seç</option>
            @forelse($depolar as $depo)
            <option value="{{ $depo->id }}">{{ $depo->depo_adi }}</option>
            @empty
            <option disabled>Henüz Depo Girilmemiş</option>
            @endforelse
        </select>
        <input class="custom-input form-control form-control-lg" type="text" placeholder="İstif İsmi GiR" name="istif_name" style="margin-top: 25px;" required>

        <button type="submit" class="custom-input btn btn-primary mb-3">İstifi Ekle</button>
    </form>

    <!-- ÜRÜN EKLEME BÖLÜMÜ  -->
    <form method="POST" action="{{ route('urunler.store') }}" class="col-auto d-flex justify-content-center align-items-center flex-column">
        @csrf
        <h1>Ürün Ekle</h1>

        <label for="name">Ürün Adı:</label>
        <input class="custom-input form-control form-control-lg" type="text" placeholder="Ürün Adı Gir" name="name" aria-label=".form-control-lg example" style="margin-top: 25px;" required>

        <label for="count" style="margin-top: 25px;">Ürün Sayısı:</label>
        <input class="custom-input form-control form-control-lg" type="text" placeholder="Ürün Sayısı Gir" name="count" aria-label=".form-control-lg example" style="margin-top: 25px;" required>

        <label style="margin-top: 25px;">istif Seç</label>
        <select name="istif_id" class="form-select w-25" required>
            <option value="" selected disabled>istif Seç-></option>
            @forelse($istif as $isti)
            <option value="{{ $isti->id }}">{{ $isti->istif_name }}</option>
            @empty
            <option disabled>Henüz istif eklenmemiş</option>
            @endforelse
        </select>
        <button type="submit" class="custom-input btn btn-primary mb-3">ürün Ekle</button>
    </form>
    <!-- ÜRÜN EKLEME BÖLÜMÜ SON -->


    <!-- </div> -->

    <!-- <select class="form-select d-flex justify-content-center align-items-center  w-50" aria-label="Default select example">
        <option selected>Open this select menu</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
    </select> -->
    <!-- <div class="dropdown d-flex justify-content-center align-items-center vh-80" style="margin-top: 2rem;">
        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown link
        </a>

        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <li><a class="dropdown-item" href="">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
        </ul>
    </div> -->





</body>

</html>