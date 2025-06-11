<x-layout title="- Pizzas {{ucfirst($dataPizza->name)}}">
    <div class="sub-title">
        <div>
            <h1>Pizzas {{ucfirst($dataPizza->name)}}</h1>
        </div>
    </div>

    @if(empty($dataPizza))
        <div class="sub-title">
            <h3>Não Existe Ainda Pizzas Deste Tipo</h3>
        </div>
    @else 
        <x-pizzas.itens :dataPizza="$dataPizza">
        </x-pizzas.itens>
    @endif
    
</x-layout>