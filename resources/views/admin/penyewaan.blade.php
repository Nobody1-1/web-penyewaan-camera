
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
        <a class="nav-link collapsed" href="{{route('admin.datacamera')}}">
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
        <a class="nav-link" href="{{ route('admin.penyewaan')}}">
          <i class="bi bi-envelope"></i>
          <span>Penyewaan</span>
        </a>
      </li><!-- End Contact Page Nav -->


    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Penyewaan</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="">Admin</a></li>
          <li class="breadcrumb-item">Penyewaan</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">




            <div class="col-12">
              <div class="card recent-sales overflow-auto">

              <div class="card-body">
                <form action="{{route('admin.store.penyewaan')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                        <div class="mb-3 mt-3">
                        <div class="mb-3">
                    <label for="user_id" class="form-label">Nama Customer</label>
                    <select name="user_id" class="form-select">
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 mt-3">
                    <label for="barang_id" class="form-label">Nama Camera</label>
                    <select name="barang_id" id="barang_id" class="form-select">
                        <option value="" disabled selected>Pilih Camera</option>
                        @foreach($cameras as $camera)
                            <option value="{{ $camera->id }}" >{{ $camera->nama_barang }}</option>
                        @endforeach
                    </select>
                </div>
                
                        <label class='form-label'>Tanggal Pengambilan</label class='form-label'>
                        <input type="date" name="start_date" class="form-control mb-2" required>
                        <label class='form-label'>Jam Pengambilan</label class='form-label'>
                        <input type="time" name="start_time" class="form-control mb-2" required>
                        <label class='form-label'>Durasi</label class='form-label'>
                        <input type="number" name="durasi" class="form-control mb-3" required>

                        <button type="submit" class="btn btn-primary">Create</button>
                </form>
</div>


              </div>
            </div><!-- End Recent Sales -->


            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Daftar Penyewaan</h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Customer</th>
                        <th scope="col">Camera</th>
                        <th scope="col">Pengambilan</th>
                        <th scope="col">Pengembalian</th>
                        <th scope="col">Durasi</th>
                        <th scope="col">Harga/Jam</th>
                        <th scope="col">Total Harga</th>
                        <th scope="col">Denda</th>
                        <th scope="col">Total All</th>
                        <th scope="col">Status</th>

                      </tr>
                    </thead>
                    <tbody>
                      @php
                        use Carbon\Carbon;
                      @endphp
                    
                    @foreach($orders as $order)
                    <tr>
                        
                          <td>{{$loop->iteration}}</td>
                          <td>{{$order->user->name}}</td>
                          <td>{{$order->barang->nama_barang}}</td>
                          <td>{{ Carbon::parse($order->starts)->format('d/m/Y H:i') }}</td>
                          <td>{{ Carbon::parse($order->ends)->format('d/m/Y H:i') }}</td>
                          <td>{{$order->durasi}} jam</td>
                          <td>Rp. {{$order->barang->harga}}</td>
                          <td>Rp. {{ number_format($order->harga, 0, ',', '.') }}</td>
                          <td>Rp. {{ number_format($order->denda, 0, ',', '.') }}</td>
                          @if ($order->payment_id > 0) 
                          <td>Rp. {{ number_format($order->payment->total, 0, ',', '.') }}</td>
                          @else
                          <td>0</td>

                          @endif
                          <td>
                          @if ($order->payment_id)
                              <button class="badge bg-success">Selesai</button>
                          @else
                              <button class="me-2 badge bg-danger" data-bs-toggle="modal" data-bs-target="#cartModal{{ $order->id }}" type="button">
                                  Belum selesai
                              </button>
                          @endif

                          <!-- Modal -->
                          <div class="modal fade" id="cartModal{{ $order->id }}" tabindex="-1" role="dialog" aria-labelledby="cartModalLabel{{ $order->id }}" aria-hidden="true">
                              <div class="modal-dialog modal-lg">
                                  <div class="modal-content">
                                      <div class="modal-footer">
                                          <form action="{{ route('admin.store.payment', $order->id) }}" method='POST'>
                                              @csrf
                                              <button class='btn btn-primary'>Yes</button>
                                          </form>
                                          <a href="{{ route('admin.penyewaan') }}" class="btn btn-secondary">No</a>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </td>

                    </tr>
                    @endforeach
                     
                    </tbody>
                  </table>

                  <button class="btn btn-success">
                    <a href="{{route('export.orders.pdf')}}" class='text-white text-decoration-none'>Cetak Pdf</a>
                  </button>
                </div>
                
              </div>
            </div><!-- End Recent Sales -->



          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

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