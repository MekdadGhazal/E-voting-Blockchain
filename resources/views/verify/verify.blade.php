@extends('layouts.voter')
@section('content')

    <input type="hidden" class="eaaddress" value="{{ $eaaddress }}">

    <div class="row">
            <div class="col-md-4">
                <input type="hidden" class="item_id" value="{{ $item_id }}">
                <div class="panel panel-headline">
                    <div class="panel-heading">
                        <h3 class="panel-title">Verify your signature</h3>
                        <p class="panel-subtitle"></p>
                    </div>
                    <div class="panel-body">
                        <p>Verify from blockchain automatically</p>
                        <p>Paste your blockchain id</p>
                        <div class="input-group">
                            <input class="form-control input-blockchain-id" type="text">
                            <span class="input-group-btn"><button class="btn btn-primary btn-blockchain-id" type="button">Fetch</button></span>
                        </div>

                        <p>Verify from file manually</p>
                        <p>Paste your signature content here</p>
                        <textarea class="form-control signature-area" placeholder="" rows="10"></textarea>

                        <br><p>Sha1 of your signature hash value</p>
                        <input class="form-control hash-value-area" placeholder=""  readonly />
                        <br>
                        <div class="button-step">
                            <button type="button" class="btn btn-primary signature-verify">Verify</button>
                        </div>


                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="panel panel-headline">

                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="lnr lnr-inbox"></i> {{ $title }}</h3>
                        <p class="panel-subtitle">Verify for your PM</p>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <input type="hidden" class="vote-candidate" value="" />
                            <div class="list-candidate">

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            </div>
        </div>

@endsection
