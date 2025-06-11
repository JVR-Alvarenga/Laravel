<div class="container-pizzas">
    <div class="box-pizza">
        @foreach($dataPizza->pizzas as $item):
        <div  class="quadro-pizza">
            <div class="info-pizza">
                <div class="image-pizza">
                    <img class="image" src="{{asset('storage/' . $item->path_file)}}" />
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
</div>