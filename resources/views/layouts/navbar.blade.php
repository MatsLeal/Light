     <nav class="navbar" role="navigation" aria-label="main navigation">
          <div class="navbar-brand">
            <a class="navbar-item" href="https://bulma.io">
              <img src="https://bulma.io/images/bulma-logo.png" alt="Bulma: a modern CSS framework based on Flexbox" width="112" height="28">
            </a>

            <button class="button navbar-burger">
              <span></span>
              <span></span>
              <span></span>
            </button>
          </div>
          <div class="navbar-menu">
              <div class="navbar-start">
                  <a href="/home" class="navbar-item">Dashboard</a>
                  <a href="/types/create" class="navbar-item">Categories</a>
                  <a class="navbar-item">Year</a>
              </div>

              <div class="navbar-end">
                        @guest
                            <a class="navbar-item" href="{{ route('login') }}">Login</a>
                            <a class="navbar-item" href="{{ route('register') }}">Register</a>
                        @else
                        <a class="navbar-item">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                                    
                                        <a class="navbar-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    
                            
                        @endguest
                  
              </div>
          </div>
        </nav>