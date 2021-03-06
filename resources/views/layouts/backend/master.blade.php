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
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">@yield('header')</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">

            @yield('content')

        </div>
        <!-- /.row -->
        <!-- Main row -->

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

  </div>

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
@yield('js')
</body>
</html>
