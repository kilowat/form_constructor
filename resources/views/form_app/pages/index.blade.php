@extends('form_app.layouts.master')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#form-add">
        Добавить форму
      </button>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      @if (count($errors) > 0)
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">
          Список форм:
        </div>
        <table class="table table-striped">
          <thead>
          <tr>
            <th>id</th>
            <th>Название</th>
            <th>Действие</th>
          </tr>
          </thead>
          <tbody>
          @foreach($forms as $form)
          <tr>
            <th>{{ $form->id }}</th>
            <td>{{ $form->name }}</td>
            <td>
              <span><a href="{{ route('form.show', $form->id) }}">Открыть</a></span> |
              <span><a href="{{ route('form.edit', $form->id) }}">Редактировать</a></span> |
              <span><a href="">Удалить</a></span>
            </td>
          </tr>
          @endforeach
          </tbody>
        </table>
        {{ $forms->links() }}
      </div>
    </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="form-add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="exampleModalLabel">New message</h4>
        </div>
        <form action="{{ route('form.store') }}" method="post">
          {{ csrf_field() }}
        <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" class="control-label">Название:</label>
            <input type="text" name="name" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="group" class="control-label">Выбери группы:</label>
            <select name="group_id[]"  class="form-control" id="group_id" multiple="multiple">
              @foreach($groups as $group)
              <option value="{{ $group->id }}">{{ $group->name }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
          <button type="submit" class="btn btn-primary">Добавить</button>
        </div>
        </form>
      </div>
    </div>
  </div>
@endsection