@extends('layouts.app')

@section('content')
    <div>
        <div class="row">

            <div class="col-md-4">
                <div class="panel panel-headline">
                    <div class="panel-heading">Candidate</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <img src="{{asset('img/avatar.png')}}" width="256">

                        </div>
                    </div>

                </div>
            </div>


            <div class="col-md-8">
                <div class="panel panel-headline">
                    <div class="panel-heading">
                        <h3 class="panel-title">Candidate Registration</h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="title">Candidate Name / Vote Item Name</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input class="form-control input-name" placeholder="Yifan" name="firstname" type="text"
                                       required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control input-des" placeholder="Candidate short description"
                                      rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="vote_id">Vote For</label>
                            <select class="form-control vote-id" name="vote_id" id="vote_id">
                                @forelse($data as $item)
                                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                                @empty
                                    <option>Please add a vote first</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="button-right">
                            <button type="button" class="btn btn-success btn-add-candidate">Create</button>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
