@extends('layouts.voter')
@section('content')
    <div>
    <input type="hidden" class="eaaddress" value="@if($data['eaddress'] != 0) {{ $data['eaddress'] }}@endif">
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-headline">

                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="lnr lnr-inbox"></i>  {{ $data['title'] }}</h3>
                        <p class="panel-subtitle">Vote for your PM</p>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <input type="hidden" class="vote-candidate" value="" />
                            <div class="list-candidate">
{{--                                @if($data->is_started)--}}
{{--                                    @foreach($data->candidates as $item)--}}
{{--                                            <div class="col-md-6">--}}
{{--                                                <div class="panel-vote-item" data-id="{{ $item->id }}">--}}
{{--                                                    <div class="profile-header">--}}
{{--                                                        <div class="overlay"></div>--}}
{{--                                                        <div class="profile-main" style="background-image: url({{ asset('img/studentunion.jpg') }});">--}}
{{--                                                            <h3 class="name">{{ $item->title }}</h3>--}}
{{--                                                            <span class="online-status status-available">started</span>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="vote-radio">--}}
{{--                                                        <input class="vote-radio-item" name="vote_item" value="{{ $item->id }}" type="radio">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                    @endforeach--}}
{{--                                @endif--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <input type="hidden" class="item_id" value="{{ $data['item_id'] }}">
                <div class="panel panel-headline">
                    <div class="panel-heading">
                        <h3 class="panel-title">Select Your Identity</h3>
                        <p class="panel-subtitle">Available numbers: <span class="bitcoin-address-numbers"></span></p>
                    </div>
                    <div class="panel-body">
                        <p>Bitcoin Address</p>
                        @csrf
                        <select class="form-control bitcoin-address-box">
                            @if($data["eaddress"] != 0)
                                <option>{{ $data["eaddress"] }}</option>
                            @endif
                        </select>
                        <br><p>Public key</p>

                        <textarea class="form-control public-key-area" placeholder="" rows="6" readonly>@if($data['public_key'] != 0) {{ $data['public_key'] }}@endif</textarea>

                        <br><p>Private key</p>
                        <textarea class="form-control private-key-area" @if($data['private_key'] != 0) placeholder="{{ $data['private_key'] }}"@endif rows="6"></textarea>
                        <br>
                        <div class="button-step">
                            <button type="button" class="btn btn-primary btn-start-vote">Vote now</button>
                        </div>


                    </div>
                </div>
            </div>
            </div>
        </div>

@endsection
