@extends('form_app.layouts.master')
@section('content')
  <div class="row">
    <div class="col-md-12">
      <form action="">
        @foreach($inputsGroup as $inputGroup)
          <div class="panel panel-default">
            <div class="panel-heading">{{ $inputGroup->name }}</div>
            <div class="panel-body">
              @foreach($inputGroup->inputs as $input)
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon3">{{  $input->label }}:</span>
                <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
             </div>
            @endforeach
          </div>
        @endforeach
      </form>
    </div>
  </div>
@endsection;