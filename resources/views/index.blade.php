<!-- <p>
    {{ $greeting }} {{ $name or '' }}. Welcome Back~
</p>

<ul>
  @foreach($items as $item)
    <li>{{ $item }}</li>
  @endforeach
</ul>

@if($itemCount = count($items))
  <p>There are {{ $itemCount }} items !</p>
@else
  <p>There is no item !</p>
@endif

@forelse($items as $item)
  <p>The item is {{ $item }}</p>
@empty
  <p>There is no item !</p>
@endforelse -->
@extends('master')

@section('style')
  <style>
    body {background: red;}
  </style>
@stop

@section('content')
  Your content here !!!
@stop

@section('script')
  <script>
    alert("Hello Blade~ ^^/");
  </script>
@stop

