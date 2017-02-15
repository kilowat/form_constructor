@extends('form_app.layouts.master')
@section('content')
    <h3>Редактировать: {{ $form->name }}</h3>
    @include ('form_app.errors.base')
    @include('form_app.message.base')
    <form action="{{ route('form.update') }}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ $form->id }}">
        <div class="modal-body">
            <div class="form-group">
                <label for="recipient-name" class="control-label">Название:</label>
                <input type="text" name="name" value="{{ $form->name }}" class="form-control" id="recipient-name">
            </div>
            <div class="form-group">
                <label for="group" class="control-label">Выбери группы:</label>
                <select name="group_id[]"  class="form-control" id="group_id" multiple="multiple">
                    @foreach($groups as $group)
                        <option value="{{ $group->id }}" @if(in_array($group->id, $groupIdsSelected))
                        selected="selected" @endif>{{ $group->name }}</option>
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