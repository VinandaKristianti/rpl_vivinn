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
        <link href="{{asset('admin/css/styles.css')}}" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
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
                    <br>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Jenis Tes</th>
                                <th>Tanggal Tes</th>
                                <th>Jam Mulai</th>
                                <th>Jam Selesai</th>
                                <th>Status</th>
                                <th>Action</th>
                                
                            </tr>
                        </thead>
                            @foreach($data_view as $daftar)
                                <tbody>
                                    <tr>
                                        <td>{{DB::table('tes')->where('id_tes', $daftar['id_tes'])->value('namaTes')}}</td>
                                        <td>{{DB::table('jadwal')->where('id_jadwal', $daftar['id_jadwal'])->value('tgl_tes')}}</td>
                                        <td>{{DB::table('jadwal')->where('id_jadwal', $daftar['id_jadwal'])->value('jam_mulai')}}</td>
                                        <td>{{DB::table('jadwal')->where('id_jadwal', $daftar['id_jadwal'])->value('jam_selesai')}}</td>
                                        @if($daftar->status == 0)
                                        <td>Menunggu</td>
                                        <td><button type="button" class="btn btn-dark" disabled>Menunggu</button></td>
                                        @elseif($daftar->status == 1)
                                        <td>Diterima</td>
                                        <td>
                                        <a href="/pembayaran"><button type="submit" class="btn btn-success">Bayar</button></a></td>
                                        @else
                                        <td>Ditolak</td>
                                        <td><button type="button" class="btn btn-danger" disabled>Gagal</button></td>
                                        @endif
                                    </tr>     
                                </tbody>
                            @endforeach
                    </table>
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
                                            <th>Tgl Bayar</th>
                                            <th>Nama Pengirim</th>
                                            <th>Nama Bank</th>
                                            <th>Total Bayar</th>
                                            <th>Status</th>
                                            <th>Link Tes</th>
                                    </thead>
                                    <tbody>
                                    @foreach($verTrx as $daftar)
                                    <tbody>
                                    <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{DB::table('transaksi')->where('id_trx', $daftar['id_trx'])->value('tgl_kirim')}}</td>
                                            <td>{{DB::table('transaksi')->where('id_trx', $daftar['id_trx'])->value('nama_rek')}}</td>
                                            <td>{{DB::table('transaksi')->where('id_trx', $daftar['id_trx'])->value('bank')}}</td>
                                            <td>{{DB::table('transaksi')->where('id_trx', $daftar['id_trx'])->value('total')}}</td>
                                            @if($daftar->status == 0)
                                            <td><button type="button" class="btn btn-dark" disabled>Mohon Menunggu</button></td>
                                            @elseif($daftar->status == 1)
                                            <td><button type="button" class="btn btn-success"disabled>Berhasil</button></td>
                                            @else
                                            <td><a href="/pembayaran"><button type="button" class="btn btn-danger">Ulangi Pembayaran</button></a></td>
                                            @endif

                                            @if($daftar->link_tes == 0)
                                            <td>Menunggu konfirmasi</td>
                                            @elseif($daftar->link_tes == 1)
                                            <td><a href="www.link_tes.com"><button type="button" class="btn btn-info">Menuju Link</button></a></td>
                                            @else
                                            <td>Batal</td>
                                            @endif                         
                                    </tbody>
                                    @endforeach
                                </table>
                            </div>
                    </table>
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
