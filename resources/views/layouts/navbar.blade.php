     <nav class="navbar" role="navigation" aria-label="main navigation">
          <div class="navbar-brand">
            <a class="navbar-item" href="/home">
              Light
            </a>

            <button class="button navbar-burger">
              <span></span>
              <span></span>
              <span></span>
            </button>
          </div>
          <div class="navbar-menu">
              <div class="navbar-start">
                  <a href="/dashboard" class="navbar-item">Dashboard</a>
                  <a href="/home" class="navbar-item">Transaction</a>
                  <a href="/types/create" class="navbar-item">Categories</a>
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