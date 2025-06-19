<x-layout title="- Home">

    <section class="container-main">

        <div class="sub-title">
            <div>
                <h1>Tipos de Pizzas</h1>
            </div>
        </div>
        <div class="container-categorias">
            @foreach($dataType as $item)
            <a href="{{route('home.pizzas', ['id' => $item->id])}}">
                <div class="categoria-box">
                    <div class="box 1">
                        <img src="{{asset('storage/' . $item->path_file)}}" />
                    </div>
                        <p>{{ucfirst($item->name)}}</p>
                </div>
            </a>
            @endforeach
        </div>

    </section>


</x-layout>