<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Shop Homepage - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('style2/assets/favicon.ico') }}" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('style2/css/styles.css') }}" rel="stylesheet" />
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#!">Pixycam</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Home</a></li>
                </ul>
                <div class="d-flex">
                    <button class="btn btn-outline-dark me-2" data-bs-toggle="modal" data-bs-target="#cartModal" type="button">
                        <i class="bi-cart-fill me-1"></i>
                        My Order
                        <span class="badge bg-dark text-white ms-1 rounded-pill">{{$totalOrders}}</span>
                    </button>
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{asset('image/icon-5359553_1280.png')}}" alt="Profile" class="rounded-circle" style="width: 32px; height: 32px;">
                            <span class="d-none d-md-block ps-2">{{Auth::user()->name}}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile" aria-labelledby="navbarDropdown">
                            <li class="dropdown-header">
                                <h6>{{Auth::user()->name}}</h6>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{route('logout')}}" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item d-flex align-items-center">
                                        <i class="bi bi-box-arrow-right mr-2"></i>
                                        <span>Sign Out</span>
                                    </button>
                                </form>
                            </li>
                        </ul><!-- End Profile Dropdown Items -->
                    </div><!-- End Profile Nav -->
                </div>
            </div>
        </div>
    </nav>
    <div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="cartModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cartModalLabel">Your Reservation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-hover datatable">
                        <thead class="table-primary">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Camera</th>
                                <th scope="col">Price</th>
                                <th scope="col">Pickup Time</th>
                                <th scope="col">Return Time</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$order->barang->nama_barang}}</td>
                                <td>Rp. {{ number_format($order->harga, 0, ',', '.') }}</td>
                                <td>{{$order->starts}}</td>
                                <td>{{$order->ends}}</td>
                                @if($order->status == "Belum Selesai")
                                <td>
                                    <button type="button" disabled class="btn btn-sm btn-danger">Unpaid</button>
                                </td>
                                @else
                                <td>
                                    <button type="button" disabled class="btn btn-sm btn-primary">Paid</button>
                                </td>
                                @endif
                                <td>
                                    @if($order->status == 'Belum Selesai')

                                    <form action="{{route('dashboard.order.delete',$order->id)}}" method='POST'>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-primary">Cancel</button>
                                    </form>
                                    @else
                                    <button type="button" disabled class="btn btn-sm btn-success">Selesai</button>
                                    @endif

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Dapatkan Hasil Profesional</h1>
                <p class="lead fw-normal text-white-50 mb-0">Tanpa Membeli</p>
            </div>
        </div>
    </header>
    <!-- Section-->
    <section class="py-5">

        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach($cameras as $camera)
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Product image -->
                        <img class="card-img-top" height="200px" src="{{ asset('storage/'.$camera->gambar) }}" alt="..." />
                        <!-- Product details -->
                        <div class="card-body d-flex flex-column px-3">
                                <!-- Product name -->
                                <h5 class="card-title">{{ $camera->nama_barang }}</h5>
                                <!-- Product reviews -->
                                <div class="d-flex">
                                    <p class="card-text mb-2 me-3">Rp. {{ number_format($camera->harga, 0, ',', '.') }}</p>
                                     @if($camera->jumlah > 0)
                                        <p>Stock {{$camera->jumlah}}</p>
                                    @else
                                        <p>Stock Kosong</p>
                                    @endif
                                </div>
                                <div class="d-flex">
                                    <div>

                                    @for ($i = 0; $i < 5; $i++)
                                        <i class="bi bi-star-fill text-warning"></i>
                                        
                                        
                                    @endfor
                                    </div>
                                </div>
                                <!-- Product price -->
                                <!-- Product description -->
                        </div>
                        <form action="{{ route('dashboard.store', $camera->id) }}" class='px-4 ' method="POST">
                            @csrf
                            <small>Tanggal Pengambilan</small>
                            <input type="date" name="start_date" class="form-control mb-2" required>
                            <small>Jam Pengambilan</small>
                            <input type="time" name="start_time" class="form-control mb-2" required>
                            <small>Durasi</small>
                            <input type="number" name="durasi" class="form-control mb-3" required>
                            @if ($errors->has('starts'))
                                <div class="alert alert-danger">
                                    Tanggal tidak boleh kurang dari waktu saat ini
                                </div>
                            @endif
                            <!-- Product actions -->
                             @if($camera->jumlah > 0)
                             <div class="d-flex align-items-center w-full justify-center mb-3">
                                 <button type="submit" class="btn btn-outline-dark">Order</button>

                             </div>
                             @else
                             <div class="d-flex align-items-center w-full justify-center mb-3">
                                 <button disabled class="btn btn-outline-dark">Out of Stock</button>

                             </div>
                             @endif

                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('style2/js/scripts.js') }}"></script>
</body>
</html>
