@extends('layouts.app')

@section('content')

    <div class="row">
		<div class="col-md-5">
			<!-- PANEL HEADLINE -->
			<div class="panel panel-headline">
				<div class="panel-heading">
					<h3 class="panel-title">Blockchain Network</h3>
					<p class="panel-subtitle">Select your blockchain network to publish your vote sigs</p>
				</div>
				<div class="panel-body network-select">
					<div class="row">
						<div class="col-md-1"></div>

						<div class="col-md-5">
							<img src="{{asset('img/bitcoin.png')}}" alt="" class="img-rounded" width="128">
							<label class="fancy-radio">
								<input name="network" value="bitcoin" type="radio" form="form-sent" @if(auth()->user()->network == 1) checked @endif>
								<span><i></i>Bitcoin</span>
							</label>
						</div>

						<div class="col-md-5">
							<img src="{{asset('img/testnet.png')}}" alt="" class="img-rounded" width="128">
							<label class="fancy-radio">
								<input name="network" value="testnet" type="radio" form="form-sent" @if(auth()->user()->network == 0) checked @endif>
								<span><i></i>Testnet</span>
							</label>
						</div>
						<div class="col-md-1"></div>

					</div>
				</div>
			</div>
			<!-- END PANEL HEADLINE -->
		</div>
		<div class="col-md-7">
			<!-- PANEL NO PADDING -->
			<div class="panel  panel-headline">
				<div class="panel-heading">
					<h3 class="panel-title">Address & Keys</h3>
					<p class="panel-subtitle">The EA's address and private keys</p>
				</div>
				<div class="panel-body">
                    <form action="{{ route('ea.setting') }}" method="post" id="form-sent">
                        @csrf
                        <div class="form-group @error('setting') has-error @enderror">
                            <label for="address">Bitcoin Address</label>
                            <input type="text" name="address" id="bitcoin_address" class="form-control" value="{{ old('address', auth()->user()->bitcoin_address) }}">
                            @error('setting')
                            <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group @error('setting') has-error @enderror">
                            <label for="comment">Private Key (WIF)</label>
                            <textarea name="pubkey" id="pubkey" class="form-control" rows="5">{{ old('pubkey', auth()->user()->priv_key) }}</textarea>
                            @error('setting')
                            <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="button-right">
                            <button type="submit" class="btn btn-primary">Confirm</button>
                        </div>
                    </form>


                </div>
			</div>
			<!-- END PANEL NO PADDING -->
		</div>
	</div>

@endsection
