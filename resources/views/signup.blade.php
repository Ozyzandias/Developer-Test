@extends('template')
@section('content')
<div class="form-login w-100 m-auto">
  <form action="{{ route('signupmethod') }}" method="post">
    @csrf
    <h1 class="title-login">LOGIN</h1>
    <div class="btn-group selector">
      <a href="{{ route('login') }}" class="btn" aria-current="page">SIGN IN</a>
      <a href="{{ route('signup') }}" class="btn active">SIGN UP</a>
    </div>
    @if (session('error') && session('error') == 'found')
      <div class="form-group">
        <label class="error_msg">This email already exists</label>
      </div>
    @endif
    <div class="groupinp">
        <p>EMAIL</p>
        <input type="email" class="form-control @error('user') is-invalid @enderror" name="user" placeholder="YOUR EMAIL" value="{{ old('user') }}">
    </div>
    <div class="groupinp">
        <p>PASSWORD</p>
        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="************">
    </div>
    <div class="groupinp">
        <p>REPEAT PASSWORD</p>
        <input type="password" class="form-control @error('reppassword') is-invalid @enderror" name="reppassword" placeholder="************">
    </div>
    <div class="form-check">
      <input class="form-check-input" type="checkbox" name="admin" value="admin" id="flexCheckDefault">
      <label class="form-check-label" for="flexCheckDefault">
        IS ADMIN
      </label>
    </div>
    <button class="w-100 btn btn-lg sub" type="submit">Sign up</button>
  </form>
</div>
@stop
