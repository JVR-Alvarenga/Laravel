<x-layout page="ToDo Preject: Editar Tarefa">
    <x-slot:btn>
        <a href="{{route('home')}}" class="btn btn-primary">Voltar para Home</a>
    </x-slot:btn>

    <section class="task_section">
        <section class="task_box">
            <div class="title_task">Editar Tarefa</div>
            <form method="POST" action="{{route('task.editAction')}}">
                @csrf
                <input type="hidden" name="id" value="{{$data['task']->id}}" />
                <x-form.text_input 
                    name="title" 
                    label="Titulo da Tarefa:" 
                    value="{{$data['task']->title}}"
                    placeholder="Digite o titulo da tarefa" 
                />

                <x-form.text_input 
                    name="due_date" 
                    label="Data de Realização:"
                    value="{{$data['task']->due_date}}" 
                    type="datetime-local" 
                />

                <x-form.select_input
                    name="category_id" label="Categoria:">
                    @foreach($data['categories'] as $category) 
                        <option value="{{$category->id}}"
                            @if($category->id == $data['task']->category_id)
                                selected
                            @endif
                        >{{$category->title}}</option>
                    @endforeach
                </x-form.select_input>

                <x-form.textarea_input 
                    name="description"
                    value="{{$data['task']->description}}"
                    label="Descrição da tarefa:"
                    placeholder="Digite uma descrição para a sua tarefa"
                />

                <x-form.checkbox_input 
                    name="is_done"
                    label="Tarefa Realizada?"
                    checked="{{$data['task']->is_done}}"
                    type="checkbox"
                />

                <x-form.form_button resetTxt="Resetar" submitTxt="Atualizar Tarefa" />
            </form>
        </section>
    </section>
    
</x-layout>