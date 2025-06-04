<x-layout title="- Home">

    <section class="container-main">

        @foreach($dataType as $item):
        <div class="container-categorias">
            <div class="categoria-box">
                <div class="box 1">
                    <img src="{{$item->path_file}}" />
                </div>
                <a href="{{route('home.pizzas', ['id' => $item->id])}}">
                    <p>{{$item=>name}}</p>
                </a>
            </div>
        </div>
        @endforeach

    </section>


</x-layout>