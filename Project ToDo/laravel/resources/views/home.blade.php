<x-layout page="ToDo Preject: Página Home">
    <x-slot:btn>
        <a href="{{route('category.home')}}" class="btn btn-primary">Categorias</a>
        <a href="{{route('task.create')}}" class="btn btn-primary">Criar Tarefa</a>
        <a href="{{route('logout')}}" class="btn btn-primary">Sair</a>
    </x-slot:btn>

    <section class="graph">
        <div class="graph_header">
            <h1>Progresso do Dia</h1>
            <div class="line_header"></div>
            <a href="{{route('home', ['date' => $data['prev_day']])}}" >
                <img src="/assets/images/icon-prev.png" />
            </a>
            <div class="date">
                {{$data['current_day']}}
            </div>
            <a href="{{route('home', ['date' => $data['next_day']])}}" >
                <img src="/assets/images/icon-next.png" />
            </a>
        </div>
        <div class="graph_header-subtitle">
            Tarefas: <b>{{$data['tasks_true']}}/{{$data['count_tasks']}}</b>
        </div>

        <div class="graph-container">
            <div class="graph-placeholder"></div>
            

            <div class="graph-container-box">
                <img src="/assets/images/icon-info.png" />
                <p class="graph_header-tasks">restam {{$data['tasks_false']}} tarefas para serem realizados</p>
            </div>
        </div>
    </section>
    <section class="list">
        <div class="list_header">
            <select class="list_header-select" onchange="selectedTask(this)">
                <option value="all_tasks" selected>Todas as tarefas</option>
                <option value="tasks_pending">Tarefas Pendentes</option>
                <option value="tasks_done">Tarefas Realizadas</option>
            </select>
        </div>
        
        @foreach($data['tasks'] as $task)
            <x-tasks :data=$task />
        @endforeach
        
    </section>

    <script>
        function selectedTask(e){
            if(e.value == 'tasks_pending'){
                showAllTask();
                document.querySelectorAll('.tasks_done').forEach(function(element){
                    element.style.display = 'none';
                });
            }else if(e.value == 'tasks_done'){
                showAllTask();
                document.querySelectorAll('.tasks_pending').forEach(function(element){
                    element.style.display = 'none';
                });
            }else{
                showAllTask();
            }
        }
        function showAllTask(){
            document.querySelectorAll('.tasks_list').forEach(function(element){
                element.style.display = 'flex';
            });
        }
    </script>
    <script>
        async function taskUpdate(element){
            let status = element.checked;
            let taskId = element.dataset.id;
            let url = '{{route('task.update')}}';

            let rawResult = await fetch(url, {
                method: 'POST',
                headers: {
                    'Content-type': 'application/json',
                    'accept': 'application/json'
                },
                body: JSON.stringify({status, taskId, _token: '{{csrf_token()}}'})
            });
            result = await rawResult.json();
            if(result.sucess){
                alert('Tarefa Atualizada.');
                location.reload();
            }else{
                element.checked = !status;
            }
        }
    </script>
    
</x-layout>