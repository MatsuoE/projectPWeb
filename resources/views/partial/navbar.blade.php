<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ ($active == "Home") ? 'active' : '' }}" href="/home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($active == "Products") ? 'active' : '' }}" href="/product">Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($active == "About Us") ? 'active' : '' }}" href="/aboutus">About Us</a>
          </li>
        </ul>
        
        <ul class="navbar-nav ms-auto">
        @auth
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Welcome, {{ auth()->user()->name }}
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            @if ( auth()->user()->isAdmin === 1 )
            <li>
              <a class="dropdown-item" href="/dashboard">
                <i class="bi bi-layout-text-window-reverse"></i> Dashboard
              </a>
            </li>
            @else
            <li>
              <a class="dropdown-item" href="/dashboardmember/cart">
                <i class="bi bi-cart3"></i> My Cart
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="/dashboardmember">
                <i class="bi bi-layout-text-window-reverse"></i> Dashboard
              </a>
            </li>
            @endif
            <li><hr class="dropdown-divider"></li>
            <li>
              <form action="/logout" method="post">
                @csrf
                <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-in-right"></i> Logout</button>
              </form>
            </li>
          </ul>
        </li>

        @else
          <li class="nav-item">
            <a class="nav-link {{ ($active == "Login") ? 'active' : '' }}" href="/login">Login</a>
          </li>
          @endauth
        </ul>
      </div>
    </div>
  </nav>