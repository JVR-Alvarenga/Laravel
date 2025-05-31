<x-layout title="- Admin: Login">
    <form action="{{route('admin.login.action')}}" method="post">
        @csrf

        <input type="email" name="email" placeholder="E-mail:"/>
        <input type="password" name="password" placeholder="Senha:"/>

        <input type="submit" value="Fazer Login"/>
    </form>
    <h2>Não Tem Conta? Clique 
        <a href="{{route('admin.register')}}">Aqui</a>
    </h2>
</x-layout>