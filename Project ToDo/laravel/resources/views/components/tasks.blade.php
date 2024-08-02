<div class="tasks_list">
    <div class="tasks_list {{$data->is_done ? 'tasks_done':'tasks_pending'}}">
        <div class="tasks">
            <div class="title">
                <input type="checkbox" onchange="taskUpdate(this)" data-id="{{$data->id}}"
                    @if($data->is_done)
                        checked
                    @endif
                />
                <p>{{$data->title}}</p>
            </div>
            <div class="priority">
                <div class="sphere"
                    style="background-color: {{$data['category']->color}}"
                ></div>

                <p>{{$data['category']->title}}</p>
            </div>
            <div class="actions">
                <a href="{{route('task.edit', ['id' => $data->id])}}">
                    <img src="/assets/images/icon-edit.png" />
                </a> 
                <a href="{{route('task.delete', ['id' => $data->id])}}" onclick="return confirm('Tem certeza que deseja deletar essa tarefa?')">
                    <img src="/assets/images/icon-delete.png" />
                </a>
            </div>
        </div>
    </div>
</div>