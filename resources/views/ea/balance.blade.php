@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Balance List</h3>
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
                            <span class="input-group-btn"><button class="btn btn-primary btn-load-balance" type="button">Load All</button></span>

                        </div>
                    </div>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Bitcoin Addresss</th>
                            <th>Balance</th>
                        </tr>
                        </thead>
                        <tbody class="table-balance">
                        @forelse($data as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->id}}</td>
                                <td>{{$item->id}}</td>
                            </tr>
                        @empty
                        <tr>
                            <td colspan="3">NOdata</td>
                        </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>


    <!-- Manage Profile -->
    <div class="modal fade modal-manage-profile" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Title</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form method="POST" action="{{ route('profile.update') }}">
                                @csrf
                                <div class="form-group @error('title') has-error @enderror">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" id="title" class="form-control title" value="{{ old('title') }}">
                                    @error('title')
                                    <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group @error('number') has-error @enderror">
                                    <label for="number">Numbers of voters</label>
                                    <input type="text" name="number" id="number" class="form-control number" value="{{ old('number') }}">
                                    @error('number')
                                    <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group @error('description') has-error @enderror">
                                    <label for="description">Description</label>
                                    <textarea name="description" class="form-control description" rows="10">{{ old('description') }}</textarea>
                                    @error('description')
                                    <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Manage Candidate -->
    <div class="modal fade modal-manage-candidate" tabindex="-1" role="dialog" aria-labelledby="candidate">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Title</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="input-id" value="NaN">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input class="form-control input-name" placeholder="Candidate Name" type="text">

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-comment"></i></span>
                                <input class="form-control input-des" placeholder="Candidate short description" type="text">

                            </div>
                        </div>

                        <div class="col-md-offset-2 col-md-2"><button type="button"  class="btn btn-success btn-add-candidate">Add</button></div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="box-candidate">
                            Loading...
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
@endsection
