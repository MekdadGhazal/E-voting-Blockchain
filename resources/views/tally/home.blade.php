@extends('layouts.voter')
@section('content')

    <style>
        .vote-radio{

            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 20000;
        }
        .vote-radio-item{
            cursor: pointer;
            width: 100%;
            height: 100%;
            opacity: 0;
        }

    </style>


<style>
    .active{
        background-color: rgba(0, 0, 0, 0) !important;
    }
</style>

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
												<input class="vote-radio-item" name="vote_item" value="{{ $item->id }}" type="radio" onclick="clicked(this)">
											</div>
										</div>

									</div>
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

<script>
    let inputs = document.getElementsByClassName('vote-radio-item');

    function clicked($this) {
        // Reset the background of all .overlay elements
        let allOverlays = document.querySelectorAll('div.overlay');
        for (let i = 0; i < allOverlays.length ; i++) {
            allOverlays[i].classList.remove('active');
        }

        // Find the clicked .vote-radio-item element with the matching data-id
        let voteItem = document.querySelector(`[data-id="${$this.value}"]`);

        // Apply the new style to the overlay inside the clicked voteItem
        if (voteItem) {
            let overlay = voteItem.querySelector('.profile-header .overlay');
            if (overlay) {
                overlay.classList.add('active') ; // Apply the new background color
            }
        }
    }
</script>
@endsection
