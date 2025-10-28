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
    <link rel="icon" type="image/svg+xml" href="assets/favicon.ico">
    <link rel="icon" type="image/png" href="assets/favicon-B_cwPWBd.png">
    
    <!-- Preconnect to external domains -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    
    <!-- Fonts -->
    <link href="../../css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Title -->

    <title>Help </title>
    
    <!-- Theme Color -->
    <meta name="theme-color" content="#6366f1">
    
    <!-- PWA Manifest -->
    <link rel="manifest" href="assets/manifest-DTaoG9pG.json">
  <script type="module" crossorigin="" src="assets/main-BPhDq89w.js"></script>
  <link rel="stylesheet" crossorigin="" href="assets/main-D9K-blpF.css">

  <!-- Bostrap delete from-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

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
                    <!-- Logo/Brand - Now first on the left -->
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
                                <span>Pemanggil Antrian Pasien</span>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('apam') ? 'active' : '' }}" href="{{ route('apam') }}">
                                <span>Anjungan Pasien Mandiri</span>
                            </a>
                        </li>
                            <li class="nav-item">
                            <a class="nav-link {{ request()->is('apam') ? 'active' : '' }}" href="{{ route('displaypoliklinik') }}">
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
                @if(session('sukses'))
                <div class="alert alert-success">{{ session('sukses') }}</div>
            @endif

            <div class="container-fluid p-4 p-lg-5">
                <!-- Page Header -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h1 class="h3 mb-0">Help</h1>
                        <p class="text-muted mb-0">Selamat Datang {{ auth()->user()->fullnama }}</p>
                    </div>
                </div>
                <!-- New Widgets Row -->
                <div class="row g-4 mb-4">
<!-- Card White -->
<div class="card shadow-sm border-0">
    <div class="card-body">
        <h5 class="card-title">Tentang Aplikasi</h5>
        <p class="card-text">
            Ini adalah halaman aplikasi antrian pendaftaran pasien:
        </p>
        <ul>
            <li>Pasien datang menekan tombol nomer antrian struk lalu dicetak</li>
            <li>Petugas memanggil pasien berdasarkan nomer urut antrian</li>
        </ul>
       
    </div>
</div>
                               



                
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
        </div> 
    


    </div>
  </div>
</div>
</html> 