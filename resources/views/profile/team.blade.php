<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team</title>
</head>
<body>
    <h1>TEAM</h1>
    @foreach ($team as $as)
    <p>nama saya {{$as->Nama}}</p>
    <p>Kode saya {{$as->Kode}}</p>
    <p>Foto saya {{$as->Foto}}</p>
    <p>Sosmed saya {{$as->Sosmed}}</p>
    <br>
    <br>
    <p>==============================</p>
    <br>
    <br>

    @endforeach
    
</body>
</html>