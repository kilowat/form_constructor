@extends('form_app.layouts.master')
@section('content')
    <h1>Редактировать: {{ $form->name }}</h1>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
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