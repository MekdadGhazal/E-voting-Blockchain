@extends('layouts.voter')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

	<div class="row">
		<div class="col-md-offset-1 col-md-10 col-md-offset-1">
			<div class="panel panel-headline">
                <input name="coded" id="coded" value="{{$data['code']}}"  hidden>
						<div class="panel-heading">
							<h3 class="panel-title">Step 2 Keys Management Tool</h3>
						</div>
					<div class="panel-body">

						<p>Now, it's time to generate your keys which can help you to protect your privacy.</p>
						<p>When you are voting, you will use your public key and private key to vote. The system will save your public key into our database.</p>
						<p>Please attention that your PRIVATE KEY WILL NOT SAVE INTO OUR SYSTEM.</p>
						<p>So, please save your private key value into your computer and keep it privately.</p>
						<p>If you lost or forgot your private key before the vote date, you can generate a new one and save the new public key into our system.</p>
						<div class="row">
							<div class="col-md-6">
								<p>Public key</p>
								<textarea class="form-control public-key-area" placeholder="" rows="14" readonly>@if($data['public_key'] != 0) {{ $data['public_key'] }}@endif</textarea>
								<p></p>
							</div>
							<div class="col-md-6">
								<p>Private key</p>
								<textarea class="form-control private-key-area" placeholder="" rows="14">THE SYSTEM WILL NOT SAVE YOUR PRIVATE KEY</textarea>
								<p></p>
							</div>
						</div>
							<div class="button-step">
								<button type="button" class="btn btn-primary btn-generate">Generate Keys</button>
								<button type="button" class="btn btn-success btn-updatekey">Save Public Key</button>
							</div>
					</div>

			</div>
		</div>
	</div>
@endsection
