@extends('form_app.layouts.master')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Список форм</div>
        <table class="table">
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
              <span><a href="">Редактировать</a></span> |
              <span><a href="">Удалить</a></span>
            </td>
          </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection