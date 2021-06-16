<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link rel="icon" href="{{asset('admin/image/logo_sitesi.png')}}">
        <title>Dashboard - SB User</title>
        <link href="{{asset('admin/css/card.css')}}" rel="stylesheet" />
        <link href="{{asset('admin/css/styles.css')}}" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html">SITESI</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Cari ..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/biodata">Biodata</a>
                        @guest

                        @else
                        <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                        </form>
                        @endguest
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Menu Utama</div>
                            <a class="nav-link" href="/user">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Beranda
                            </a>
                            <div class="sb-sidenav-menu-heading">Pengaturan</div>
                            <a class="nav-link" href="/biodata">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Biodata
                            </a>
                            <a class="nav-link" href="/riwayat">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Riwayat
                            </a>
                            <a class="nav-link" href="/pembayaran">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pembayaran
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        User
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                  <h4>RIWAYAT KONFIRMASI JADWAL</h4>
                  <form action="/user/biodata" method="post">
                  {{ csrf_field() }}
                    <div class="form-group">
                      <label for="exampleInputNik">NIK</label>
                      <input type="text" class="form-control" id="exampleInputNik" aria-describedby="nik" placeholder="" name="nik">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputNama">Nama</label>
                      <input type="text" class="form-control" id="exampleInputNama" aria-describedby="nama" placeholder="" name="nama">
                    </div>
                    <div class="form-group">
                      <label for="exampleTglLahir">Tanggal Lahir</label>
                      <input type="date" class="form-control" id="tgl_lahir" aria-describedby="tgl_lahir" placeholder="" name="tgl_lahir">
                    </div>
                    <div class="form-group">
                      <label for="exampleGender">Jenis Kelamin</label>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="jk" id="exampleRadios1" value="option1" checked>
                        <label class="form-check-label" for="exampleRadios1">
                          Pria
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="jk" id="exampleRadios2" value="option2">
                        <label class="form-check-label" for="exampleRadios2">
                          Wanita
                        </label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">Alamat</label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamat"></textarea>
                      <small id="alamat" class="form-text text-muted">Diisi sesuai KTP</small>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputMinat">Bidang Minat</label>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="minat" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                          Musik
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="minat" id="defaultCheck2">
                        <label class="form-check-label" for="defaultCheck2">
                          Olahraga
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="minat" id="defaultCheck3">
                        <label class="form-check-label" for="defaultCheck3">
                          Menari
                        </label>
                      </div>
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="minat" id="defaultCheck2">
                        <label class="form-check-label" for="defaultCheck2">
                          Membaca
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="minat" id="defaultCheck2">
                        <label class="form-check-label" for="defaultCheck2">
                          Bermain Game 
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="minat" id="defaultCheck2">
                        <label class="form-check-label" for="defaultCheck2">
                          Fotografi
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="minat" id="defaultCheck2">
                        <label class="form-check-label" for="defaultCheck2">
                          Videografi
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="minat" id="defaultCheck2">
                        <label class="form-check-label" for="defaultCheck2">
                          Fashion
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="minat" id="defaultCheck2">
                        <label class="form-check-label" for="defaultCheck2">
                          Design
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="minat" id="defaultCheck2">
                        <label class="form-check-label" for="defaultCheck2">
                          Travelling
                        </label>
                      </div>
                    </div>
                    <br>
                   <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; SITESI 2020</div>
                            
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('admin/js/scripts.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>