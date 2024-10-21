@extends('layouts.app')

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Voting List</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Voters Numbers</th>
                            <th>Created Time</th>
                            <th>Operation</th>
                            <th></th>
                            <th></th>

                        </tr>
                        </thead>
                        <tbody>
                        @forelse($data as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->number }}</td>
                                <td>{{ $item->created_at }}</td>
                                @if($item->is_started=='0')
                                    <td> <button type="button" data-id="{{ $item->id }}" class="btn  btn-toggle btn-success">Start Voting</button></td>
                                @else
                                    <td><button type="button" data-id="{{ $item->id }}" class="btn  btn-toggle btn-danger">Stop Voting</button></td>
                                @endif
                                <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target=".modal-manage-profile" onclick="loadProfile({{ $item->id }})">Profile</button></td>
                                <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target=".modal-manage-candidate" onclick="loadCandidate({{ $item->id }})">Candidate</button></td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">No data</td>
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
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Manage Profile</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
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

                            @csrf
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="updateProfile()">Save changes</button>
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
                    <h4 class="modal-title" id="myModalLabel">View Candidates</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="input-id" value="NaN">
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
