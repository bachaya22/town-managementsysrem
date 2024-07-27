 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link " href="{{ route('superadmin.home') }}">
      <i class="bi bi-grid" style="color: #CA9828"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->


  <li class="nav-item">
    <a class="nav-link collapsed" href="{{route('superadminUsers')}}">
        <i class="fa-solid fa-user" style="color: #CA9828"></i>
      <span>Users</span>
    </a>
  </li><!-- End Contact Page Nav -->
  {{--  <li class="nav-item">
    <a class="nav-link collapsed" href="{{ route('plot.create') }}">
      <i class="bi bi-person"></i>
      <span>Add Plot</span>
    </a>
  </li>  --}}
  <li class="nav-item">
    <a class="nav-link collapsed" href="{{ route('plot.show') }}">
        <i class="fa-solid fa-landmark" style="color: #CA9828"></i>
      <span>Plots</span>
    </a>
  </li><!-- End Profile Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="{{route('customer.show')}}">
        <i class="fa-solid fa-users" style="color: #CA9828"></i>
      <span>Customer</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="{{route('booking.show')}}">
        <i class="fa-solid fa-cart-shopping" style="color: #CA9828"></i>
      <span>Booking</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="{{route('ins.index')}}">
      <i class="bi bi-envelope" style="color: #CA9828"></i>
      <span>Installment</span>
    </a>
  </li>

</ul>

</aside><!-- End Sidebar-->
