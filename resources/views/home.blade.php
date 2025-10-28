<!DOCTYPE html>
<html lang="id" data-bs-theme="light">
<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Modern Bootstrap 5 Admin Template - Clean, responsive dashboard">
    <meta name="keywords" content="bootstrap, admin, dashboard, template, modern, responsive">
    <meta name="author" content="Bootstrap Admin Template">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="Modern Bootstrap Admin Template">
    <meta property="og:description" content="Clean and modern admin dashboard template built with Bootstrap 5">
    <meta property="og:type" content="website">
    
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="{{$logo}}">

    
    <!-- Preconnect to external domains -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    
    <!-- Fonts -->
    <link href="../../css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Title -->

    <title>Dashboard </title>
    
    <!-- Theme Color -->
    <meta name="theme-color" content="#6366f1">
    
    <!-- PWA Manifest -->
    <link rel="manifest" href="assets/manifest-DTaoG9pG.json">
  <script type="module" crossorigin="" src="assets/main-BPhDq89w.js"></script>
  <link rel="stylesheet" crossorigin="" href="assets/main-D9K-blpF.css">

  <!-- Bostrap delete from-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Refresh tiap 5 Detik-->
  <meta http-equiv="refresh" content="5">
</head>

<body data-page="dashboard" class="admin-layout">
    <!-- Loading Screen -->
    <div id="loading-screen" class="loading-screen">
        <div class="loading-spinner">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>

    <!-- Main Wrapper -->
    <div class="admin-wrapper" id="admin-wrapper">
        
        <!-- Header -->
        <header class="admin-header">
            <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
                <div class="container-fluid">
                    <a class="navbar-brand d-flex align-items-center">
                    </a>
    
                    <!-- Right Side Icons -->
                    <div class="navbar-nav flex-row">
                        <!-- Theme Toggle with Alpine.js -->
                        <div x-data="themeSwitch">
                            <button class="btn btn-outline-secondary me-2" type="button" @click="toggle()" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Toggle theme">
                                <i class="bi bi-sun-fill" x-show="currentTheme === 'light'"></i>
                                <i class="bi bi-moon-fill" x-show="currentTheme === 'dark'"></i>
                            </button>
                        </div>

                        <!-- Fullscreen Toggle -->
                        <button class="btn btn-outline-secondary me-2" type="button" data-fullscreen-toggle="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Toggle fullscreen">
                            <i class="bi bi-arrows-fullscreen icon-hover"></i>
                        </button>

                        <div class="dropdown">
                            <button class="btn btn-outline-secondary d-flex align-items-center" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="data:image/svg+xml,%3csvg%20width='32'%20height='32'%20viewBox='0%200%2032%2032'%20fill='none'%20xmlns='http://www.w3.org/2000/svg'%3e%3c!--%20Background%20circle%20--%3e%3ccircle%20cx='16'%20cy='16'%20r='16'%20fill='url(%23avatarGradient)'/%3e%3c!--%20Person%20silhouette%20--%3e%3cg%20fill='white'%20opacity='0.9'%3e%3c!--%20Head%20--%3e%3ccircle%20cx='16'%20cy='12'%20r='5'/%3e%3c!--%20Body%20--%3e%3cpath%20d='M16%2018c-5.5%200-10%202.5-10%207v1h20v-1c0-4.5-4.5-7-10-7z'/%3e%3c/g%3e%3c!--%20Subtle%20border%20--%3e%3ccircle%20cx='16'%20cy='16'%20r='15.5'%20fill='none'%20stroke='rgba(255,255,255,0.2)'%20stroke-width='1'/%3e%3c!--%20Gradient%20definition%20--%3e%3cdefs%3e%3clinearGradient%20id='avatarGradient'%20x1='0%25'%20y1='0%25'%20x2='100%25'%20y2='100%25'%3e%3cstop%20offset='0%25'%20style='stop-color:%236b7280;stop-opacity:1'%20/%3e%3cstop%20offset='100%25'%20style='stop-color:%234b5563;stop-opacity:1'%20/%3e%3c/linearGradient%3e%3c/defs%3e%3c/svg%3e" alt="User Avatar" width="24" height="24" class="rounded-circle me-2">
                                <span class="d-none d-md-inline">{{ auth()->user()->fullnama }}</span>
                                <i class="bi bi-chevron-down ms-1"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><hr class="dropdown-divider"></li>
                               <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            <i class="bi bi-box-arrow-right me-2"></i>Logout
                                        </button>
                                    </form>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        <!-- Sidebar -->
        <aside class="admin-sidebar" id="admin-sidebar">
            <div class="sidebar-content">
                <nav class="sidebar-nav">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('home') ? 'active' : '' }}" href="{{ route('home') }}">
                                <span> Pemanggil Antrian Pasien</span>
                            </a>
                        </li>
                            <!--Hidden Non Admin-->     
                                            @php
                            $role = auth()->user()->role ?? 'user'; 
                        @endphp

                        @if($role === 'admin')
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('apam') ? 'active' : '' }}" href="{{ route('apam') }}">
                                    <span>Anjungan Pasien Mandiri</span>
                                </a>
                            </li>  
                        @endif

                        
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('displaypoliklinik') ? 'active' : '' }}" href="{{ route('displaypoliklinik') }}">
                                <span>Display Poliklinik</span>
                            </a>
                        </li>   
                         <!--Hiden menu non admin-->
                        @php
              $role = auth()->user()->role ?? 'user'; 
                @endphp

                @if($role === 'admin')
                        <li class="nav-item mt-3">
                            <small class="text-muted px-3 text-uppercase fw-bold">Admin</small>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('settings') ? 'active' : '' }}" href="{{ route('settings') }}">
                                <i class="bi bi-gear"></i>
                                <span>Settings</span>
                            </a>
                        </li>
                         <li class="nav-item">
                            <a class="nav-link {{ request()->is('users') ? 'active' : '' }}" href="{{ route('users') }}">
                                <i class="bi bi-people"></i>
                                <span>Users</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('help') ? 'active' : '' }}" href="{{ route('help') }}">
                                <i class="bi bi-question-circle"></i>
                                <span>Help & Support</span>
                            </a>
                        </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </aside>

        <!-- Floating Hamburger Menu -->
        <button class="hamburger-menu" type="button" data-sidebar-toggle="" aria-label="Toggle sidebar">
            <i class="bi bi-list"></i>
        </button>

        <!-- Main Content -->
        <main class="admin-main">
                       

            <div class="container-fluid p-4 p-lg-5">
                <!-- Page Header -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h1 class="h3 mb-0">Dashboard</h1>
                        <p class="text-muted mb-0">Selamat Datang {{ auth()->user()->fullnama }}</p>
                    </div>
                </div>
                    <!-- isi form -->
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">

