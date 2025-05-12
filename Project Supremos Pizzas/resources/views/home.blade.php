<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supremos Pizzaria - Home</title>

    <link rel="stylesheet" href="assets/css/home.css" />
</head>
<body>
    <!--Header-->
    <div class="container-header">
        <div class="logo-header">
            <img src="assets/image/supremospizzas.png" />
        </div>
        <div class="title-header">
            <h1>Supremo's Pizzas</h1>
        </div>
        <div></div>
    </div>

    <section class="container-main">

        <div class="container-categorias">
            <div class="categoria-box">
                <div class="box 1">
                    <img src="assets/image/pizzamilhobacon.png" />
                </div>
                <a href="{{route('homePizzaEspecial')}}">
                    <p>Especiais</p>
                </a>
            </div>
            <div class="categoria-box">
                <div class="box 2">
                    <img src="assets/image/pizzacalabresa.png" />
                </div>
                <a href="{{route('homePizzaTradicional')}}">
                    <p>Tradicionais</p>
                </a>
            </div>
            <div class="categoria-box">
                <div class="box 3">
                    <img src="assets/image/pizzafrango.png" />
                </div>
                <a href="{{route('homePizzaFrango')}}">
                    <p>Frango</p>
                </a>
            </div>
            <div class="categoria-box">
                <div class="box 4">
                    <img src="assets/image/pizzadoce.png" />
                </div>
                <a href="{{route('homePizzaDoce')}}">
                    <p>Doces</p>
                </a>
            </div>
        </div>

    </section>


</body>
</html>