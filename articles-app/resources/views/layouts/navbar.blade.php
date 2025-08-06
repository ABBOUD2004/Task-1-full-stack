<nav class="navbar navbar-expand-lg navbar-dark bg-dark bg-opacity-75 sticky-top" style="backdrop-filter: blur(10px);">
  <div class="container">
    <!-- App brand/logo -->
    <a class="navbar-brand fw-bold" href="{{ route('home') }}">Articles App</a>

    <!-- Mobile menu toggle button -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navigation menu -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto align-items-lg-center">
        @auth
          <li class="nav-item">
            <a class="nav-link" href="{{ route('articles.index') }}">My Articles</a>
          </li>
          <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}" class="d-inline">
              @csrf
              <button class="btn btn-outline-light nav-link px-3 rounded-3" type="submit">Logout</button>
            </form>
          </li>
        @else
          <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
        @endauth
      </ul>
    </div>
  </div>
</nav>
