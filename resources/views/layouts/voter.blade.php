<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
    <title>Vote Now</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/linearicons/style.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/chartist/css/chartist-custom.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/sweetalert.css') }}">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/voter.css') }}">
    <link rel="stylesheet" href="{{ asset('css/verify.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tally.css') }}">

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <!-- ICONS -->
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('img/favicon.png') }}">
</head>

<body>
<!-- WRAPPER -->
<div id="wrapper" class="main-content voter-box">
    <div class="container">

{{--        <input class="code" type="hidden" value="{{ $code }}">--}}
        <input class="code" type="hidden" value="asdmaskmdlaskmlasf">
        @include('layouts.partials.flash')

        @yield('content')

    </div>
</div>
<!-- END WRAPPER -->
<!-- Jquery & Jquery Plugins -->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/jquery/jquery.base64.js') }}"></script>

<!-- SweetAlert Plugins -->
<script src="{{ asset('vendor/sweet-alert/sweetalert.min.js') }}"></script>


@if (request()->is('vote/home'))
    <!-- Load Description -->
    <script src="{{ asset('scripts/home.js') }}"></script>
@endif

@if (request()->is('vote/vote') or request()->is('vote/lost') or request()->is('vote/page'))

    <!-- JSencript Plugins -->
    <script src="{{ asset('vendor/jsencrypt/jsencrypt.min.js') }}"></script>

    <!-- Ring signature -->
    <script src="{{ asset('vendor/ring-signature/jsbn.js') }}"></script>
    <script src="{{ asset('vendor/ring-signature/jsbn2.js') }}"></script>
    <script src="{{ asset('vendor/ring-signature/rsa.js') }}"></script>
    <script src="{{ asset('vendor/ring-signature/rsa2.js') }}"></script>
    <script src="{{ asset('vendor/ring-signature/sha1.js') }}"></script>
    <script src="{{ asset('vendor/ring-signature/prng4.js') }}"></script>
    <script src="{{ asset('vendor/ring-signature/rng.js') }}"></script>
    <script src="{{ asset('vendor/ring-signature/ring.js') }}"></script>
    <script src="{{ asset('vendor/ring-signature/jsencrypt.js') }}"></script>

    <!-- Bitcoin JS -->
    <script src="{{ asset('vendor/bitcoinjs/bitcoinjs-min.js') }}"></script>

    <!-- Vote Basic -->
    <script src="{{ asset('scripts/basic.js') }}"></script>

    <!-- Loading Candidates -->
    <script src="{{ asset('scripts/candidate.js') }}"></script>

    <!-- Vote Page -->
    <script src="{{ asset('scripts/vote.js') }}"></script>

    <!-- Vote Now -->
    <script src="{{ asset('scripts/vote-now.js') }}"></script>

@endif

@if (request()->is('vote/fill'))
    <!-- JSencript Plugins -->
    <script src="{{ asset('vendor/jsencrypt/jsencrypt.min.js') }}"></script>

    <!-- Bitcoin JS -->
    <script src="{{ asset('vendor/bitcoinjs/bitcoinjs-min.js') }}"></script>

    <!-- Vote Basic -->
    <script src="{{ asset('scripts/basic.js') }}"></script>

    <!-- Vote Fill -->
    <script src="{{ asset('scripts/vote-fill.js') }}"></script>
@endif

@if (request()->routeIs('verify.now'))
    <!-- Loading Candidates -->
    <script src="{{ asset('scripts/candidate.js') }}"></script>
    <!-- Vote Basic -->
    <script src="{{ asset('scripts/basic.js') }}"></script>
    <!-- Ring signature -->
    <script src="{{ asset('vendor/ring-signature/jsbn.js') }}"></script>
    <script src="{{ asset('vendor/ring-signature/jsbn2.js') }}"></script>
    <script src="{{ asset('vendor/ring-signature/rsa.js') }}"></script>
    <script src="{{ asset('vendor/ring-signature/rsa2.js') }}"></script>
    <script src="{{ asset('vendor/ring-signature/sha1.js') }}"></script>
    <script src="{{ asset('vendor/ring-signature/prng4.js') }}"></script>
    <script src="{{ asset('vendor/ring-signature/rng.js') }}"></script>
    <script src="{{ asset('vendor/ring-signature/ring.js') }}"></script>
    <script src="{{ asset('vendor/ring-signature/jsencrypt.js') }}"></script>

    <!-- Verify Page -->
    <script src="{{ asset('scripts/verify.js') }}"></script>
@endif

@if (request()->routeIs('tally.now'))
    <!-- Chartist Plugins -->
    <script src="{{ asset('vendor/chartist/js/chartist.min.js') }}"></script>
    <!-- Basic Functions -->
    <script src="{{ asset('scripts/basic.js') }}"></script>
    <!-- Ring signature -->
    <script src="{{ asset('vendor/ring-signature/jsbn.js') }}"></script>
    <script src="{{ asset('vendor/ring-signature/jsbn2.js') }}"></script>
    <script src="{{ asset('vendor/ring-signature/rsa.js') }}"></script>
    <script src="{{ asset('vendor/ring-signature/rsa2.js') }}"></script>
    <script src="{{ asset('vendor/ring-signature/sha1.js') }}"></script>
    <script src="{{ asset('vendor/ring-signature/prng4.js') }}"></script>
    <script src="{{ asset('vendor/ring-signature/rng.js') }}"></script>
    <script src="{{ asset('vendor/ring-signature/ring.js') }}"></script>
    <script src="{{ asset('vendor/ring-signature/jsencrypt.js') }}"></script>

    <!-- If current page is Tally -->
    <script src="{{ asset('scripts/tally.js') }}"></script>
@endif



</body>
</html>

