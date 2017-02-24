@extends('form_app.layouts.master')
@section('content')
  <h3>Редактировать: {{ $form->label }}</h3>
  @include ('form_app.errors.base')
  @include('form_app.message.base')
  <form action="{{ route('input.update') }}" method="post">
    {{ csrf_field() }}
    <input type="hidden" value="{{ $form->id }}" name="id">
    <input type="hidden" name="id" value="{{ $form->id }}">
    <div class="modal-body">
      <div class="form-group">
        <label for="name" class="control-label">Name:</label>
        <input type="text" name="name" value="{{ $form->name }}" class="form-control" id="name">
      </div>
      <div class="form-group">
        <label for="label" class="control-label">Label:</label>
        <input type="text" name="label" value="{{ $form->label }}" class="form-control" id="label">
      </div>
      <div class="form-group">
        <label for="group" class="control-label">Выбери группу:</label>
        <select name="input_group_id"  class="form-control" id="group_id">
          @foreach($groups as $group)
            <option value="{{ $group->id }}" @if($group->id === $form->input_group_id) selected="selected"@endif>{{ $group->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="input_type_code" class="control-label">Выбери тип:</label>
        <select name="input_type_code"  class="form-control" id="input_type_code">
          @foreach($typeOptions as $typeOption)
            <option value="{{ $typeOption->code }}" @if($typeOption->code == $form->type->code) selected="selected"@endif>{{ $typeOption->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="group_option_id" class="control-label">Выбери группу select:</label>
        <select name="group_option_id"  class="form-control" id="group_option_id">
          @foreach($optionGroups as $optionGroup)
            <option value="{{ $optionGroup->id }}" @if($form->group_option_id === $optionGroup->id) selected="selected" @endif>{{ $optionGroup->name }}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="modal-footer">
      <a href="/"><button type="button" class="btn btn-default" data-dismiss="modal">Назад</button></a>
      <button type="submit" class="btn btn-primary">Сохранить</button>
    </div>
  </form>

@endsection