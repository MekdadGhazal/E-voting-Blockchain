@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-headline">
                <div class="panel-heading">Change Password</div>
                <div class="panel-body">
                    <form action="{{ route('auth.password.change') }}" method="post">
                        <div class="form-group @error('password_old') has-error @enderror">
                            <label for="password_old">Current Password</label>
                            <input type="password" name="password_old" id="password_old" class="form-control">
                            @error('password_old')
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
                        <button type="submit" class="btn btn-primary">Change Password</button>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
