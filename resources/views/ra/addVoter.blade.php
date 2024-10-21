@extends('layouts.app')

@section('content')
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-headline">
    			<div class="panel-heading">Voter Registration</div>
    			<div class="panel-body">

					<div class="form-group">
						<label for="title">First Name</label>

						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-user"></i></span>
							<input class="form-control voter-firstname" placeholder="First Name" name="firstname" type="text"required >
						</div>
					</div>

					<div class="form-group">
						<label for="title">Last Name</label>

						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-user"></i></span>
							<input class="form-control voter-lastname" placeholder="Last Name" name="lastname" type="text"required >
						</div>
					</div>

    					<div class="form-group">
							<label for="title">Email</label>

							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
								<input class="form-control voter-email" placeholder="voter@gmail.com" name="email" type="email" required />
							</div>
    					</div>

						<div class="form-group">
							<label for="vote_id">Vote For</label>
							<select class="form-control vote-id" name="vote_id" id="vote_id">
								@forelse($data as $item)
									<option value="{{ $item->id }}">{{ $item->title }}</option>
                                @empty
									<option>Please add a vote first</option>
                                @endforelse
							</select>
						</div>
						<button type="submit" class="btn btn-primary btn-email">Send An Email</button>
    			</div>
    		</div>
    	</div>
    </div>
@endsection
