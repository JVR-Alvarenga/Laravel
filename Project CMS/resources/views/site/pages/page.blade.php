@extends('adminlte::page')

@section('title', 'Páginas')

@section('content_header')
    <h1>Minhas Páginas</h1>
    <a href="{{ route('pages.create') }}" class="btn btn-sm btn-success">Nova Página</a>
@endsection

@section('content')
    @if(session('error')) 
        <div class="alert alert-danger">        
            <li>{{ session('error') }}</li>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-hover" width="50%">
                <tr>
                    <th>ID</th>
                    <th>TITULO</th>
                    <th>SLUG</th>
                    <th>BODY</th>
                    <th>AÇÕES</th>
                </tr>
                @foreach($pages as $page)   
                    <tr>
                        <td>{{$page->id}}</td>
                        <td>{{$page->title}}</td>
                        <td>{{$page->slug}}</td>
                        <td>{{$page->body}}</td>

                        <td style="display: flex;">
                            <a href="#" class="btn btn-sm btn-success">[ Ver Page ]</a>
                            <a href="{{ route('pages.edit', ['page' => $page->id]) }}" class="btn btn-sm btn-info">[ Editar ]</a> 
                            <form onclick="return confirm('Tem Certeza que Deseja Deletar Este Usuário ?')" method="post" action="{{ route('pages.destroy', ['page' => $page->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">[ Deletar ]</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
        
    <div style="width: 50px; height: 200px; display: flex">
        {{ $pages->links() }}
    </div>

@endsection