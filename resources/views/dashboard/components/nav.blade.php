  <nav class="navbar fixed-top px-0 shadow-sm  bg-light">
      <div class="container-fluid">

          <a class="navbar-brand" href="#">
              <span class="icon-nav m-0 h5" onclick="MenuBarClickHandler()">
                  <img class="nav-logo-sm mx-2" src="{{ asset('admin') }}/images/menu.svg" alt="logo" />
              </span>
              <img class="nav-logo  mx-2" src="{{ asset('admin') }}/images/logod.png" />
          </a>

          <div class="float-right h-auto d-flex">
              <div class="user-dropdown">
                  <img class="icon-nav-img" src="{{ asset('admin') }}/images/user.webp" alt="" />
                  <div class="user-dropdown-content">
                      <div class="mt-4 text-center">
                          <img class="icon-nav-img" src="{{ asset('admin') }}/images/user.webp" alt="" />
                          <h6 class="text-black">
                              <p class="m-0 p-0">Welcome</p>
                              <p>{{auth()->user()->name}}</p>
                              <p>{{auth()->user()->number}}</p>
                          </h6>
                          <hr class="user-dropdown-divider  p-0" />
                      </div>
                      <a href="{{route('profile.user')}}" class="side-bar-item">
                          <span class="side-bar-item-caption">Profile</span>
                      </a>
                      <a href="{{ route('logout') }}" class="side-bar-item"
                          onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                          <span class="side-bar-item-caption">Logout</span>
                      </a>


                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </nav>
