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
            <th>Группа</th>
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
            <td>{{ $form->group->name }}</td>
            <td>{{ $form->input_type_code }}</td>
            <td>
              <span><a href="{{ route('input.edit', $form->id) }}">Редактировать</a></span> |
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
        <form action="{{ route('input.store') }}" method="post">
          {{ csrf_field() }}
        <div class="modal-body">
          <div class="form-group">
            <label for="recipient-label" class="control-label">Label:</label>
            <input type="text" name="label" class="form-control" id="label">
          </div>
          <div class="form-group">
            <label for="group" class="control-label">Выбери группу:</label>
            <select name="input_group_id"  class="form-control" id="group_id">
              @foreach($groups as $group)
                <option value="{{ $group->id }}">{{ $group->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="name" class="control-label">Attr name:</label>
            <input type="text" name="name" class="form-control" id="name">
          </div>
          <div class="form-group">
            <label for="input_type_code" class="control-label">Выбери тип:</label>
            <select name="input_type_code"  class="form-control" id="input_type_code">
              @foreach($typeOptions as $typeOption)
                <option value="{{ $typeOption->code }}">{{ $typeOption->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="group_option_id" class="control-label">Выбери группу select:</label>
            <select name="group_option_id"  class="form-control" id="group_option_id">
              @foreach($optionGroups as $optionGroup)
                <option value="{{ $optionGroup->id }}">{{ $optionGroup->name }}</option>
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