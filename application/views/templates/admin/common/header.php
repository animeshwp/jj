<!doctype html>
<html lang="en">
  <!--begin::Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Dashboard</title>
    <!--begin::Primary Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="title" content="Dashboard" />
    <meta name="author" content="animesh" />
    
     
    <!--end::Primary Meta Tags-->
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--end::Fonts-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css" integrity="sha256-tZHrRjVqNSRyWg2wbppGnT833E/Ys0DHWGwT04GiqQg=" crossorigin="anonymous" />
    <!--end::Third Party Plugin(OverlayScrollbars)-->
    <!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" integrity="sha256-9kPW/n5nn53j4WMRYAxe9c1rCY96Oogo/MKSVdKzPmI=" crossorigin="anonymous" />

    <link href="https://fonts.googleapis.com/css2?family=Libre+Barcode+128&family=Noto+Sans+Bengali:wght@100..900&display=swap" rel="stylesheet">
    <!--end::Third Party Plugin(Bootstrap Icons)-->
    <!--begin::Required -->
    <link rel="stylesheet" href="<?php echo base_url();?>dist/css/adminlte.css" />
    <!--end::Required Plug in(AdminLTE)-->
    <!-- apexcharts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css" integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0=" crossorigin="anonymous" />
    <!-- jsvectormap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css" integrity="sha256-+uGLJmmTKOqBr+2E6KDYs/NRsHxSkONXFHUL0fy2O/4=" crossorigin="anonymous" />

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet"> 
    <link href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.css" rel="stylesheet"> 
  

    <style>

      * {
          font-family: "Noto Sans Bengali", serif;
          font-optical-sizing: auto;    
          font-style: normal;
          font-variation-settings: "wdth" 100;
          font-size: 14px;
        }

        .image-with-caption {
            display: inline-block;  /* Ensures figure wraps around the image and caption */
            text-align: center;
            max-width: 100%;
            padding: 5px;
        }

        .image-with-caption img {
            max-width: 100%;
            height: auto;
            display: block; /* Prevents extra spacing issues */
            border: 10px solid #f0f0f0;
            border-radius: 5px;
        }

        .image-with-caption figcaption {
            font-size: 14px;
            color: #777;
            background-color: #f7f7f7;
            padding: 10px;
            margin-top: 5px;
            width: 100%;
            word-wrap: break-word;
            border-top: none;
            border-bottom: 2px solid;
        }

        /* Floats the figure while keeping caption aligned */
        .image-with-caption.float-left,
        .image-with-caption.float-right {
            display: inline-block;
        }

        .image-with-caption.float-left {
            float: left;
            margin-right: 15px;
        }

        .image-with-caption.float-right {
            float: right;
            margin-left: 15px;
        }
 
    </style>
  </head>
  <!--end::Head-->
  <!--begin::Body-->
  <body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
            <!--begin::Header-->
      <nav class="app-header navbar navbar-expand bg-body">
        <!--begin::Container-->
        <div class="container-fluid">          
          <!--begin::End Navbar Links-->
          <ul class="navbar-nav ms-auto">           
           
            <!--begin::User Menu Dropdown-->
            <li class="nav-item dropdown user-menu">
              <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <img
                  src="<?php echo base_url();?>dist/assets/img/user2-160x160.jpg"
                  class="user-image rounded-circle shadow"
                  alt="User Image"
                />
                <span class="d-none d-md-inline">Alexander Pierce</span>
              </a>
              <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                <!--begin::User Image-->
                <li class="user-header text-bg-primary">
                  <img
                    src="<?php echo base_url();?>dist/assets/img/user2-160x160.jpg"
                    class="rounded-circle shadow"
                    alt="User Image"
                  />
                  <p>
                    Alexander Pierce - Web Developer
                    <small>Member since Nov. 2023</small>
                  </p>
                </li>
                <!--end::User Image-->
                <!--begin::Menu Body-->
                <li class="user-body">
                  <!--begin::Row-->
                  <div class="row">
                    <div class="col-4 text-center"><a href="#">Followers</a></div>
                    <div class="col-4 text-center"><a href="#">Sales</a></div>
                    <div class="col-4 text-center"><a href="#">Friends</a></div>
                  </div>
                  <!--end::Row-->
                </li>
                <!--end::Menu Body-->
                <!--begin::Menu Footer-->
                <li class="user-footer">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                  <a href="#" class="btn btn-default btn-flat float-end">Sign out</a>
                </li>
                <!--end::Menu Footer-->
              </ul>
            </li>
            <!--end::User Menu Dropdown-->
          </ul>
          <!--end::End Navbar Links-->
        </div>
        <!--end::Container-->
      </nav>
      <!--end::Header-->