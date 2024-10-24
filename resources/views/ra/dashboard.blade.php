@extends('layouts.app')

@section('content')
    <input type="hidden" class="bitcoin-address" value="{{ $data->bitcoin_address }}">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Overview</h3>
                    <p class="panel-subtitle">Welcome back, Registration Authority</p>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="metric">
                                <span class="icon"><i class="fa fa-globe"></i></span>
                                <p>
                                    <span class="number number-eaaddress">EA address</span>
                                    <span class="title">{{ $eaddress }}</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="metric">
                                <span class="icon"><i class="fa fa-bar-chart"></i></span>
                                <p>
                                    <span class="number">Voter numbers</span>
                                    <span class="title">{{ $voters }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Additional content can go here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Manage Key modal -->
    <div class="modal fade modal-manage-key" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Keys Pool</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Voters Numbers</th>
                            <th>Created Time</th>
                            <th>Operation</th>
                        </tr>
                        </thead>
                        <tbody>
{{--                        @forelse($data as $item)--}}
{{--                            <tr>--}}
{{--                                <td>{{ $item->id }}</td>--}}
{{--                                <td>{{ $item->title }}</td>--}}
{{--                                <td>{{ $item->number }}</td>--}}
{{--                                <td>{{ $item->created_at }}</td>--}}
{{--                                <td>--}}
{{--                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".modal-manage-key">--}}
{{--                                        <i class="fa fa-refresh"></i> Manage Keys--}}
{{--                                    </button>--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                        @empty--}}
{{--                            <tr>--}}
{{--                                <td colspan="5">No data</td>--}}
{{--                            </tr>--}}
{{--                        @endforelse--}}
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
