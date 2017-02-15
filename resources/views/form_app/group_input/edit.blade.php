@extends('form_app.layouts.master')
@section('content')
  <h3>Редактировать: {{ $form->name }}</h3>
  @include ('form_app.errors.base')
  @include('form_app.message.base')
  <form action="{{ route('inputGroup.update') }}" method="post">
    {{ csrf_field() }}
    <input type="hidden" value="{{ $form->id }}" name="id">
    <input type="hidden" name="id" value="{{ $form->id }}">
    <div class="modal-body">
      <div class="form-group">
        <label for="recipient-name" class="control-label">Название:</label>
        <input type="text" name="name" value="{{ $form->name }}" class="form-control" id="recipient-name">
      </div>
      <div class="form-group">
        <label for="recipient-sort" class="control-label">Сортировка:</label>
        <input type="text" name="sort" value="{{ $form->sort }}" class="form-control" id="recipient-sort">
      </div>
    </div>
    <div class="modal-footer">
      <a href="/"><button type="button" class="btn btn-default" data-dismiss="modal">Назад</button></a>
      <button type="submit" class="btn btn-primary">Сохранить</button>
    </div>
  </form>

@endsection