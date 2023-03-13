@extends('layout.master')

@section('title',$title)

@section('content')

<div class="container">
    <h1>{{$title}}</h1>

    <form action="/user/auth/sign-in" method="post">
        
        <label for="">
            Email:
            <input type="text" name="email" placeholder="Email" value="{{old('email')}}" >
        </label>
        <label for="">
            密碼:
            <input type="password" name="password" placeholder="密碼" value="{{old('password')}}">
        </label>
       
        
        @if ($errors->any())
            <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            </div>
        @endif  
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button type="submit">登入</button>
    </form>
</div>
@endsection