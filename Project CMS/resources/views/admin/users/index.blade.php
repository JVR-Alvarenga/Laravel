@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
    <h1>
        Meus Usuários
        <a href="{{ route('users.create') }}" class="btn btn-sm btn-success">Novo Usuário</a>
    </h1>
    
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-hover" width="50%">
                <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>E-MAIL</th>
                    <th>AÇÕES</th>
                </tr>
                @foreach($usersAll as $user)   
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td style="display: flex;">
                            <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="btn btn-sm btn-info">[Editar]</a> 
                            @if($user->id != $userLoggedId)
                                <form onclick="return confirm('Tem Certeza que Deseja Deletar Este Usuário ?')" method="post" action="{{ route('users.destroy', ['user' => $user->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">[Deletar]</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
        
    <div style="width: 50px; height: 200px; display: flex">
        {{ $usersAll->links() }}
    </div>

@endsection