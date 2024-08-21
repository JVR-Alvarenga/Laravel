<div class="inputArea">
    <label for="{{$name}}">{{$label ?? ''}}</label>
    <input id="{{$name}}" name="{{$name}}" 
        value="{{$value ?? ''}}"
        type="{{empty($type) ? 'text': $type}}"
        placeholder="{{empty($placeholder) ? '':$placeholder}}" 
    />
</div>