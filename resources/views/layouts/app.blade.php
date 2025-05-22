<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="Aplikasi Inventory Barang" />
  <meta name="author" content="Andi16n" />

  <title>Aplikasi Inventory Barang</title>
  <link rel="icon" href="{{ asset('assets/img/favicon.png') }}" type="image/x-icon" />

  <!-- Fonts and Icons -->
  <script src="{{ asset('assets/js/plugin/webfont/webfont.min.js') }}"></script>
  <script>
    WebFont.load({
      google: { families: ["Lato:300,400,700,900"] },
      custom: {
        families: ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
        urls: ['{{ asset("assets/css/fonts.min.css") }}']
      },
      active: function() {
        sessionStorage.fonts = true;
      }
    });
  </script>

  <!-- Plugin CSS -->
  <link rel="stylesheet" href="{{ asset('assets/js/plugin/datepicker/css/bootstrap-datepicker.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/js/plugin/chosen/css/chosen.css') }}">

  <!-- Main CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/atlantis.min.css') }}">

  <!-- jQuery -->
  <script src="{{ asset('assets/js/core/jquery.3.2.1.min.js') }}"></script>
</head>
<body>
  <div class="wrapper">
    <!-- Header -->
    <div class="main-header">
      <div class="logo-header" data-background-color="dark2">
        <a href="#" class="logo">
          <span class="text-white">Inventory Barang</span>
        </a>
        <button class="navbar-toggler sidenav-toggler ml-auto" type="button">
          <span class="navbar-toggler-icon"><i class="icon-menu"></i></span>
        </button>
        <div class="nav-toggle">
          <button class="btn btn-toggle toggle-sidebar">
            <i class="icon-menu"></i>
          </button>
        </div>
      </div>

      <nav class="navbar navbar-header navbar-expand-lg" data-background-color="dark2">
        <div class="container-fluid">
          <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
            <li class="nav-item dropdown">
              <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"><span class="text-white">User</span></a>
            </li>
          </ul>
        </div>
      </nav>
    </div>

    <!-- Sidebar -->
    @include('partials.sidebar')

    <!-- Main Content -->
    <div class="main-panel">
      <div class="content">
        <div class="page-inner">
          @yield('content')
        </div>
      </div>
    </div>
  </div>

  <!-- Script -->
  <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js') }}"></script>
  <script src="{{ asset('assets/js/atlantis.min.js') }}"></script>
</body>
</html>
