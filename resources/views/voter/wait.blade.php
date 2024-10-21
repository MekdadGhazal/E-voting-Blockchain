@extends('layouts.voter')

@section('content')
    <div class="row">
        <div class="col-md-offset-1 col-md-10 col-md-offset-1">
            <div class="panel panel-headline">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Step 3 Waiting for the voting date</h3>
                    </div>
                    <div class="panel-body no-padding bg-primary text-center">
                        <div class="padding-top-30 padding-bottom-30">
                            <i class="fa fa-calendar-check-o fa-5x"></i>
                            <h3>The voting will start at {{now()->addDays(3)->format('l, M d, Y')}}</h3>
                        </div>
                    </div>
                </div>

                <div class="panel-body">
                    <p>Your public key is as follows. If you lost or forgot your private key, you can generate a new one by clicking the "Renew Keys" button </p>
                    <br />
                    <p>Your Public Key</p>
                    <textarea class="form-control public-key-area" placeholder="" rows="6" readonly>@if($data['public_key'] != 0) {{ $data['public_key'] }} @endif</textarea>
                    <br/>
                    <div class="button-step">
                        <a type="button" class="btn btn-danger" href="{{ url('/vote/fill?code=' . $data['code']) }}"><i class="fa fa-refresh"></i> Renew Keys</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

