<!-- NAVBAR -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="brand">
        <img src="{{asset('img/logo-dark.png')}}" alt="Logo" class="img-responsive logo">
    </div>
    <div class="container-fluid">
        <div class="navbar-btn">
            <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
        </div>

        <div id="navbar-menu hidden-xs">
            <ul class="nav navbar-nav navbar-right">

                <li class="dropdown hidden-xs">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="{{asset('img/user.png')}}" class="img-circle" alt=""> <span>{{ auth()->user()->nickname }}</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('auth.password.change') }}">
                                <i class="lnr lnr-lock"></i> <span>Change Password</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('auth.signout') }}">
                                <i class="lnr lnr-exit"></i> <span>Sign Out</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- END NAVBAR -->
