 <!--================ Start Header Area =================-->
 <header class="header-area">
    <div class="container">
        <div class="header-wrap">
            <div class="header-top d-flex justify-content-between align-items-lg-center navbar-expand-lg">
                <div class="col menu-left">
                    <a href="index.html"><img class="img-thumbnail logoNav float-left"  src="{{asset('assets/img/sampleLogo.jpeg')}}" alt=""/></a>
                </div>
                <div class="col-11 text-lg-center mt-2 mt-lg-0">
                    <a href="index.html"><img class="img-thumbnail logoNavMobile mb-2"  src="{{asset('assets/img/sampleLogo.jpeg')}}" alt=""/></a>
                <nav class="col navbar navbar-expand-lg justify-content-end">
                    <!-- Toggler/collapsibe Button -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" style="color: #fff" data-target="#collapsibleNavbar">
                        <span class="lnr lnr-menu"></span>
                    </button>
        
                    <!-- Navbar links -->
                    {{-- @if (Auth::user()->regStatus == 1) --}}
                        
                        <div class="collapse navbar-collapse menu-right" id="collapsibleNavbar">
                            <ul class="navbar-nav justify-content-left w-100">
                                <li class="nav-item">
                                    <a class="nav-link @yield('articles-status')" href="{{url('/articles')}}">Articles</a>
                                    </li>
                                    
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle @yield('tool-status')" href="#" id="navbardrop" data-toggle="dropdown"> Tools </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Coming Soon</a>
                                    </div>
                                </li>
                                
                                <li class="nav-item">
                                    <a class="nav-link @yield('reviews-status')" href="{{url('/reviews')}}">Team Reveal</a>
                                </li>
                                @auth
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle @yield('profile-status')" href="#" id="navbardrop" data-toggle="dropdown"> {{Auth::user()->name}} </a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{url('profile')}}">My Profile</a>
                                            <a class="dropdown-item" href="{{url('fixtures')}}">Fixtures</a>
                                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                Log-out
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                            </a>
                                        </div>
                                    </li>
                                @endauth
                                
                                @guest
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown"> Login/Join </a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{url('/login')}}">Login</a>
                                            <a class="dropdown-item" href="{{url('/register')}}">Join</a>
                                        </div>
                                    </li>
                                @endguest
                                
                            </ul>
                        </div>
                        {{-- @endif --}}
                    
                </nav>
            </div>
        </div>
        
</div>

</header>


<!--================ End Header Area =================-->