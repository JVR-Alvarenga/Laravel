<x-layout title="- Admin: Home">
    <a href="{{route('admin.logout')}}">
        <button>
            Sair
        </button>
    </a>
    <a href="{{route('create.pizza')}}">
        <button>
            Adicionar Novo Sabor de Pizza
        </button>
    </a><br/><br/>

    <h1>Hello {{$user->name}}</h1>

</x-layout>