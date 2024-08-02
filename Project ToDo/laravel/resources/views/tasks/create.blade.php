<x-layout page="ToDo Preject: Criar Tarefa">
    <x-slot:btn>
        <a href="{{route('home')}}" class="btn btn-primary">Voltar para Home</a>
    </x-slot:btn>

    
    <section class="task_section">
        <section class="task_box">
            <div class="title_task">Criar Tarefa</div>
            <form method="POST" action="{{route('task.createAction')}}">
                @csrf 
                
                @if($errors->any())   
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                @endif
                <!-- <input type="hidden" value="{{$data['user_id']" name="id" /> -->
                <x-form.text_input 
                    name="title" label="Titulo da Tarefa:" 
                    placeholder="Digite o titulo da tarefa" 
                />

                <x-form.text_input 
                    name="due_date" label="Data de Realização:" 
                    type="datetime-local" 
                />

                <x-form.select_input 
                    name="category_id" label="Categoria:"> 
                    @foreach($data['categories'] as $category)
                        <option value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </x-form.select_input>

                <x-form.textarea_input 
                    name="description"
                    label="Descrição da tarefa:"
                    placeholder="Digite uma descrição para a sua tarefa"
                />

                <x-form.form_button resetTxt="Resetar" submitTxt="Criar Tarefa" />
            </form>
        </section>
    </section>

</x-layout>