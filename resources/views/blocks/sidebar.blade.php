<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3">
  <nav class="navbar bg-secondary navbar-dark">
    <a href="{{route('admin')}}" class="navbar-brand mx-4 mb-3">
      <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>inTour Panel</h3>
    </a>
    {{-- <div class="d-flex align-items-center ms-4 mb-4">
      <div class="position-relative">
        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
      </div>
      <div class="ms-3">
        <h6 class="mb-0">Jhon Doe</h6>
        <span>Admin</span>
      </div>
    </div> --}}
    <div class="navbar-nav w-100">
      <a href="{{route('admin')}}" class="nav-item nav-link <?=(Request::segment(1) == 'admin') ? "active" : ""?>"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
      <a href="{{route('admin_blog')}}" class="nav-item nav-link <?=(Request::segment(1) == 'admin_blog') ? "active" : ""?>"><i class="fa fa-keyboard me-2"></i>Blog</a>
      <a href="{{route('admin_tour')}}" class="nav-item nav-link <?=(Request::segment(1) == 'admin_tour') ? "active" : ""?>"><i class="fa fa-th me-2"></i>Tour</a>
      <a href="{{route('admin_gallery')}}" class="nav-item nav-link <?=(Request::segment(1) == 'admin_gallery') ? "active" : ""?>"><i class="fa fa-table me-2"></i>Gallery</a>
      <a href="{{route('admin_home_wallpaper')}}" class="nav-item nav-link <?=(Request::segment(1) == 'admin_home_wallpaper') ? "active" : ""?>"><i class="fa fa-table me-2"></i>Home Wall</a>
      <a href="{{route('admin_cars')}}" class="nav-item nav-link <?=(Request::segment(1) == 'admin_cars') ? "active" : ""?>"> <i class="me-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-car-front-fill" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679c.033.161.049.325.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.807.807 0 0 0 .381-.404l.792-1.848ZM3 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2Zm10 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2ZM6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2H6ZM2.906 5.189l.956-1.913A.5.5 0 0 1 4.309 3h7.382a.5.5 0 0 1 .447.276l.956 1.913a.51.51 0 0 1-.497.731c-.91-.073-3.35-.17-4.597-.17-1.247 0-3.688.097-4.597.17a.51.51 0 0 1-.497-.731Z"/>
      </svg></i>Cars</a>
      @if (@$_SESSION['admin'] -> level >= 5)
      <a href="{{route('admin_creator')}}" class="nav-item nav-link <?=(Request::segment(1) == 'admin_creator') ? "active" : ""?>"><i class="fa fa-solid fa-address-card me-2"></i>Create Admin</a>
      @endif
    </div>
  </nav>
</div>
<!-- Sidebar End -->