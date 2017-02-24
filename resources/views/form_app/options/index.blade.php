@extends('form_app.layouts.master')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#form-add">
        Добавить option
      </button>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
        @include('form_app.errors.base')
        @include('form_app.message.base')
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
            <th>Группа</th>
            <th>Действие</th>
          </tr>
          </thead>
          <tbody>
          @foreach($forms as $form)
          <tr>
            <th>{{ $form->id }}</th>
            <td>{{ $form->name }}</td>
            <td>{{ $form->group->name }}</td>
            <td>
              <span><a href="{{ route('option.edit', $form->id) }}">Редактировать</a></span> |
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
          <h4 class="modal-title" id="exampleModalLabel">Добавить option</h4>
        </div>
        <form action="{{ route('option.store') }}" method="post">
          {{ csrf_field() }}
        <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" class="control-label">Название:</label>
            <input type="text" name="name" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="value" class="control-label">value:</label>
            <input type="text" name="value" class="form-control" id="value">
          </div>
          <div class="form-group">
            <label for="group" class="control-label">Выбери группу:</label>
            <select name="group_option_id" id="group_option_id" class="form-control">
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