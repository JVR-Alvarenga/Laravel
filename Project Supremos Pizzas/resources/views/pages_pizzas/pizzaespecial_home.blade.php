<x-layout title="- Pizzas Especiais">

    <div class="sub-title">
        <div>
            <h1>Pizzas Especiais</h1>
        </div>
    </div>

    @if(count($dataPizza) > 0)
        <x-pizzas.itens :dataPizza="$dataPizza">
        </x-pizzas.itens>
    @else
        <h3>Não Existe Ainda Pizzas Deste Tipo</h3>
    @endif

    </div>
</x-layout>
