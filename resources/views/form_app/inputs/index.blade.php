@extends('form_app.layouts.master')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#form-add">
        Добавить инпут
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
            <th>value</th>
            <th>Тип</th>
            <th>Действие</th>
          </tr>
          </thead>
          <tbody>
          @foreach($forms as $form)
          <tr>
            <th>{{ $form->id }}</th>
            <td>{{ $form->label }}</td>
            <td>{{ $form->name }}</td>
            <td>{{ $form->input_type_code }}</td>
            <td>
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
          <h4 class="modal-title" id="exampleModalLabel">Добавить инпут</h4>
        </div>
        <form action="{{ route('form.store') }}" method="post">
          {{ csrf_field() }}
        <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" class="control-label">Название:</label>
            <input type="text" name="name" class="form-control" id="recipient-name">
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