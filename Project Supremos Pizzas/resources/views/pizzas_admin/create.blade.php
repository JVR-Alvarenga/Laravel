<x-layout title="- Admin: Criar Pizza">
    <form action="{{route('create.pizza.action')}}" method="post">
        @csrf
        <input type="string" name="flavor" placeholder="nome da pizza"/>
        <input type="text" name="type" placeholder="tipo da pizza"/>
        <input type="text" name="description" placeholder="desc da pizza"/>
        <input type="double" name="price_m" placeholder="pizza media"/>
        <input type="double" name="price_g" placeholder="pizza grande"/>

        <input type="submit" value="Enviar"/>
    </form><br/>

    <a href="{{route('admin.home')}}">
        <button>
            Voltar para Home Adm
        </button>
    </a>
</x-layout>