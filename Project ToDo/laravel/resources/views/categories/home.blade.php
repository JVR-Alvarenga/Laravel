<x-layout page="ToDo Preject: Categorias Home">
    <x-slot:btn>
        <a href="{{route('home')}}" class="btn btn-primary">Home</a>
        <a href="{{route('category.create')}}" class="btn btn-primary">Criar Categoria</a>
    </x-slot:btn>
    <section class="main">
        <div class="main-container">
            <h1>Categorias</h1>

            <div class="categoy-count">Total de Categorias: {{$data['count_categories']}}</div>

            <div class="graph-box">
                <div class="category-logo"></div>
            </div>
        </div>
        
        <div class="main-box">
            <div class="categories-all">
                <p>Todas as suas Categorias</p>
                <img src="/assets/images/icon-seta-bottom.png" />
            </div>
            @foreach($data['categories'] as $category)
                <x-categories :data=$category />
            @endforeach
        </div>
    </section>  
</x-layout>