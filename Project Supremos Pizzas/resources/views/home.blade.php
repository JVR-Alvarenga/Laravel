<x-layout title="- Home">

    <section class="container-main">

        <div class="container-categorias">
            <div class="categoria-box">
                <div class="box 1">
                    <img src="assets/image/pizzamilhobacon.png" />
                </div>
                <a href="{{route('home.pizza.especial')}}">
                    <p>Especiais</p>
                </a>
            </div>
            <div class="categoria-box">
                <div class="box 2">
                    <img src="assets/image/pizzacalabresa.png" />
                </div>
                <a href="{{route('home.pizza.tradicional')}}">
                    <p>Tradicionais</p>
                </a>
            </div>
            <div class="categoria-box">
                <div class="box 3">
                    <img src="assets/image/pizzafrango.png" />
                </div>
                <a href="{{route('home.pizza.frango')}}">
                    <p>Frango</p>
                </a>
            </div>
            <div class="categoria-box">
                <div class="box 4">
                    <img src="assets/image/pizzadoce.png" />
                </div>
                <a href="{{route('home.pizza.doce')}}">
                    <p>Doces</p>
                </a>
            </div>
        </div>

    </section>


</x-layout>