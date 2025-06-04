<x-layout title="- Admin: Criar Pizza">
    @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
    <form action="{{route('create.pizza.action')}}" method="post">
        @csrf
        <input type="string" name="flavor" placeholder="nome da pizza"/>
        <select name="type_pizza_id">
            <option>Escolha um Tipo</option>
            @foreach($typePizzas as $type):
                <option value="{{$type->id}}">{{$type->name}}</option>
            @endforeach
        </select>
        <input type="text" name="description" placeholder="desc da pizza"/>
        <input type="double" name="price_m" placeholder="pizza media"/>
        <input type="double" name="price_g" placeholder="pizza grande"/>

        <input type="submit" value="Criar"/>
    </form><br/><br/>

    
    <h3>Crie Um Novo Tipo de Pizza</h3>
    <form action="{{route('create.type.pizza.action')}}" method="post">
        @csrf
        <input type="string" name="name" placeholder="Nome do Tipo de Pizza"/>
        
        <input type="submit" value="Criar"/>
    </form><br/><br/>

    <a href="{{route('admin.home')}}">
        <button>
            Voltar para Home Adm
        </button>
    </a>
</x-layout>