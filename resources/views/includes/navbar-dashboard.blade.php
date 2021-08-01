<nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top" data-aos="fade-down">
            <div class="container-fluid">
              <button class="btn btn-secondary d-md-none mr-auto mr-2" id="menu-toggle">&laquo; Menu</button>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- desktop menu -->
                @auth
                @php
                    $name = Auth::user()->name;
                    $photo = Auth::user()->photo_profile;
                @endphp
                <ul class="navbar-nav d-none d-lg-flex ml-auto">
                  <li class="nav-item dropdown">
                    <a href="#" class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown">
                      <img
                        src="/storage/{{$photo}}"
                        alt="avatar-user"
                        class="profile-picture mr-2"
                      />
                      Halo, {{strtok($name, " ")}}
                      <i class="fas fa-angle-down ml-2"></i>
                    </a>
                    <div class="dropdown-menu">
                      <a href="{{route('home')}}" class="dropdown-item">Home</a>
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
