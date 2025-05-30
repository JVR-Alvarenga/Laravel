<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supremos Pizza</title>
</head>
<body>
    <form action="{{route('createEspecialAction')}}" method="post">
        @csrf
        <input type="string" name="flavor" placeholder="nome da pizza"/>
        <input type="text" name="description" placeholder="desc da pizza"/>
        <input type="double" name="price_m" placeholder="pizza media"/>
        <input type="double" name="price_g" placeholder="pizza grande"/>

        <input type="submit" value="Enviar"/>
    </form>
</body>
</html>