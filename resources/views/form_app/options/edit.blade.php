@extends('form_app.layouts.master')
@section('content')
  <h3>Редактировать: Option {{ $form->name }}</h3>
  @include ('form_app.errors.base')
  @include('form_app.message.base')
  <form action="{{ route('option.update') }}" method="post">
    {{ csrf_field() }}
    <input type="hidden" value="{{ $form->id }}" name="id">
    <input type="hidden" name="id" value="{{ $form->id }}">
    <div class="modal-body">
      <div class="form-group">
        <label for="name" class="control-label">Name:</label>
        <input type="text" name="name" value="{{ $form->name }}" class="form-control" id="name">
      </div>
      <div class="form-group">
        <label for="value" class="control-label">value:</label>
        <input type="text" name="value" value="{{ $form->value }}" class="form-control" id="value">
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