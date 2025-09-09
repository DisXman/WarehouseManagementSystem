<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>

<body>




<div class="container">


    

    <!-- Depo seçimi -->
    <section>
        <h2>Depo Seç</h2>
        <form method="GET" action="{{ route('depo-urun.sec') }}">
            <!-- buradaki name  request'den ne alacağı yazılır -->
            <!-- onchange kullanıcı seçim yapar yapmaz form olarka gönderilecek -->
            <select name="depo_id" onchange="this.form.submit()" class="form-select mb-3">  
                <option value="" selected disabled>Depo seç →</option>
                @foreach($depolar as $depo)
                    <option value="{{ $depo->id }}" @if(isset($seciliDepo) && $seciliDepo->id == $depo->id) selected @endif>
                        {{ $depo->depo_adi }}
                    </option>
                @endforeach
            </select>

            <!-- İstif seçimi -->
            @if($seciliDepo)
                <h2>İstif Seç</h2>
                <select name="istif_id" onchange="this.form.submit()" class="form-select mb-3">
                    <option value="" selected disabled>İstif seç →</option>
                    @foreach($seciliDepo->istifler as $istif)
                        <option value="{{ $istif->id }}" @if(isset($seciliIstif) && $seciliIstif->id == $istif->id) selected @endif>
                            {{ $istif->istif_name }}
                        </option>
                    @endforeach
                </select>
            @endif
        </form>
    </section>

    <!-- Ürün tablosu -->
    @if($urunler->isNotEmpty())
    <section>
        <h2>Ürünler</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Ürün Adı</th>
                    <th>Adet</th>
                </tr>
            </thead>
            <tbody>
                @foreach($urunler as $urun)
                <tr>
                    <td>{{ $urun->name }}</td>
                    <td>{{ $urun->count }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>
    @else
    <p>Ürün yok bu istifte</p>
    @endif
</div>







</body>

</html>