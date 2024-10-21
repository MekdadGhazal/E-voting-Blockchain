<!-- LEFT SIDEBAR -->
<div id="sidebar-nav" class="sidebar">
    <div class="sidebar-scroll">
        <nav>
            <ul class="nav">
                @if(auth()->check())
                <li class="menu-dashboard"><a href="{{ route('auth.dashboard') }}" ><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
                @if(auth()->user()->role == 1)
                <li>
                    <a href="#subVoter" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>Voters</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                    <div id="subVoter" class="collapse ">
                        <ul class="nav">
                            <li class="menu-addVoter">
                                <a href="{{ route('ra.addVoter') }}">
                                    <i class="fa fa-inbox"></i> <span>Add a voter</span>
                                </a>
                            </li>
                            <li class="menu-ballot">
                                <a href="{{ route('ra.ballot') }}">
                                    <i class="lnr lnr-inbox"></i> <span>Ballot Code</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#subVoting" data-toggle="collapse" class="collapsed"><i class="lnr lnr-inbox"></i> <span>Candidates</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                    <div id="subVoting" class="collapse ">
                        <ul class="nav">
                            <li class="menu-addcandidate sub-menu">
                                <a href="{{ route('ra.addCandidate') }}">
                                    <i class="lnr lnr-file-add"></i> <span>Add a candidate</span>
                                </a>
                            </li>
                            <li class="menu-candidates sub-menu">
                                <a href="{{ route('ra.candidates') }}">
                                    <i class="lnr lnr-cloud"></i> <span>Candidate List</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="menu-result">
                    <a href="/tally/home">
                        <i class="lnr lnr-list"></i> <span>View Result</span>
                    </a>
                </li>
                @endif

                @if( auth()->user()->role == 2)
                <li>
                    <a href="#subBlockChain" data-toggle="collapse" class="collapsed"><i class="lnr lnr-bold"></i> <span>Blockchain</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                    <div id="subBlockChain" class="collapse ">
                        <ul class="nav">
                            <li class="menu-balance sub-menu">
                                <a href="{{ route('ea.balance') }}">
                                    <i class="lnr lnr-list"></i> <span>Balance List</span>
                                </a>
                            </li>
                            <li class="menu-fee sub-menu">
                                <a href="{{ route('ea.fee') }}">
                                    <i class="lnr lnr-cart"></i> <span>Voting Fee</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#subVoting" data-toggle="collapse" class="collapsed"><i class="lnr lnr-inbox"></i> <span>Voting</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                    <div id="subVoting" class="collapse ">
                        <ul class="nav">
                            <li class="menu-addVote sub-menu">
                                <a href="{{ route('ea.addVote') }}">
                                    <i class="lnr lnr-file-add"></i> <span>Add a vote</span>
                                </a>
                            </li>
                            <li class="menu-vote sub-menu">
                                <a href="{{ route('ea.vote') }}">
                                    <i class="lnr lnr-cloud"></i> <span>Voting List</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="menu-setting">
                    <a href="{{ route('ea.setting') }}">
                        <i class="lnr lnr-cog"></i> <span>Setting</span>
                    </a>
                </li>
                @endif

                @if( auth() ->user()-> role == 3)
                <li class="menu-vote">
                    <a href="{{ route('voter.vote') }}">
                        <i class="lnr lnr-inbox"></i> <span>View Result</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('auth.password.change') }}">
                        <i class="fa fa-star"></i> <span>Vote Now</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('auth.password.change') }}">
                        <i class="fa fa-th-list"></i> <span>View Result</span>
                    </a>
                </li>
                    @endif
                <li class="menu-change">
                    <a href="{{ route('auth.password.change') }}">
                        <i class="lnr lnr-lock"></i> <span>Change Password</span>
                    </a>
                </li>

                <li class="menu-singout">
                    <a href="{{ route('auth.signout') }}">
                        <i class="lnr lnr-exit"></i> <span>Sign Out</span>
                    </a>
                </li>
                @endif
            </ul>
        </nav>
    </div>
</div>
<!-- END LEFT SIDEBAR -->
