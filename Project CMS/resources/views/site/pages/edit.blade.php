@extends('adminlte::page')

@section('title', 'Editar Página')

@section('content_header')
    <h1>Editar Página</h1>
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

    @if(session('success')) 
        <div class="alert alert-success">        
            <li>{{ session('success') }}</li>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form class="form-horizontal" action="{{route('pages.update', ['page' => $page->id])}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Titulo</label>
                    <div class="col-sm-08">
                        <input type="text" name="title" value="{{$page->title}}" class="form control @error('title') is-invalid @enderror" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Corpo Da Página</label>
                    <div class="col-sm-08">
                        <textarea name="body" class="form control bodyfield">{{$page->body}}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-08">
                        <input type="submit" value="Editar" class="btn btn-success" />
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: 'textarea.bodyfield',
            menubar: false,
            plugins: ['link', 'table', 'image', 'autoresize', 'lists'],
            toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | table | link image | bullist numlist ',
            content_css: [
                "{{ asset('assets/css/content.css') }}"
            ],
        });
    </script> -->

    <!-- <script src="https://cdn.tiny.cloud/1/b75qhr8mqoj6fez9p0fg996fo54ukzwvmbsyyabedj6y86dr/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea.bodyfield', // Replace this CSS selector to match the placeholder element for TinyMCE
            plugins: 'code table lists',
            toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
        });
    </script> -->


@endsection