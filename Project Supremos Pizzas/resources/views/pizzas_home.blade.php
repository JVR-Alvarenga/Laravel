<x-layout title="- Pizzas {{ucfirst($dataPizza->name)}}">
    <div class="sub-title">
        <div>
            <h1>Pizzas {{ucfirst($dataPizza->name)}}</h1>
        </div>
    </div>

    @if(count($dataPizza->pizzas) < 1)
        <div class="sub-title">
            <div>
                <h1>Não Existe Ainda Pizzas Deste Tipo</h1>
            </div>
        </div>
    @else 
        <x-pizzas.itens :dataPizza="$dataPizza">
        </x-pizzas.itens>
    @endif
    
</x-layout>