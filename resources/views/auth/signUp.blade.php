@extends('layout.master')

@section('title',$title)

@section('content')

<div class="container">
    <h1>{{$title}}</h1>

    <form action="/user/auth/sign-up" method="post">
        <label for="">
            暱稱:
            <input type="text" name="nickname" placeholder="暱稱" value="{{old('nickname')}}">
        </label>
        <label for="">
            Email:
            <input type="text" name="email" placeholder="Email" value="{{old('email')}}" >
        </label>
        <label for="">
            密碼:
            <input type="password" name="password" placeholder="密碼" value="{{old('password')}}">
        </label>
        <label for="">
            確認密碼:
            <input type="password" name="password_confirmation" placeholder="確認密碼" value="{{old('password_confirmation')}}">
        </label>
        <label for="">
            帳號類型:
            <select name="type">
                <option value="G">一般會員</option>
                <option value="A">管理者</option>
            </select>
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
        <button type="submit">註冊</button>
    </form>
</div>
@endsection