@extends('layout.master')

@section('title',$title)

@section('content')

<div class="container">
    <h1>{{$title}}</h1>
    <div>歡迎{{$name}},{{$email}}登入!!</div>
</div>
@endsection