<div class="table-responsive">
    <table class="table table-bordered" id="antrianTable">
    </table>
</div>

<div class="card">
    <div class="card-header">
        <h5>List Antrian Poliklinik Umum Hari Ini</h5>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
             <!--Reload Notifikasi-->   
                <script>
                    setTimeout(function () {
                        window.location.reload();
                    }, 3000); // Refresh dalam 3 detik
                </script>
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
<div class="mb-3">
    <input type="text" id="searchInput" class="form-control" placeholder="Cari nomor antrian, poli, status...">
</div>

        <div class="table-responsive">
            <table class="table table-bordered" id="antrianTable">
                <thead>
                    <tr>
                        <th>No Antrian</th>
                        <th>Poli</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($antrian as $a)
                        <tr>
                            <td>{{ $a->no_antrian }}</td>
                            <td>{{ $a->poli }}</td>
                            <td>{{ \Carbon\Carbon::parse($a->datetime)->format('d-m-Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($a->datetime)->format('H:i') }}</td>
                            <td>
                                <span class="badge 
                                    @if($a->status == 'menunggu') bg-warning 
                                    @elseif($a->status == 'dipanggil') bg-info 
                                    @elseif($a->status == 'selesai') bg-success 
                                    @endif">
                                    {{ ucfirst($a->status) }}
                                </span>
                            </td>
                            <td>
                                @if($a->status === 'menunggu')
                                <form method="POST" action="{{ route('home.call') }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $a->id }}">
                                    <button type="submit" class="btn btn-sm btn-primary call-btn"
                                        data-no="{{ $a->no_antrian }}"
                                        data-poli="{{ $a->poli }}">
                                        🔊 Panggil
                                    </button>
                                </form>
                                @else
                                    <button class="btn btn-sm btn-secondary" disabled>Sudah Dipanggil</button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <h5>List Antrian Poliklinik Control Hari Ini</h5>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
             <!--Reload Notifikasi-->   
                <script>
                    setTimeout(function () {
                        window.location.reload();
                    }, 3000); // Refresh dalam 3 detik
                </script>
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
<div class="mb-3">
    <input type="text" id="searchInput" class="form-control" placeholder="Cari nomor antrian, poli, status...">
</div>

        <div class="table-responsive">
            <table class="table table-bordered" id="antrianTable">
                <thead>
                    <tr>
                        <th>No Antrian</th>
                        <th>Poli</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($antriann as $a)
                        <tr>
                            <td>{{ $a->no_antrian }}</td>
                            <td>{{ $a->poli }}</td>
                            <td>{{ \Carbon\Carbon::parse($a->datetime)->format('d-m-Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($a->datetime)->format('H:i') }}</td>
                            <td>
                                <span class="badge 
                                    @if($a->status == 'menunggu') bg-warning 
                                    @elseif($a->status == 'dipanggil') bg-info 
                                    @elseif($a->status == 'selesai') bg-success 
                                    @endif">
                                    {{ ucfirst($a->status) }}
                                </span>
                            </td>
                            <td>
                                @if($a->status === 'menunggu')
                                <form method="POST" action="{{ route('control.call') }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $a->id }}">
                                    <button type="submit" class="btn btn-sm btn-primary call-btn"
                                        data-no="{{ $a->no_antrian }}"
                                        data-poli="{{ $a->poli }}">
                                        🔊 Panggil
                                    </button>
                                </form>
                                @else
                                    <button class="btn btn-sm btn-secondary" disabled>Sudah Dipanggil</button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>





    </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.3.2/js/dataTables.bootstrap4.js"></script>
<script>
  new DataTable('#example', {
    scrollX: true
});


                                <h5 class="card-title mb-0"></h5>
                            </div>
                        <div>
                        </div>
                            
                                        
                                    <script>
                                    document.getElementById('searchInput').addEventListener('keyup', function () {
                                    let keyword = this.value.toLowerCase();
                                    let rows = document.querySelectorAll('#tableData tr');

                                    rows.forEach(function (row) {
                                        let rowText = row.textContent.toLowerCase();
                                        row.style.display = rowText.includes(keyword) ? '' : 'none';
                                    });
                                    });
                                </script>
                                </div>
                            </div>
                        </div>
                    </div>

                <script>
                document.addEventListener('DOMContentLoaded', function () {
                const searchInput = document.getElementById('searchInput');
                const tableRows = document.querySelectorAll('#antrianTable tbody tr');

                searchInput.addEventListener('keyup', function () {
                    const keyword = this.value.toLowerCase();

                    tableRows.forEach(row => {
                    const rowText = row.textContent.toLowerCase();
                    row.style.display = rowText.includes(keyword) ? '' : 'none';
                    });
                });
                });
                </script>


                
        </main>

        <!-- Footer -->
        <footer class="admin-footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                     <span id="tanggalwaktu"></span>
                        <script>
                        function updateTanggalWaktu() {
                        const dt = new Date();
                        document.getElementById("tanggalwaktu").innerHTML =
                            (("0" + dt.getDate()).slice(-2)) + "." +
                            (("0" + (dt.getMonth() + 1)).slice(-2)) + "." +
                            dt.getFullYear() + " " +
                            (("0" + dt.getHours()).slice(-2)) + ":" +
                            (("0" + dt.getMinutes()).slice(-2)) + ":" +
                            (("0" + dt.getSeconds()).slice(-2));
                        }

                        // Jalankan pertama kali
                        updateTanggalWaktu();

                        // Jalankan terus setiap 1 detik
                        setInterval(updateTanggalWaktu, 1000);
                    </script>
                    </div>
                </div>
            </div>
        </footer>
        </div> <!-- /.admin-wrapper -->
    

    <!-- Toast Container -->
    <div aria-live="polite" aria-atomic="true" class="position-fixed top-0 end-0 p-3" style="z-index: 11">
        <div id="toast-container"></div>
    </div>


    <!-- Icon Demo Modal -->
    <div class="modal fade" id="iconDemoModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="bi bi-palette me-2"></i>
                        Icon System Demo
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" x-data="iconDemo">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h6>Current Provider: <span class="badge bg-primary" x-text="currentProvider"></span></h6>
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-outline-primary" @click="switchProvider('bootstrap')" :class="{ 'active': currentProvider === 'bootstrap' }">
                                    Bootstrap Icons
                                </button>
                                <button type="button" class="btn btn-outline-primary" @click="switchProvider('lucide')" :class="{ 'active': currentProvider === 'lucide' }">
                                    Lucide Icons
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row g-3">
                        <div class="col-md-3 text-center">
                            <div class="p-3 border rounded">
                                <i class="bi bi-speedometer2 icon-xl text-primary mb-2"></i>
                                <br><small></small>
                            </div>
                        </div>
                        <div class="col-md-3 text-center">
                            <div class="p-3 border rounded">
                                <i class="bi bi-people icon-xl text-success mb-2"></i>
                                <br><small>Users</small>
                            </div>
                        </div>
                        <div class="col-md-3 text-center">
                            <div class="p-3 border rounded">
                                <i class="bi bi-graph-up icon-xl text-info mb-2"></i>
                                <br><small>Analytics</small>
                            </div>
                        </div>
                        <div class="col-md-3 text-center">
                            <div class="p-3 border rounded">
                                <i class="bi bi-gear icon-xl text-warning mb-2"></i>
                                <br><small>Settings</small>
                            </div>
                        </div>
                    </div>
                    
                    <h6 class="mt-4">Icon Animations</h6>
                    <div class="row g-3">
                        <div class="col-md-3 text-center">
                            <i class="bi bi-arrow-clockwise icon-xl icon-spin text-primary"></i>
                            <br><small>Spin</small>
                        </div>
                        <div class="col-md-3 text-center">
                            <i class="bi bi-heart icon-xl icon-pulse text-danger"></i>
                            <br><small>Pulse</small>
                        </div>
                        <div class="col-md-3 text-center">
                            <i class="bi bi-star icon-xl icon-hover text-warning"></i>
                            <br><small>Hover Effect</small>
                        </div>
                        <div class="col-md-3 text-center">
                            <i class="bi bi-check-circle icon-xl text-success"></i>
                            <br><small>Static</small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="bi bi-x me-2"></i>Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script>
      document.addEventListener('DOMContentLoaded', () => {
        const toggleButton = document.querySelector('[data-sidebar-toggle]');
        const wrapper = document.getElementById('admin-wrapper');

        if (toggleButton && wrapper) {
          // Set initial state from localStorage
          const isCollapsed = localStorage.getItem('sidebar-collapsed') === 'true';
          if (isCollapsed) {
            wrapper.classList.add('sidebar-collapsed');
            toggleButton.classList.add('is-active');
          }

          // Attach click listener
          toggleButton.addEventListener('click', () => {
            const isCurrentlyCollapsed = wrapper.classList.contains('sidebar-collapsed');
            
            if (isCurrentlyCollapsed) {
              wrapper.classList.remove('sidebar-collapsed');
              toggleButton.classList.remove('is-active');
              localStorage.setItem('sidebar-collapsed', 'false');
            } else {
              wrapper.classList.add('sidebar-collapsed');
              toggleButton.classList.add('is-active');
              localStorage.setItem('sidebar-collapsed', 'true');
            }
          });
        }
      });
    </script>
    
</body>

  

     

    </div>
  </div>
</div>
</html> 