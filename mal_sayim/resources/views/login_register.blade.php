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
    <div class="d-flex justify-content-center align-items-center vh-100 flex-row gap-3">
        <!-- <button type="button" class="btn btn-primary btn-lg"><a href="{{ route('login') }}"></a></button> -->
        <a href="{{ route('login') }}" class="btn btn-primary btn-lg">GİRİŞ YAP</a>
        <a href="{{ route('register') }}" class="btn btn-primary btn-lg">KAYIT OL</a>
    </div>
</body>
</html>