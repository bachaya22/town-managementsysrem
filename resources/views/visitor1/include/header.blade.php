 <!-- header starts -->
 <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <div class="container-fluid bg-golden-btn">
          <a class="navbar-brand me-0" href="#"><img src="{{URL::asset('visitor_assets')}}/img/al-noor-logo.png"
              width="60px" height="55px" alt></a>
          <h3 class="pt-2 logo-title">Al-NOOR GARDEN</h3>
          <button class="navbar-toggler btn" type="button"
            data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse bg-golden-btn"
            id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 pe-4 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link text-light active" aria-current="page"
                  href="{{ route('visitor.home')}}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="{{ route('visitor1.plot') }}">Plots</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="{{ route('visitor1.discount') }}">Discount</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="{{ route('login') }}">Installment</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="{{ route('visitor1.contact') }}">Contact</a>
              </li>

            </ul>
            <a href="{{ route('login') }}" class="btn px-4">Login</a>
          </div>
        </div>
      </nav>
    </header>
    <!-- header end -->
