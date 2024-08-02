<div class="inputArea">
    <label for="{{$name}}">{{$label ?? ''}}</label>
    <input id="{{$name}}" name="{{$name}}" 
        type="{{$type ?? 'text'}}"
        value="1"
        @if($checked)
            checked
        @endif
    />
</div>