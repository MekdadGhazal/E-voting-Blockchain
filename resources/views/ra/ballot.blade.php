@extends('layouts.app')

@section('content')
    <div class="row">
    	<div class="col-md-12 ">
    		<div class="panel panel-headline">
    			<div class="panel-heading">Ballot Code List</div>
    			<div class="panel-body">
    				<form action="{{ route('ra.ballot') }}" method="post">
                        <div class="form-group">
                            <label for="number">Numbers of Ballots</label>
                            <input type="text" name="number" id="ballots" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="item_id">Vote ID</label>
                            <input type="text" name="item_id" id="item_id" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Generate</button>
                        @csrf

                    </form>

                        <hr>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Code</th>
                                <th>isUsed</th>
                                <th>UseFor</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($data as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->code }}</td>

                                <td>
                                    @if( $item->used == 0) NO
                                    @else YES
                                    @endif
                                </td>
                                <td>{{ $item->item_id }}</td>
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
@endsection
