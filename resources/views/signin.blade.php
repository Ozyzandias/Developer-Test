@extends('template')
@section('content')
<div class="form-login w-100 m-auto">
  <form action="{{ route('signmethod') }}" method="post">
    @csrf
    <h1 class="title-login">LOGIN</h1>
    <div class="btn-group selector">
      <a href="{{ route('login') }}" class="btn active" aria-current="page">SIGN IN</a>
      <a href="{{ route('signup') }}" class="btn">SIGN UP</a>
    </div>
    @if (session('error') && session('error') == 'not_found')
      <div class="form-group">
        <label class="error_msg">User not found.</label>
      </div>
    @endif
    <div class="groupinp">
        <p>EMAIL</p>
        <input type="email" class="form-control @error('email') is-invalid @enderror" name ="email" id="email" placeholder="YOUR EMAIL" value="{{ old('email') }}">
    </div>
    <div class="groupinp">
        <p>PASSWORD</p>
        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="************" value="{{ old('password') }}">
    </div>
    <button class="w-100 btn btn-lg sub" type="submit">Sign in</button>
  </form>
</div>
@stop
