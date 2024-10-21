@extends('layouts.voter')
@section('content')

	<div class="row">
		<div class="col-md-offset-1 col-md-10 col-md-offset-1">
			<div class="panel panel-headline">
					<div class="panel-heading">
						<h3 class="panel-title">Step 1 Ready to vote now!</h3>
					</div>
					<div class="panel-body">
						<div class="no-padding bg-primary text-center">
							<div class="padding-top-30 padding-bottom-30">
								<i class="fa fa-thumbs-o-up fa-5x"></i>
								<h3>{{ $data["title"] }}</h3>
							</div>
						</div>
						<br />
						<p>Welcome to vote!</p>
                        <input class="input-des" type="hidden" value="{{ $data["description"]  }}"/>
						<div class="box-des">
						</div>
						<div class="button-right">
							<a type="button" class="btn btn-primary" href="{{ route('vote.start') }}?code={{ $data["code"] }}"> Next Step</a>
						</div>
					</div>
			</div>
		</div>
	</div>
@endsection
