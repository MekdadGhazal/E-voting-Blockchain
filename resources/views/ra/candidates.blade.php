@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Candidates For</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <select class="form-control input-id" name="vote_id" id="vote_id">
                                    @forelse($data as $item)
                                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                                        @empty
                                        <option>Please add a vote first</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <span class="input-group-btn"><button class="btn btn-primary" type="button">Go!</button></span>

                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="box-candidate">
                            Loading...
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>


    <!-- Manage Candidate -->
    <div class="modal fade modal-edit-candidate" tabindex="-1" role="dialog" aria-labelledby="candidate">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Manage Candidates</h4>
                </div>
                <div class="modal-body">
                    <div class="row">

                        <div class="col-md-4">

                                    <div class="form-group">
                                        <label for="title">Candidate</label>
                                        <img src="{{asset('img/avatar.png')}}" width="256">

                                    </div>

                        </div>


                        <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="title">Candidate Name / Vote Item Name</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input class="form-control input-name" placeholder="Yifan" name="firstname" type="text">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control input-des" placeholder="Candidate short description" rows="10"></textarea>
                                    </div>
                            <input class="candidate-id" type="hidden" value="">
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button"  class="btn btn-success btn-edit-candidate">Save</button>

                </div>
            </div>
        </div>
@endsection
