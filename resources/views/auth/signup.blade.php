@extends('layouts.public')

@section('content')

    <form action="{{ route('auth.signup') }}" method="post">

        <div class="form-group @error('username') has-error @enderror">
            <label for="username">Name</label>
            <input type="text" name="username" id="username" class="form-control" value="{{ old('username') }}">
            @error('username')
            <span class="help-block">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group @error('password') has-error @enderror">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control">
            @error('password')
            <span class="help-block">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Sign Up</button>

        @csrf
    </form>

@endsection
