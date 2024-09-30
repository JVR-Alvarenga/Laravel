@extends('adminlte::page')

@section('title', 'Configurações')

@section('content_header')
    <h1>Configurações</h1>
@endsection

@section('content')
    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif

    @if(session('success'))
        <div class="alert alert-success">
            <li>{{session('success')}}</li>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{route('config.editAction')}}" method="post">
                @method('PUT')
                @csrf
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Titulo do Site</label>
                    <div class="col-sm-08">
                        <input type="text" name="title" value="{{$config['title']}}" class="form control @error('title') is-invalid @enderror" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Sub Titulo do Site</label>
                    <div class="col-sm-08">
                        <input type="text" name="subtitle" value="{{$config['subtitle']}}" class="form control @error('subtitle') is-invalid @enderror" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">E-mail para Contatos</label>
                    <div class="col-sm-08">
                        <input type="email" name="email" value="{{$config['email']}}" class="form control @error('email') is-invalid @enderror" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Cor de Fundo</label>
                    <div class="col-sm-08">
                        <input type="color" name="bgcolor" value="{{$config['bgcolor']}}" class="form control @error('bgcolor') is-invalid @enderror" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 control-label">Cor do Texto</label>
                    <div class="col-sm-08">
                        <input type="color" name="textcolor" value="{{$config['textcolor']}}" class="form control" />
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-08">
                        <input type="submit" value="Salvar" class="btn btn-success" />
                    </div>
                </div>
            </form>
        </div>      
    </div>
@endsection