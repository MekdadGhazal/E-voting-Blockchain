@extends('layouts.app')

@section('content')

    <div>
    <input type="hidden" class="bitcoin-address" value="{{ $data->bitcoin_address }}">
    <div class="row">
    	<div class="col-md-12">
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Overview</h3>
                    <p class="panel-subtitle">Welcome back, </p>
                </div>
                <div class="panel-body">

                    <div class="row">
                        <div class="col-md-3">
                            <div class="metric">
                                <span class="icon"><i class="fa fa-btc"></i></span>
                                <p>
                                    <span class="number number-btc">Loading...</span>
                                    <span class="title">Balance</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="metric">
                                <span class="icon"><i class="fa fa-globe"></i></span>
                                <p>
                                    <span class="number number-network">
                                        @if(auth()->user()->network == 1)
                                            Bitcoin
                                        @else
                                            Testnet
                                        @endif
                                    </span>
                                    <span class="title">Network</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="metric">
                                <span class="icon"><i class="fa fa-bar-chart"></i></span>
                                <p>
                                    <span class="number">{{ $data->items }}</span>
                                    <span class="title">Total Items</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="metric">
                                <span class="icon"><i class="fa fa-bar-chart"></i></span>
                                <p>
                                    <span class="number">{{ $data->voters }}</span>
                                    <span class="title">Total Voters</span>
                                </p>
                            </div>
                        </div>
                    </div>

                    @forelse($vote as $item)
                    <div class="row">
                        <div class="col-md-9">
                            <div class="profile-header">
                                <div class="overlay"></div>
                                <div class="profile-main" style='background-image: url("{{asset('img/studentunion.jpg')}}");height:220px'>
                                    <h3 class="name">{{ $item->title }}</h3>
                                    @if($item->is_started =='0')
                                        <span class="offline-status status-available">unbegun</span>
                                    @else
                                        <span class="online-status status-available">started</span>
                                    @endif
                                </div>
                                <div class="profile-stat">
                                    <div class="row">
                                        <div class="col-md-4 stat-item">
                                            @if($item->is_started =='0')
                                                <span> <a class="btn-toggle" data-id="{{ $item->id }}" style="color: #fff; cursor: pointer;" >Start Voting</a></span>
                                            @else
                                                <span><a class="btn-toggle" data-id="{{ $item->id }}" style="color: #fff; cursor: pointer;" >Stop Voting</a></span>
                                            @endif
                                        </div>
                                        <div class="col-md-4 stat-item">
                                            <span style="cursor: pointer" onclick="window.open('http://127.0.0.1:8000/ea/vote', '_self')">Manage</span>
                                        </div>
                                        <div class="col-md-4 stat-item">
                                            <span style="cursor: pointer" onclick="window.open('/tally/home' , '_self')">Tally</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="weekly-summary text-right">
                                <span class="number">20</span>
                                <span class="info-label">Registered Voters Numbers</span>
                            </div>
                            <div class="weekly-summary text-right">
                                <span class="number">10</span>
                                <span class="info-label">Bitcoin Address Numbers</span>
                            </div>
                            <div class="weekly-summary text-right">
                                <span class="number">8</span>
                                <span class="info-label">Voted Numbers</span>
                            </div>
                        </div>
                    </div>
                    @empty
                    No data
                </div>
                @endforelse

                </div>
            </div>
    	</div>
    </div>
@endsection
