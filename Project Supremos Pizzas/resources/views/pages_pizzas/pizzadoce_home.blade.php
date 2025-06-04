<x-layout title="- Pizzas Doces">
<div class="sub-title">
        <div>
            <h1>Pizzas de Doce</h1>
        </div>
    </div>

    @if(count($dataPizza) > 0)
        <x-pizzas.itens :dataPizza="$dataPizza">
        </x-pizzas.itens>
    @else
        <div class="sub-title">
            <h3>Não Existe Ainda Pizzas Deste Tipo</h3>
        </div>
    @endif
</x-layout>