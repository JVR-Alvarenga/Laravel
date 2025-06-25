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
        <div class="side-menu">

        </div>
    </section>
    <script src="/assets/js/script.js"></script>
</body>
</html>
