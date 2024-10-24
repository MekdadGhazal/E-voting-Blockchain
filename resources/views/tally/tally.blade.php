@extends('layouts.voter')
@section('content')

        <div class="row">
            <input type="hidden" class="eaaddress" value="{{ $eaaddress }}">
            <input type="hidden" class="item_id" value="{{ $item_id }}">
            <div class="col-md-12">
                <div class="panel panel-headline">

                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="lnr lnr-inbox"></i> {{ $title }}</h3>
                        <p class="panel-subtitle">The current tally status: <span class="tally-status">Loading</span></p>
                    </div>

                    <div class="panel-body">
                        <div class="button-right">

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="ct-chart ct-perfect-fourth"></div>
                            </div>
                            <div class="col-md-6">
                                <div class="ct-bar-chart ct-perfect-fourth"></div>
                            </div>
                        </div>
                        <hr>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                            <input type="hidden" class="vote-candidate" value="" />
                            <div class="list-candidate">

                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            </div>
        </div>

@endsection
