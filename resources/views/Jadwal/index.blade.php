<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link rel="icon" href="{{asset('admin/image/logo_sitesi.png')}}">
        <title>Dashboard - SB Admin</title>
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
                            <a class="nav-link" href="/admin_test">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">MENU UTAMA</div>
                            <a class="nav-link collapsed" href="/listAdmin">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Tambah Admin
                                <div ></div>
                            </a>
                            <a class="nav-link collapsed" href="/tes" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Tes Psikolog
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="/tes">Tambah Jenis Tes</a>
                                    <a class="nav-link" href="/jadwal">Tambah Jadwal</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Verifikasi Data
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link" href="/verJadwal">Jadwal</a>
                                    <a class="nav-link" href="/verBayar">Transaksi</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#"  >
                                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                    Grafik
                             </a>
                        </div>
                        
                    </div>
                    
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Admin 
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="tambah">
                        <form action="/tambah_jadwal">
                            <button class="btn btn-outline-dark">Tambah Data</button>
                        </form>
                    </div>
                    <tr>
                    <div class="card mb-4">
                        <div class="card-body">
                            @if(session('sukses'))
                                <div class="alert alert-success" role="alert">
                                    {{session('sukses')}}
                                </div>
                            @endif
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center;">Jenis Tes</th>
                                            <th style="text-align:center;">Tanggal Tes</th>
                                            <th style="text-align:center;">Jam Mulai</th>
                                            <th style="text-align:center;">Jam Selesai</th>
                                            <th style="text-align:center;">Kapasitas</th>
                                            <th colspan="2" style="text-align:center;"> Action </th>
                                        </tr>
                                    </thead>
                                    @foreach($data_jadwal as $jadwal)
                                    <tbody>
                                        <tr>
                                            <td>{{DB::table('tes')->where('id_tes', $jadwal['id_tes'])->value('namaTes')}}</td>
                                            <td>{{$jadwal->tgl_tes}}</td>
                                            <td>{{$jadwal->jam_mulai}}</td>
                                            <td>{{$jadwal->jam_selesai}}</td>
                                            <td>{{$jadwal->kapasitas}}</td>
                                            <td>
                                            <a href="/editJadwal/{{$jadwal->id_jadwal}}"><button type="submit" class="btn btn-primary">Update</button></a>
                                            <td>    
                                            <a href="/deleteJadwal/{{$jadwal->id_jadwal}}"><button type="submit" class="btn btn-danger">Delete</button></a>
                                            </td>
                                        </tr>     
                                    </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>  
                </main>
            </div>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; SITESI 2021</div>    
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        @foreach ($data_tes as $tes)
        @endforeach
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
