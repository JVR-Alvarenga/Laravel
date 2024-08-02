<x-layout page="ToDo Preject: Criar Categoria">
    <x-slot:btn>
        <a href="{{route('category.home')}}" class="btn btn-primary">Categorias Home</a>
    </x-slot:btn>
    <section class="task_section">
        <section class="task_box">
            <div class="title_task">Editar Categoria</div>
            <form method="POST" action="{{route('category.editAction')}}">
                @csrf 
                
                @if($errors->any())   
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                @endif
                <input type="hidden" name="id" value="{{$category->id}}"/>
                <x-form.text_input 
                    name="title" label="Nome da Categoria:" 
                    placeholder="Digite o nome da Categoria" 
                    value="{{$category->title}}"
                />

                <x-form.text_input 
                    name="color" label="Cor da Categoria:" 
                    type="color" value="{{$category->color}}"
                />

                <x-form.form_button resetTxt="Resetar" submitTxt="Criar Tarefa" />
            </form>
        </section>
    </section>
</x-layout>