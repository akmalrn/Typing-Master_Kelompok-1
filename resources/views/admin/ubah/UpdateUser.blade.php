<!DOCTYPE html>
<!--
Template Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
Author: PixInvent
Website: http://www.pixinvent.com/
Contact: hello@pixinvent.com
Follow: www.twitter.com/pixinvents
Like: www.facebook.com/pixinvents
Purchase: https://1.envato.market/vuexy_admin
Renew Support: https://1.envato.market/vuexy_admin
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.

-->
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>User List - Vuexy - Bootstrap HTML admin template</title>
    <link rel="apple-touch-icon" href="{{ asset('typinglessontemplate/app-assets/images/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('typinglessontemplate/app-assets/images/ico/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('typinglessontemplate/app-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('typinglessontemplate/app-assets/vendors/css/tables/ag-grid/ag-grid.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('typinglessontemplate/app-assets/vendors/css/tables/ag-grid/ag-theme-material.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('typinglessontemplate/app-assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('typinglessontemplate/app-assets/css/bootstrap-extended.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('typinglessontemplate/app-assets/css/colors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('typinglessontemplate/app-assets/css/components.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('typinglessontemplate/app-assets/css/themes/dark-layout.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('typinglessontemplate/app-assets/css/themes/semi-dark-layout.min.css') }}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('typinglessontemplate/app-assets/css/core/menu/menu-types/vertical-menu.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('typinglessontemplate/app-assets/css/core/colors/palette-gradient.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('typinglessontemplate/app-assets/css/pages/app-user.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('typinglessontemplate/app-assets/css/pages/aggrid.min.css') }}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('typinglessontemplate/assets/css/style.css') }}">
    <!-- END: Custom CSS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        .user-dropdown {
        position: relative;
        display: inline-block;
    }

    .username {
        cursor: pointer;
        color: white; /* Warna teks */
        font-weight: bold;
    }
    .arrow-down {
        margin-left: 5px; /* Spasi antara nama dan panah */
        border: solid white;
        border-width: 0 2px 2px 0;
        display: inline-block;
        padding: 3px;
        transform: rotate(45deg);
        -webkit-transform: rotate(45deg);
    }

    .dropdown-content {
        display: none; /* Sembunyikan dropdown secara default */
        position: absolute;
        background-color: #f1f1f1;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {
        background-color: #ddd;
    }
    /* Tampilkan dropdown saat di-hover */

    .user-dropdown:hover .dropdown-content {
        display: block;
    }
    </style>

  </head>
  <!-- END: Head-->

  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern dark-layout 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="dark-layout">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-dark navbar-shadow">
      <div class="navbar-wrapper">
        <div class="navbar-container content">
          <div class="navbar-collapse" id="navbar-mobile">
            <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
              <ul class="nav navbar-nav">
                <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon feather icon-menu"></i></a></li>
            </div>
              </li>
              <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-dark navbar-shadow">
                <div class="navbar-wrapper">
                    @if (Auth::check())
                    <li class="user-dropdown">
                        <i class="fa-solid fa-user"></i>
                            <span class="username">{{ Auth::user()->name }}</span>
                            <span class="arrow-down"></span> <!-- Panah ke bawah -->
                        <div class="dropdown-content">
                            @if (Auth::user()->role == 'admin')
                                <form id="logout-form-admin" action="{{ route('LogoutAdmin') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                <a href="#" onclick="event.preventDefault(); if (confirm('Apakah Anda yakin ingin logout?')) { document.getElementById('logout-form-admin').submit(); }">
                                    Logout
                                </a>
                            @endif
                        </div>
                    </li>
                @endif
                    <div class="navbar-container content">
                        <div class="navbar-collapse" id="navbar-mobile">
                            <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                                <ul class="nav navbar-nav">
                                    <li class="nav-item mobile-menu d-xl-none mr-auto">
                                        <a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#">
                                            <i class="ficon feather icon-menu"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <ul>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>

            </ul>
          </div>
        </div>
      </div>
    </nav>

    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mr-auto"><div class="navbar-brand">
              <div class="brand-logo"></div>
              <h2 class="brand-text mb-0">Admin</h2></div></li>
          <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
        </ul>
      </div>
      <div class="shadow-bottom"></div>
      <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
          <li class=" navigation-header"><span>Apps</span>
          </li>
          <li class=" nav-item"><a href="#"><i class="feather icon-user"></i><span class="menu-title" data-i18n="User">User</span></a>
            <ul class="menu-content">
              <li><a href="{{ route('HalamanAdmin') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="View">View</span></a>
              </li>
            </ul>
          </li>
          <li class=" nav-item"><a href="#"><i class="feather icon-credit-card"></i><span class="menu-title" data-i18n="Card">Text</span></a>
            <ul class="menu-content">
              <li><a href="{{ route('HalamanCreateText') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Basic">Create</span></a>
              </li>
              <li><a href="{{ route('HalamanReadText') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Advance">View</span></a>
              </li>
            </ul>
          </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><!-- users list start -->
<section class="users-list-wrapper">
  <!-- users filter start -->
  <!-- users filter end -->
  <!-- Ag Grid users list section start -->
  <div class="container">
    <div class="card">
        <div class="card-header">
            <h4>Update User</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form action="{{ route('UpdateUsers', $users->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Nama :</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $users->name) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email :</label>
                        <textarea class="form-control" id="email" name="email" rows="5" required>{{ old('email', $users->email) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="password">Password :</label>
                        <input type="number" class="form-control" id="password" name="password" value="{{ old('password', $users->password) }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Update Lesson</button>
                </form>
            </div>
        </div>
    </div>
</div>
  <!-- Ag Grid users list section end -->
</section>
<!-- users list ends -->

        </div>
      </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Customizer-->



    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
      <p class="clearfix blue-grey lighten-2 mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">Halaman Admin Kelompok-1  &copy; 2024<a class="text-bold-800 grey darken-2" href="{{ route('HalamanDev') }}" target="_blank">Kelompok 1,</a>Sangat Mudah</span><span class=  "float-md-right d-none d-md-block">Hand-crafted & Made with<i class="feather icon-heart pink"></i></span>
        <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="feather icon-arrow-up"></i></button>
      </p>
    </footer>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('typinglessontemplate/app-assets/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('typinglessontemplate/app-assets/vendors/js/tables/ag-grid/ag-grid-community.min.noStyle.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <script src="{{ asset('typinglessontemplate/app-assets/js/core/app-menu.min.js') }}"></script>
    <script src="{{ asset('typinglessontemplate/app-assets/js/core/app.min.js') }}"></script>
    <script src="{{ asset('typinglessontemplate/app-assets/js/scripts/components.min.js') }}"></script>
    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('typinglessontemplate/app-assets/js/scripts/customizer.min.js') }}"></script>
    <script src="{{ asset('typinglessontemplate/app-assets/js/scripts/footer.min.js') }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('typinglessontemplate/app-assets/js/scripts/pages/app-user.min.js') }}"></script>
    <!-- END: Page JS-->

    <!--Script User-->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- ag-Grid JS -->
    <script src="https://unpkg.com/ag-grid-community/dist/ag-grid-community.min.noStyle.js"></script>


  </body>
  <!-- END: Body-->
</html>
