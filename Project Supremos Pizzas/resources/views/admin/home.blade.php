<x-layout title="- Admin: Home">
    <a href="{{route('admin.logout')}}">
        <button>
            Sair
        </button>
    </a>
    <a href="{{route('create.itens')}}">
        <button>
            Adicionar Novos Itens
        </button>
    </a><br/><br/>

    <h1 style="color: #fff; margin-bottom: 50px">Hello {{$user->name}}</h1>

    <h2 style="color: #fff; text-align:center">Tipos de Pizzas Salvas</h2>
    <div class="container-categorias">
        @foreach($typePizzas as $item)
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

    <div class="lista-drinks">
        <ul class="item-drinks"> Bebidas Salvas
            @foreach($drinks as $item)
                <li>{{ucfirst($item->name)}} - {{$item->volume}} - R$ {{number_format($item->price, 2)}}</li>
            @endforeach
        </ul>
    </div>

</x-layout>
