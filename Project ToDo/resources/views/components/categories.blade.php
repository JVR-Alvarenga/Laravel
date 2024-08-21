<div class="box-sizing">
    <div class="box-category">
        <div class="category-title">{{$data->title}}</div>
        <div class="category-color">
            <div class="sphere" style="background-color: {{$data->color}}"></div>
            <p>Cor da Categoria</p>
        </div>
        <div class="category-actions">
            <a href="{{route('category.edit', ['id' => $data->id])}}">
                <img src="/assets/images/icon-edit.png" />
            </a>
            <a href="{{route('category.delete', ['id' => $data->id])}}" onclick="return confirm('Tem certeza que deseja deletar essa categoria?')">
                <img src="/assets/images/icon-delete.png" />
            </a>
        </div>
    </div>
</div>