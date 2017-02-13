@extends('form_app.layouts.master')
@section('content')
    <h1>{{ $title }}</h1>
  @foreach($nodes as $node)
    <div class="section_row">
      <h3>{{ $node->name }}</h3>
      @foreach($node->inputs->chunk($node->column) as $inputRow)
        <div class="row">
          @foreach($inputRow as $input)
          <div class="col-md-4">
            @include('form_app.helper.inputs', $input)
          </div>
          @endforeach
        </div>
      @endforeach
    </div>
  @endforeach
@endsection