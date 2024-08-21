<x-layout page="ToDo Preject: Login">
    <x-slot:btn>
        <a href="{{route('register')}}" class="btn btn-primary">Registre-se</a>
    </x-slot:btn>

    <section class="task_section">
        <section class="task_box">
            <div class="title_task">Fazer Login</div>
            <form method="POST" action="{{route('loginAction')}}">
                @csrf

                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                @endif

                <x-form.text_input 
                    label="E-mail:"
                    name="email"
                    type="email"
                    placeholder="Digite seu email"
                />

                <x-form.text_input 
                    label="Senha"
                    name="password"
                    type="password"
                    placeholder="Digite sua senha"
                />

                <x-form.form_button 
                    resetTxt="Limpar"
                    submitTxt="Login"
                />

            </form>
        </section>
    </section>

</x-layout>