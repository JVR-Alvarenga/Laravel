<x-layout title="- Especiais">

    <div class="sub-title">
        <div>
            <h1>Pizzas Especiais</h1>
        </div>
    </div>

    <div class="container-pizzas">
        <div class="box-pizza">
            @foreach($data as $item):
            <div  class="quadro-pizza">
                <div class="info-pizza">
                    <div class="image-pizza">
                        <img src="/assets/image/pizzamilhobacon.png" />
                    </div>
                    <div class="desc-pizza">
                       {{$item['description']}}
                    </div>
                    <div class="price-pizza">R$ {{$item['price_g']}}</div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- <div class="box-pizza">
            <div class="quadro-pizza">
                <div class="info-pizza">
                    <div class="image-pizza">
                        <img src="/assets/image/pizzamilhobacon.png" />
                    </div>
                    <div class="desc-pizza">
                        molho de tomate, milho, presunto, bacon...
                    </div>
                    <div class="price-pizza">R$ 00,00</div>
                </div>
            </div>
        </div> -->
    </div>
</x-layout>