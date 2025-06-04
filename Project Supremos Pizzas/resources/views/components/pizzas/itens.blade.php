<x-layout title=" - {{$dataPizza['title']}}">
    <div class="container-pizzas">
        <div class="box-pizza">
            @foreach($dataPizza as $item):
            <div  class="quadro-pizza">
                <div class="info-pizza">
                    <div class="image-pizza">
                        <img src="/assets/image/pizzamilhobacon.png" />
                    </div>
                    <div class="name-pizza">{{$item->flavor}}</div>
                    <div class="desc-pizza">
                       {{$item->description}}
                    </div>
                    <div class="price-pizza">R$ {{number_format($item->price_g, 2)}}</div>
                </div>
                <div class="cart">
                    <div class="sub-cart"> - </div>
                    <div class="quant-item-cart"> 0 </div>
                    <div class="add-cart"> + </div>
                </div>
                <div class="cart-add-submit">
                    <button>
                        Adicionar Ao Carrinho
                    </button>
                </div>
            </div>
            @endforeach
        </div>
</x-layout>