<!doctype html>
<html lang="en">

<head>
    <title>Dashboard | Blockvotes</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/linearicons/style.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/chartist/css/chartist-custom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/sweetalert.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('img/favicon.png') }}">
</head>

<body>
<div id="wrapper">
    @include('layouts.partials.header')
    @include('layouts.partials.navigation')
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <!-- OVERVIEW -->
                @include('layouts.partials.flash')
                @section('content')
                @show
                <!-- END OVERVIEW -->
            </div>
        </div>
        <!-- END MAIN CONTENT -->
    </div>
</div>

<!-- Javascript -->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('vendor/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
<script src="{{ asset('vendor/chartist/js/chartist.min.js') }}"></script>
<script src="{{ asset('vendor/sweet-alert/sweetalert.min.js') }}"></script>
<script src="{{ asset('scripts/common.js') }}"></script>
<script src="{{ asset('scripts/main.js') }}"></script>


@if (request()->is('ra/dashboard'))
    <script src="{{ asset('scripts/ra-dashboard.js') }}"></script>
@endif

@if (request()->is('ra/candidates'))
    <script src="{{ asset('scripts/ra-candidate.js') }}"></script>
@endif

@if( request()->is('ra/addcandidate'))
    <script src="{{ asset('scripts/ra-addCandidate.js') }}"></script>
@endif

@if (request()->is('ea/dashboard'))
    <script src="{{ asset('scripts/ea-dashboard.js') }}"></script>
@endif

@if (request()->is('ea/vote'))
    <script src="{{ asset('scripts/ea-vote.js') }}"></script>
@endif

@if (request()->is('ea/balance'))
    <script src="{{ asset('scripts/ea-balance.js') }}"></script>
@endif

@if (request()->is('ea/fee'))
    <script src="{{ asset('scripts/ea-fee.js') }}"></script>
    <!-- Bitcoin JS -->
    <script src="{{ asset('vendor/bitcoinjs/bitcoinjs-min.js') }}"></script>
    <!-- Hash -->
    <script src="{{ asset('vendor/ring-signature/sha1.js') }}"></script>
@endif
</body>
</html>
