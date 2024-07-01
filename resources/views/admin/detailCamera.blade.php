
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('style/assets/img/favicon.png')}} " rel="icon">
  <link href="{{asset('style/assets/img/apple-touch-icon.png')}} " rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('style/assets/vendor/bootstrap/css/bootstrap.min.css')}} " rel="stylesheet">
  <link href="{{asset('style/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('style/assets/vendor/boxicons/css/boxicons.min.css')}} " rel="stylesheet">
  <link href="{{asset('style/assets/vendor/quill/quill.snow.cs')}} s" rel="stylesheet">
  <link href="{{asset('style/assets/vendor/quill/quill.bubble.css')}} " rel="stylesheet">
  <link href="{{asset('style/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('style/assets/vendor/simple-datatables/style.css')}} " rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('style/assets/css/style.css')}} " rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">NiceAdmin</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="{{asset('image/icon-5359553_1280.png')}}" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">{{Auth::user()->name}}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{Auth::user()->name}}</h6>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <form action="{{route('logout')}}" method="post">
                @csrf
                <button type='submit' class="dropdown-item d-flex align-items-center" >
                  <i class="bi bi-box-arrow-right"></i>
                  <span>Sign Out</span>
                </button>
              </form>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('admin.dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link" href="{{route('admin.datacamera')}}">
          <i class="bi bi-camera"></i>
          <span>Data Camera</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('admin.pelanggan')}}">
          <i class="bi bi-person"></i>
          <span>Data Pelanggan</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->

      <li class="nav-item">
        <a class="nav-link active collapsed" href="{{ route('admin.penyewaan')}}">
          <i class="bi bi-envelope"></i>
          <span>Penyewaan</span>
        </a>
      </li><!-- End Contact Page Nav -->


    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Camera</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
          <li class="breadcrumb-item">Camera / Detail</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">




            <!-- Reports -->
            <!-- End Reports -->

            <!-- Recent Sales -->
            <div class="row">
        <!-- Left Column: Full Image Card -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <img src="{{asset('storage/'.$camera->gambar)}}" class="card-img-top" alt="Full Image">
            </div>
        </div>
        <!-- Right Column: Data Card -->
        <div class="col-md-6 mb-4">
            <div class="card h-100" style='display: flex; justify-content: space-between; flex-direction: column;'>
                <div class="card-body">
                    <h5 class="card-title">Data Camera</h5>
                    <div class="d-flex bg-blue-1 px-2 pt-2 rounded text-white">
                        <p class="card-text">Kode Barang </p>
                        <p class="card-text ms-5">: {{$camera->kode_barang}}</p>

                    </div>
                    <div class="d-flex px-2 pt-2">
                        <p class="card-text">Nama Barang: </p>
                        <p class="card-text ms-5">: {{$camera->nama_barang}}</p>

                    </div>
                    <div class="d-flex bg-blue-1 px-2 pt-2 rounded text-white">
                        <p class="card-text">Harga Barang: </p>
                        <p class="card-text ms-5">: {{$camera->harga}}</p>

                    </div>
                    <div class="d-flex px-2 pt-2">
                        <p class="card-text ">Jumlah Barang: </p>
                        <p class="card-text ms-5">: {{$camera->jumlah}}</p>

                    </div>
                    <div class="d-flex bg-blue-1 px-2 pt-2 pb-3 mb-3 rounded text-white">
                        <p class="card-text">Deskripsi Barang :</p>
                        
                    </div>
                    <textarea class="form-control mt-2" rows="4" readonly>{{$camera->deskripsi}}</textarea>
                    <div class="card-footer text-white d-flex  justify-content-end" style="margin-top: auto;">
                        <button class='btn btn-primary  '><a class='text-white text-decoration-none' href="{{route('admin.editCamera',$camera->id)}}">Edit</a></button>
                        <button class='btn-dark btn ms-2'><a class='text-white text-decoration-none' href="{{route('admin.datacamera')}}">Kembali</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('style/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('style/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('style/assets/vendor/chart.js/chart.umd.js')}}"></script>
  <script src="{{asset('style/assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{asset('style/assets/vendor/quill/quill.js')}}"></script>
  <script src="{{asset('style/assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset('style/assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('style/assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('style/assets/js/main.js')}}"></script>

</body>

</html>