<x-layout page="ToDo Preject: Registro de Usuario">
    <x-slot:btn>
        <a href="{{route('login')}}" class="btn btn-primary">Já tem Contar? Faça Login</a>
    </x-slot:btn>

    <section class="task_section">
        <section class="task_box">
            <div class="title_task">Registrar-se</div>
            <form method="POST" action="{{route('registerAction')}}">
                @csrf

                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                @endif
                
                <x-form.text_input 
                    label="Nome Completo:"
                    name="name"
                    type="text"
                    placeholder="Digite seu nome completo"
                />

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

                <x-form.text_input 
                    label="Confirme sua Senha"
                    name="password_confirmation"
                    type="password"
                    placeholder="Digite sua senha novamente"
                />

                <x-form.form_button 
                    resetTxt="Limpar"
                    submitTxt="Registrar-se"
                />

            </form>
        </section>
    </section>
</x-layout>