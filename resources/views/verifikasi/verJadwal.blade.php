<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
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
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Tes Psikolog
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">Tambah Jenis Tes</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Tambah Jadwal</a>
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
                            <div class="sb-sidenav-menu-heading">PENGATURAN</div>
                            <a class="nav-link collapsed" href="#"  >
                                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                    Account
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
                                            <th>No</th>
                                            <th>Nama Peserta</th>
                                            <th>Jenis Tes</th>
                                            <th>Mulai</th>
                                            <th>Selesai</th>
                                            <th>Status</th>
                                            <th colspan="2" style="text-align:center;">Action</th>
                                        </tr>

                                        
                                    </thead>
                                    <tbody>
                                    @foreach($verif as $daftar)
                                    <tbody>
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{DB::table('users')->where('id', $daftar['id_user'])->value('name')}}</td>
                                        <td>{{DB::table('tes')->where('id_tes', $daftar['id_tes'])->value('namaTes')}}</td>
                                        <td>{{DB::table('jadwal')->where('id_jadwal', $daftar['id_jadwal'])->value('jam_mulai')}}</td>
                                        <td>{{DB::table('jadwal')->where('id_jadwal', $daftar['id_jadwal'])->value('jam_selesai')}}</td>
                                        @if($daftar->status == 0)
                                        <td>Menunggu</td>
                                        @elseif($daftar->status == 1)
                                        <td>Diterima</td>
                                        @else
                                        <td>Ditolak</td>
                                    @endif
                                    <td><form method="post" action="/verJadwal/pilih">
                                    @csrf
                                                <input type="hidden" name="id_daftar" value="{{$daftar->id_daftar}}">
                                                <input type="hidden" name="status" value="1">
                                                <button type="submit" class="btn btn-success"> Terima </button>

                                                </form>
                                    </td>
                                    <td><form method="post" action="/verJadwal/pilih">
                                    @csrf
                                                <input type="hidden" name="status" value="2">
                                                <input type="hidden" name="id_daftar" value="{{$daftar->id_daftar}}">
                                                <button type="submit" class="btn btn-danger"> Tolak </button>
                                                
                                                </form>
                                    </td>
                                    </tr>     
                                    </tbody>
                                    @endforeach
                                        
                                        
                                    </tbody>
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