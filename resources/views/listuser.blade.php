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
                                @if (Auth::check())
                                    <li class="user-dropdown">
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
    <ul class="main-search-list-defaultlist d-none">
      <li class="d-flex align-items-center"><a class="pb-25" href="#">
          <h6 class="text-primary mb-0">Files</h6></a></li>
      <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between w-100" href="#">
          <div class="d-flex">
            <div class="mr-50"><img src="{{ asset('typinglessontemplate/app-assets/images/icons/xls.png') }}" alt="png" height="32"></div>
            <div class="search-data">
              <p class="search-data-title mb-0">Two new item submitted</p><small class="text-muted">Marketing Manager</small>
            </div>
          </div><small class="search-data-size mr-50 text-muted">&apos;17kb</small></a></li>
      <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between w-100" href="#">
          <div class="d-flex">
            <div class="mr-50"><img src="{{ asset('typinglessontemplate/app-assets/images/icons/jpg.png') }}" alt="png" height="32"></div>
            <div class="search-data">
              <p class="search-data-title mb-0">52 JPG file Generated</p><small class="text-muted">FontEnd Developer</small>
            </div>
          </div><small class="search-data-size mr-50 text-muted">&apos;11kb</small></a></li>
      <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between w-100" href="#">
          <div class="d-flex">
            <div class="mr-50"><img src="{{ asset('typinglessontemplate/app-assets/images/icons/pdf.png') }}" alt="png" height="32"></div>
            <div class="search-data">
              <p class="search-data-title mb-0">25 PDF File Uploaded</p><small class="text-muted">Digital Marketing Manager</small>
            </div>
          </div><small class="search-data-size mr-50 text-muted">&apos;150kb</small></a></li>
      <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between w-100" href="#">
          <div class="d-flex">
            <div class="mr-50"><img src="{{ asset('typinglessontemplate/app-assets/images/icons/doc.png') }}" alt="png" height="32"></div>
            <div class="search-data">
              <p class="search-data-title mb-0">Anna_Strong.doc</p><small class="text-muted">Web Designer</small>
            </div>
          </div><small class="search-data-size mr-50 text-muted">&apos;256kb</small></a></li>
      <li class="d-flex align-items-center"><a class="pb-25" href="#">
          <h6 class="text-primary mb-0">Members</h6></a></li>
      <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
          <div class="d-flex align-items-center">
            <div class="avatar mr-50"><img src="{{ asset('typinglessontemplate/app-assets/images/portrait/small/avatar-s-8.jpg') }}" alt="png" height="32"></div>
            <div class="search-data">
              <p class="search-data-title mb-0">John Doe</p><small class="text-muted">UI designer</small>
            </div>
          </div></a></li>
      <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
          <div class="d-flex align-items-center">
            <div class="avatar mr-50"><img src="{{ asset('typinglessontemplate/app-assets/images/portrait/small/avatar-s-1.jpg') }}" alt="png" height="32"></div>
            <div class="search-data">
              <p class="search-data-title mb-0">Michal Clark</p><small class="text-muted">FontEnd Developer</small>
            </div>
          </div></a></li>
      <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
          <div class="d-flex align-items-center">
            <div class="avatar mr-50"><img src="{{ asset('typinglessontemplate/app-assets/images/portrait/small/avatar-s-14.jpg') }}" alt="png" height="32"></div>
            <div class="search-data">
              <p class="search-data-title mb-0">Milena Gibson</p><small class="text-muted">Digital Marketing Manager</small>
            </div>
          </div></a></li>
      <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
          <div class="d-flex align-items-center">
            <div class="avatar mr-50"><img src="{{ asset('typinglessontemplate/app-assets/images/portrait/small/avatar-s-6.jpg') }}" alt="png" height="32"></div>
            <div class="search-data">
              <p class="search-data-title mb-0">Anna Strong</p><small class="text-muted">Web Designer</small>
            </div>
          </div></a></li>
    </ul>
    <ul class="main-search-list-defaultlist-other-list d-none">
      <li class="auto-suggestion d-flex align-items-center justify-content-between cursor-pointer"><a class="d-flex align-items-center justify-content-between w-100 py-50">
          <div class="d-flex justify-content-start"><span class="mr-75 feather icon-alert-circle"></span><span>No results found.</span></div></a></li>
    </ul>
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mr-auto"><a class="navbar-brand" href="{{ asset('typinglessontemplate/html/ltr/vertical-menu-template-dark/index.html') }}">
              <div class="brand-logo"></div>
              <h2 class="brand-text mb-0">Vuexy</h2></a></li>
          <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
        </ul>
      </div>
      <div class="shadow-bottom"></div>
      <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
          <li class=" nav-item"><a href="index.html"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span><span class="badge badge badge-warning badge-pill float-right mr-2">2</span></a>
            <ul class="menu-content">
              <li><a href="dashboard-analytics.html"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Analytics">Analytics</span></a>
              </li>
              <li><a href="dashboard-ecommerce.html"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="eCommerce">eCommerce</span></a>
              </li>
            </ul>
          </li>
          <li class=" navigation-header"><span>Apps</span>
          </li>
          <li class=" nav-item"><a href="#"><i class="feather icon-user"></i><span class="menu-title" data-i18n="User">User</span></a>
            <ul class="menu-content">
              <li class="active"><a href="app-user-list.html"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List">List</span></a>
              </li>
              <li><a href="app-user-view.html"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="View">View</span></a>
              </li>
              <li><a href="app-user-edit.html"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Edit">Edit</span></a>
              </li>
            </ul>
          </li>
          <li class=" nav-item"><a href="#"><i class="feather icon-credit-card"></i><span class="menu-title" data-i18n="Card">Text</span></a>
            <ul class="menu-content">
              <li><a href="card-basic.html"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Basic">Create</span></a>
              </li>
              <li><a href="card-advance.html"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Advance">Read</span></a>
              </li>
            </ul>
          </li>
          <li class=" navigation-header"><span>pages</span>
          </li>
          <li class=" nav-item"><a href="page-user-profile.html"><i class="feather icon-user"></i><span class="menu-title" data-i18n="Profile">Profile</span></a>
          </li>
          <li class=" nav-item"><a href="page-account-settings.html"><i class="feather icon-settings"></i><span class="menu-title" data-i18n="Account Settings">Account Settings</span></a>
          </li>
          <li class=" navigation-header"><span>Others</span>
          </li>
          <li class=" nav-item"><a href="#"><i class="feather icon-menu"></i><span class="menu-title" data-i18n="Menu Levels">Menu Levels</span></a>
            <ul class="menu-content">
              <li><a href="#"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Second Level">Second Level</span></a>
              </li>
              <li><a href="#"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Second Level">Second Level</span></a>
                <ul class="menu-content">
                  <li><a href="#"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Third Level">Third Level</span></a>
                  </li>
                  <li><a href="#"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Third Level">Third Level</span></a>
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
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Filters</h4>
      <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
      <div class="heading-elements">
        <ul class="list-inline mb-0">
          <li><a data-action="collapse"><i class="feather icon-chevron-down"></i></a></li>
          <li><a data-action=""><i class="feather icon-rotate-cw users-data-filter"></i></a></li>
          <li><a data-action="close"><i class="feather icon-x"></i></a></li>
        </ul>
      </div>
    </div>
    <div class="card-content collapse show">
      <div class="card-body">
        <div class="users-list-filter">
          <form>
            <div class="row">
              <div class="col-12 col-sm-6 col-lg-3">
                <label for="users-list-role">Role</label>
                <fieldset class="form-group">
                  <select class="form-control" id="users-list-role">
                    <option value="">All</option>
                    <option value="user">User</option>
                    <option value="staff">Staff</option>
                  </select>
                </fieldset>
              </div>
              <div class="col-12 col-sm-6 col-lg-3">
                <label for="users-list-status">Status</label>
                <fieldset class="form-group">
                  <select class="form-control" id="users-list-status">
                    <option value="">All</option>
                    <option value="Active">Active</option>
                    <option value="Blocked">Blocked</option>
                    <option value="deactivated">Deactivated</option>
                  </select>
                </fieldset>
              </div>
              <div class="col-12 col-sm-6 col-lg-3">
                <label for="users-list-verified">Verified</label>
                <fieldset class="form-group">
                  <select class="form-control" id="users-list-verified">
                    <option value="">All</option>
                    <option value="true">Yes</option>
                    <option value="false">No</option>
                  </select>
                </fieldset>
              </div>
              <div class="col-12 col-sm-6 col-lg-3">
                <label for="users-list-department">Department</label>
                <fieldset class="form-group">
                  <select class="form-control" id="users-list-department">
                    <option value="">All</option>
                    <option value="Sales">Sales</option>
                    <option value="Devlopment">Devlopment</option>
                    <option value="Management">Management</option>
                  </select>
                </fieldset>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- users filter end -->
  <!-- Ag Grid users list section start -->
  <div class="container">
    <div class="card">
        <div class="card-header">
            <h4>User List</h4>
        </div>
        <div class="card-body">
            <div class="ag-grid-btns d-flex justify-content-between flex-wrap mb-1">
                <div class="dropdown sort-dropdown mb-1 mb-sm-0">
                    <button class="btn btn-white filter-btn dropdown-toggle border text-dark" type="button"
                        id="dropdownMenuButton6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        1 - 20 of {{ count($users) }}
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton6">
                        <a class="dropdown-item" href="#" onclick="setPageSize(20)">20</a>
                        <a class="dropdown-item" href="#" onclick="setPageSize(50)">50</a>
                    </div>
                </div>
                <div class="ag-btns d-flex flex-wrap">
                    <input type="text" class="ag-grid-filter form-control w-50 mr-1 mb-1 mb-sm-0" id="filter-text-box"
                        placeholder="Search...." oninput="onFilterChanged()" />
                    <div class="action-btns">
                        <div class="btn-dropdown">
                            <div class="btn-group dropdown actions-dropodown">
                                <button type="button" class="btn btn-white px-2 py-75 dropdown-toggle waves-effect waves-light"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Actions
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#" onclick="deleteSelected()"><i class="feather icon-trash-2"></i> Delete</a>
                                    <a class="dropdown-item" href="#"><i class="feather icon-clipboard"></i> Archive</a>
                                    <a class="dropdown-item" href="#" onclick="printSelected()"><i class="feather icon-printer"></i> Print</a>
                                    <a class="dropdown-item" href="#" onclick="downloadCSV()"><i class="feather icon-download"></i> CSV</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="myGrid" class="aggrid ag-theme-material"></div>
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
    <div class="customizer d-none d-md-block"><a class="customizer-close" href="#"><i class="feather icon-x"></i></a><a class="customizer-toggle" href="#"><i class="feather icon-settings fa fa-spin fa-fw white"></i></a><div class="customizer-content p-2">
  <h4 class="text-uppercase mb-0">Theme Customizer</h4>
  <small>Customize & Preview in Real Time</small>
  <hr>
  <!-- Menu Colors Starts -->
  <div id="customizer-theme-colors">
    <h5>Menu Colors</h5>
    <ul class="list-inline unstyled-list">
      <li class="color-box bg-primary selected" data-color="theme-primary"></li>
      <li class="color-box bg-success" data-color="theme-success"></li>
      <li class="color-box bg-danger" data-color="theme-danger"></li>
      <li class="color-box bg-warning" data-color="theme-warning"></li>
      <li class="color-box bg-dark" data-color="theme-dark"></li>
      <li class="color-box bg-info" data-color="theme-info"></li>
    </ul>
  </div>
  <!-- Menu Colors Ends -->
  <hr>
  <!-- Theme options starts -->
  <h5 class="mt-1">Theme Layout</h5>
  <div class="theme-layouts">
    <div class="d-flex justify-content-start">
      <div class="mx-50 lidht">
        <fieldset>
          <div class="vs-radio-con vs-radio-primary">
            <input type="radio" name="layoutOptions" value="false" class="layout-name" data-layout="" checked>
            <span class="vs-radio">
              <span class="vs-radio--border"></span>
              <span class="vs-radio--circle"></span>
            </span>
            <span class="">Light</span>
          </div>
        </fieldset>
      </div>
      <div class="mx-50 dark">
        <fieldset>
          <div class="vs-radio-con vs-radio-primary">
            <input type="radio" name="layoutOptions" value="false" class="layout-name" data-layout="dark-layout">
            <span class="vs-radio">
              <span class="vs-radio--border"></span>
              <span class="vs-radio--circle"></span>
            </span>
            <span class="">Dark</span>
          </div>
        </fieldset>
      </div>
      <div class="mx-50 semi-dark">
        <fieldset>
          <div class="vs-radio-con vs-radio-primary">
            <input type="radio" name="layoutOptions" value="false" class="layout-name" data-layout="semi-dark-layout">
            <span class="vs-radio">
              <span class="vs-radio--border"></span>
              <span class="vs-radio--circle"></span>
            </span>
            <span class="">Semi Dark</span>
          </div>
        </fieldset>
      </div>
    </div>
  </div>
  <!-- Theme options starts -->
  <hr>

  <!-- Collapse sidebar switch starts -->
  <div class="collapse-sidebar d-flex justify-content-between">
    <div class="collapse-option-title">
      <h5 class="pt-25 collapse_sidebar">Collapse Sidebar</h5>
      <h5 class="pt-25 collapse_menu d-none">Collapse Menu</h5>
    </div>
    <div class="collapse-option-switch">
      <div class="custom-control custom-switch">
        <input type="checkbox" class="custom-control-input" id="collapse-sidebar-switch">
        <label class="custom-control-label" for="collapse-sidebar-switch"></label>
      </div>
    </div>
  </div>
  <!-- Collapse sidebar switch Ends -->
  <hr>

  <!-- Navbar colors starts -->
  <div id="customizer-navbar-colors">
    <h5>Navbar Colors</h5>
    <ul class="list-inline unstyled-list">
      <li class="color-box bg-white border selected" data-navbar-default=""></li>
      <li class="color-box bg-primary" data-navbar-color="bg-primary"></li>
      <li class="color-box bg-success" data-navbar-color="bg-success"></li>
      <li class="color-box bg-danger" data-navbar-color="bg-danger"></li>
      <li class="color-box bg-info" data-navbar-color="bg-info"></li>
      <li class="color-box bg-warning" data-navbar-color="bg-warning"></li>
      <li class="color-box bg-dark" data-navbar-color="bg-dark"></li>
    </ul>
    <hr>
  </div>
  <!-- Navbar colors starts -->
  <!-- Navbar Type Starts -->
  <div id="navbar-type">
    <h5 class="navbar_type">Navbar Type</h5>
    <h5 class="menu_type d-none">Menu Type</h5>
    <div class="navbar-type d-flex justify-content-start">
      <div class="mx-50">
        <fieldset>
          <div class="vs-radio-con vs-radio-primary">
            <input type="radio" name="navbarType" value="false" id="navbar-hidden">
            <span class="vs-radio">
              <span class="vs-radio--border"></span>
              <span class="vs-radio--circle"></span>
            </span>
            <span class="">Hidden</span>
          </div>
        </fieldset>
      </div>
      <div class="mx-50">
        <fieldset>
          <div class="vs-radio-con vs-radio-primary">
            <input type="radio" name="navbarType" value="false" id="navbar-static">
            <span class="vs-radio">
              <span class="vs-radio--border"></span>
              <span class="vs-radio--circle"></span>
            </span>
            <span class="">Static</span>
          </div>
        </fieldset>
      </div>
      <div class="mx-50">
        <fieldset>
          <div class="vs-radio-con vs-radio-primary">
            <input type="radio" name="navbarType" value="false" id="navbar-sticky">
            <span class="vs-radio">
              <span class="vs-radio--border"></span>
              <span class="vs-radio--circle"></span>
            </span>
            <span class="">Sticky</span>
          </div>
        </fieldset>
      </div>
      <div class="mx-50">
        <fieldset>
          <div class="vs-radio-con vs-radio-primary">
            <input type="radio" name="navbarType" value="false" id="navbar-floating" checked>
            <span class="vs-radio">
              <span class="vs-radio--border"></span>
              <span class="vs-radio--circle"></span>
            </span>
            <span class="">Floating</span>
          </div>
        </fieldset>
      </div>
    </div>
    <hr>
  </div>
  <!-- Navbar Type Starts -->

  <!-- Footer Type Starts -->
  <h5>Footer Type</h5>
  <div class="footer-type d-flex justify-content-start">
    <div class="mx-50">
      <fieldset>
        <div class="vs-radio-con vs-radio-primary">
          <input type="radio" name="footerType" value="false" id="footer-hidden">
          <span class="vs-radio">
            <span class="vs-radio--border"></span>
            <span class="vs-radio--circle"></span>
          </span>
          <span class="">Hidden</span>
        </div>
      </fieldset>
    </div>
    <div class="mx-50">
      <fieldset>
        <div class="vs-radio-con vs-radio-primary">
          <input type="radio" name="footerType" value="false" id="footer-static" checked>
          <span class="vs-radio">
            <span class="vs-radio--border"></span>
            <span class="vs-radio--circle"></span>
          </span>
          <span class="">Static</span>
        </div>
      </fieldset>
    </div>
    <div class="mx-50">
      <fieldset>
        <div class="vs-radio-con vs-radio-primary">
          <input type="radio" name="footerType" value="false" id="footer-sticky">
          <span class="vs-radio">
            <span class="vs-radio--border"></span>
            <span class="vs-radio--circle"></span>
          </span>
          <span class="">Sticky</span>
        </div>
      </fieldset>
    </div>
  </div>
  <!-- Footer Type Ends -->
  <hr>

  <!-- Hide Scroll To Top Starts-->
  <div class="hide-scroll-to-top d-flex justify-content-between py-25">
    <div class="hide-scroll-title">
      <h5 class="pt-25">Hide Scroll To Top</h5>
    </div>
    <div class="hide-scroll-top-switch">
      <div class="custom-control custom-switch">
        <input type="checkbox" class="custom-control-input" id="hide-scroll-top-switch">
        <label class="custom-control-label" for="hide-scroll-top-switch"></label>
      </div>
    </div>
  </div>
  <!-- Hide Scroll To Top Ends-->
