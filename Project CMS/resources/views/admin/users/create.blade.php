@extends('adminlte::page')

@section('title', 'Criar Usuário')

@section('content_header')
    <h1>Criar Usuário</h1>
@endsection

@section('content')
    @if($errors->any()) 
        <div class="alert alert-danger">
            <ul>
                <h5><i class="icon fas fa-ban"></i>Ocorreu um Erro</h5>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form class="form-horizontal" action="{{route('users.store')}}" method="post">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nome Completo</label>
                    <div class="col-sm-08">
                        <input type="text" name="name" value="{{old('name')}}" class="form control @error('name') is-invalid @enderror" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">E-mail</label>
                    <div class="col-sm-08">
                        <input type="email" name="email" value="{{old('email')}}" class="form control @error('email') is-invalid @enderror" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Senha</label>
                    <div class="col-sm-08">
                        <input type="password" name="password" class="form control @error('password') is-invalid @enderror" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 control-label">Confirmação da Senha</label>
                    <div class="col-sm-08">
                        <input type="password" name="password_confirmation" class="form control" />
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-08">
                        <input type="submit" value="Cadatrar" class="btn btn-success" />
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection