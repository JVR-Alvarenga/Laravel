<div class="inputArea">
    <label for="{{$name}}">{{$label ?? ''}}</label>
    <select id="{{$name}}" name="{{$name}}"> 
        <option selected disabled>Selecione a Opção</option>
        {{$slot}}
    </select>
</div>