<x-layout title="- Admin: Register">
    <form action="{{route('admin.register.action')}}" method="post">
        @csrf
        <input type="text" name="name" placeholder="Nome Completo:"/>
        <input type="email" name="email" placeholder="E-mail:"/>
        <input type="password" name="password" placeholder="Senha:"/>
        <input type="password" name="password_confirmation" placeholder="Confirme Sua Senha:"/>
        <input type="submit" value="Fazer Cadastro"/>
    </form>
</x-layout>