<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>HELLO</h1>
    <P>INI adalah authors</P>

    @foreach ($authors as $item )
        <ul>
            <li>{{ $item }}</li>
        </ul>
    
    @endforeach
</body>
</html>