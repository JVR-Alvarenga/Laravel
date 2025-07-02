<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supremos Pizzaria {{$title ?? null}}</title>

    <link rel="stylesheet" href="/assets/css/home.css" />
</head>
<body>
    <!--Header-->
    <div class="container-header">
        <a href="{{route('home')}}">
            <div class="logo-header">
                <img src="/assets/image/supremospizzas.png" />
            </div>
        </a>
        <a href="{{route('home')}}">
            <div class="title-header">
                <h1>Supremo's Pizzas</h1>
            </div>
        </a>
        <div class="shoppcart">
            <img src="/assets/image/shoppingcart.jpeg" style="width: 100px; height: 100px"/>
        </div>
    </div>

    <section class="section-main">
        <!-- Main -->
        <main id="main">
            {{$slot}}
        </main>

        <!--Side Menu Cart-->
        <section class="side-menu">
            <div class="container">
                <div class="title">
                    Suas Pizzas
                </div>
                <div class="pizza-item">
                    <div class="image">k</div>
                    <div class="sub-title"> Calabresa </div>
                    <div class="units">
                        <div class="sub-unit">-</div>
                        <div class="quantity">0</div>
                        <div class="add-unit">+</div>
                    </div>
                </div>
                <div class="sub-total">
                    Subtotal: R$ 00,00
                </div>
                <div class="desconto">
                    Desconto: R$ 00,00
                </div>
                <div class="price-total">
                    TOTAL: R$ 00,00
                </div>

                <div class="buy">
                    <button> Finalizar Compra</button>
                </div>
            </div>
        </section>
    </section>
    <script src="/assets/js/script.js"></script>
</body>
</html>
