@extends('layouts.public')

@section('content')
    <form class="form-auth-small" action="{{ route('auth.signin') }}" method="post">
        <div class="form-group">
            <label for="username" class="control-label sr-only">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}" placeholder="username">
            @error('username')
            <span class="help-block">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="password" class="control-label sr-only">Password</label>
            <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}" placeholder="Password">
            @error('password')
            <span class="help-block">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group clearfix">
            <label class="fancy-checkbox element-left">
                <input type="checkbox">
                <span>Remember me</span>
            </label>
        </div>
        <button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
        <div class="bottom">
            <span class="helper-text"><i class="fa fa-lock"></i> <a href="#">Forgot password?</a></span>
        </div>
        @csrf
    </form>
@endsection
