@extends('layouts.app')

@section('content')

    <div class="row">
    	<div class="col-md-7">
    		<div class="panel panel-headline">
    			<div class="panel-heading">Add a vote</div>
    			<div class="panel-body">
                    <form action="{{ route('ea.vote') }}" method="post">
                        @csrf
                        <div class="form-group @error('title') has-error @enderror">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
                            @error('title')
                            <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group @error('number') has-error @enderror">
                            <label for="number">Numbers of voters</label>
                            <input type="number" name="number" id="number" class="form-control" value="{{ old('number') }}">
                            @error('number')
                            <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group @error('description') has-error @enderror">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control" rows="6" required>{{ old('description') }}</textarea>
                            @error('description')
                            <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="button-right">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>

                </div>
    		</div>
    	</div>
		<div class="col-md-5">
			<div class="panel panel-headline">
				<div class="panel-heading">Background</div>
				<div class="panel-body">
					<div class="form-group">
						<img src="{{asset('img/upload.jpg')}}" width="330">
					</div>
				</div>

			</div>
		</div>
    </div>
@endsection
