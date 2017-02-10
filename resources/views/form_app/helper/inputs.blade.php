
<div class="input-group">
  <span class="input-group-addon" id="basic-addon2">{{$input->label}}</span>
  @if($input->input_type_code === 'string')
    <input type="text" class="form-control" placeholder="" aria-describedby="basic-addon2">
    @elseif($input->input_type_code === 'list')
    <select name="" id="" class="form-control">

    </select>
    @endif
</div>
<br>