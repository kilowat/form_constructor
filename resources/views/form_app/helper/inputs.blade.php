
<div class="input-group">
  <span class="input-group-addon" id="basic-addon2">{{$input->label}}</span>
  @if($input->input_type_code === 'string')
    <input type="text" class="form-control" placeholder="" id="{{ $input->name }}" aria-describedby="basic-addon2" name="{{ $input->name }}">
    @elseif($input->input_type_code === 'list')
    <select name="{{ $input->name }}" id="{{ $input->name }}" class="form-control">
      @foreach($input->options as $option)
        <option value="{{ $option->value }}">{{ $option->name }}</option>
      @endforeach
    </select>
    @elseif($input->input_type_code === 'checkbox')
    <input type="checkbox" name="{{ $input->name }}" id="{{ $input->name }}">
    @endif
</div>
<br>