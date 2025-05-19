<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang</title>
</head>
<body>
    <h1>Hello World</h1>
    <p>Ini adalah halaman genres buku</p>

    @foreach ($genres as $item )
        <ul>
            <li>{{ $item }}</li>
        </ul>
    
    @endforeach

</body>
</html>