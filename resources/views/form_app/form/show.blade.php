@extends('form_app.layouts.master')
@section('content')
  @foreach($nodes as $node)
    <div class="section_row">
      <h1>{{ $node->name }}</h1>
      @foreach($node->inputs as $input)
        @include('form_app.helper.inputs', $input)
      @endforeach
      @foreach($node->children as $child)
        <h2>{{ $child->name }}</h2>
        @foreach($child->inputs as $input)
          @include('form_app.helper.inputs', $input)
        @endforeach
      @endforeach
    </div>
  @endforeach
@endsection;