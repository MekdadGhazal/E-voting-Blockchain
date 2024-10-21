@extends('layouts.public')

@section('content')
    <form class="form-auth-small" action="{{ route('auth.signin') }}" method="post">
        <div class="form-group">
            <label for="username" class="control-label sr-only">Username</label>
            <input type="input" class="form-control" id="username" name="username" value="ea" placeholder="username">
            @if ($errors->has('email'))
                <span class="help-block">{{ $errors->first('email') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="password" class="control-label sr-only">Password</label>
            <input type="password" class="form-control" id="password" name="password" value="12345678" placeholder="Password">
            @if ($errors->has('password'))
                <span class="help-block">{{ $errors->first('password') }}</span>
            @endif
        </div>
        <div class="form-group clearfix">
            <label class="fancy-checkbox element-left">
                <input type="checkbox">
                <span>Remember me</span>
            </label>
        </div>
        <button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>

        @csrf
    </form>
@endsection
