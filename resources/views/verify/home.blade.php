@extends('layouts.voter')

@section('content')
    <div class="row">
        <div class="col-md-offset-1 col-md-10 col-md-offset-1">
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Step 1 Select your vote item</h3>
                </div>
                <div class="panel-body">
                    <input type="hidden" class="vote-item" value="NaN">
                    <form action="{{ route('verify.now') }}" method="get">
                        <div class="row">
                            @foreach($data as $item)
                                @if($item->is_started == '1')
                                    <div class="col-md-6">
                                        <div class="panel-vote-item" data-id="{{ $item->id }}">
                                            <div class="profile-header">
                                                <div class="overlay"></div>
                                                <div class="profile-main" style="background-image: url({{ asset('img/studentunion.jpg') }});">
                                                    <h3 class="name">{{ $item->title }}</h3>
                                                    <span class="online-status status-available">started</span>
                                                </div>
                                            </div>
                                            <div class="vote-radio">
                                                <input class="vote-radio-item" name="vote_item" value="{{ $item->id }}" type="radio">
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="button-right">
                            <input type="submit" class="btn btn-primary verify-next-step" value="Next Step" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