</div>

    </div>
    <!-- End: Customizer-->

    </div>
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

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
    <script src="{{ asset('') }}typinglessontemplate/app-assets/js/scripts/pages/app-user.min.js"></script>
    <!-- END: Page JS-->

    <!--Script User-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- ag-Grid JS -->
    <script src="https://unpkg.com/ag-grid-community/dist/ag-grid-community.min.noStyle.js"></script>
    <script>
        // Mendapatkan data pengguna dari PHP
        var users = @json($users);

        var rowData = users.map(function(user) {
            return {
                id: user.id,
                name: user.name,
                email: user.email,
                created_at: user.created_at
            };
        });

        var columnDefs = [
            { headerName: "ID", field: "id", sortable: true, filter: true },
            { headerName: "Name", field: "name", sortable: true, filter: true },
            { headerName: "Email", field: "email", sortable: true, filter: true },
            { headerName: "Created At", field: "created_at", sortable: true, filter: true }
        ];

        var gridOptions = {
            columnDefs: columnDefs,
            rowData: rowData,
            pagination: true,
            paginationPageSize: 20,
            domLayout: 'autoHeight',
            onGridReady: function () {
                gridOptions.api.sizeColumnsToFit();
            },
            rowSelection: 'multiple' // Enables multiple row selection
        };

        document.addEventListener('DOMContentLoaded', function () {
            var eGridDiv = document.querySelector('#myGrid');
            new agGrid.Grid(eGridDiv, gridOptions);
        });

        function onFilterChanged() {
            var filterText = document.getElementById('filter-text-box').value;
            gridOptions.api.setQuickFilter(filterText);
        }

        function setPageSize(pageSize) {
            gridOptions.api.paginationSetPageSize(pageSize);
        }

        function deleteSelected() {
            var selectedRows = gridOptions.api.getSelectedRows();
            if (selectedRows.length > 0 && confirm('Are you sure you want to delete the selected users?')) {
                // Implementasi penghapusan pengguna yang dipilih
                console.log('Deleting selected rows:', selectedRows);
                // Logic untuk menghapus pengguna dari server dapat ditambahkan di sini
            }
        }

        function printSelected() {
            var selectedRows = gridOptions.api.getSelectedRows();
            if (selectedRows.length > 0) {
                // Implementasi pencetakan pengguna yang dipilih
                console.log('Printing selected rows:', selectedRows);
                // Logic untuk mencetak pengguna dapat ditambahkan di sini
            }
        }

        function downloadCSV() {
            gridOptions.api.exportDataAsCsv();
        }
    </script>

  </body>
  <!-- END: Body-->
</html>
