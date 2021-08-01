<nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top" data-aos="fade-down">
      <div class="container">
        <a href="{{route('home')}}" class="navbar-brand">
          <img src="/images/logo.svg" alt="Logo" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a href="{{route('home')}}" class="nav-link {{request()->is('/') ? 'active' : ''}}">Home</a>
            </li>
            <li class="nav-item">
              <a href="{{route('categories')}}" class="nav-link {{request()->is('categories*') ? 'active' : ''}}">Categories</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">Reward</a>
            </li>
            @guest
                <li class="nav-item">
                    <a href="{{route('register')}}" class="nav-link">Register</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('login')}}" class="btn btn-success nav-link px-4 text-white">Login</a>
                </li>
            @endguest

          </ul>

          @auth
            @php
                $name = Auth::user()->name;
                $photo = Auth::user()->photo_profile;
            @endphp
              <!-- desktop menu -->
                <ul class="navbar-nav d-none d-lg-flex">
                  <li class="nav-item dropdown">
                    <a href="#" class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown">
                        <div class="profile-picture">
                            <img
                            src="/storage/{{$photo}}"
                            alt="avatar-user"
                            class="profile-picture mr-2"
                            />
                        </div>
                      <i class="fas fa-angle-down"></i>
                    </a>
                    <div class="dropdown-menu border-0 shadow">
                        <p class="dropdown-item disabled"> Halo, {{strtok($name, " ")}}</p>
                        <div class="dropdown-divider"></div>
                        <a href="{{route('dashboard')}}" class="dropdown-item">Dashboard</a>
                        <a href="{{route('dashboard-account-setting')}}" class="dropdown-item">Setting</a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="dropdown-item">
                            Log Out
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('cart')}}" class="nav-link d-inline-block mt-2">
                        @php
                            $carts = \App\Models\Cart::where('users_id', Auth::user()->id)->count();
                        @endphp
                        @if ($carts>0)
                            <img src="/images/navbar-icon-cart-filled.svg" alt="" />
                            <div class="cart-badge">{{$carts}}</div>
                        @else
                            <img src="/images/navbar-icon-cart-empty.svg" alt="" />
                        @endif

                    </a>
                  </li>
                </ul>

                <!-- mobile menu -->
                <ul class="navbar-nav d-block d-lg-none">
                  <li class="nav-item">
                    <a href="#" class="nav-link"> Hi, Bagus </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link"> Cart </a>
                  </li>
                </ul>
          @endauth
        </div>
      </div>
    </nav>
