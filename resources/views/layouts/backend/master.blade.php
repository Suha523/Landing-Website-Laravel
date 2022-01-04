<!DOCTYPE html>
<html lang="en" dir={{App::getLocale()=='en' ? '': 'rtl'}}>
<head>
  @include('layouts.backend.head')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{asset('backend/assets/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60')}}">
  </div>

  <!-- Navbar -->
 @include('layouts.backend.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
 @include('layouts.backend.sidebar')

  <!-- Content Wrapper. Contains page content -->
 @yield('content')
  <!-- /.content-wrapper -->
   @include('layouts.backend.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@include('layouts.backend.scripts')
</body>
</html>
