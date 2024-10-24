
@extends('layouts.voter')
@section('content')
	<div class="row">
		<div class="col-md-offset-1 col-md-10 col-md-offset-1">
			<div class="panel panel-headline">
				<div class="panel-heading">
					<h3 class="panel-title">Invalid Code</h3>
				</div>


				<div class="panel-body">
					<p align="center"><img src="https://armstrongmedia.s3.amazonaws.com/wp-content/uploads/2016/08/Sorry.jpg" /></p>
					<p>Sorry, your code is invalid or has been used.</p>
					<p>You lost the chance to vote.</p>
					<p>If you haven't voted and close the browser unexpectedly, your vote will be regarded as abstention.</p>
					<p>Please feel free to ask our team if you have more questions</p>
					<p align="right">BlockVotes Team</p>
					<p align="right"><img src="{{asset('img/logo-dark.png')}}" alt="Logo" width="120px"></p>


				</div>

			</div>
		</div>
	</div>
@endsection
