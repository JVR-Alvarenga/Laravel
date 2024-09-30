@extends('adminlte::page')

@section('title', 'Criar Páginas')

@section('content_header')
    <h1>Criar Página</h1>
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
            <form class="form-horizontal" action="{{route('pages.store')}}" method="post">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Titulo</label>
                    <div class="col-sm-08">
                        <input type="text" name="title" value="{{old('title')}}" class="form control @error('title') is-invalid @enderror" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Corpo Da Página</label>
                    <div class="col-sm-08">
                        <textarea name="body" class="form control">{{old('body')}}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Imagem</label>
                    <div class="col-sm-08">
                        <input type="file" name="image" class="form control" />
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-08">
                        <input type="submit" value="Criar" class="btn btn-success" />
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection