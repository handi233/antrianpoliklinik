<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Anjungan Pasien - {{ $nama_instansi }} </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- PWA Manifest -->
    <link rel="manifest" href="assets/manifest-DTaoG9pG.json">
  <link rel="stylesheet" crossorigin="" href="assets/main-D9K-blpF.css">
    <!-- User Friendly -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="{{$logo}}">
  <style>
      body {
      font-family: Arial, sans-serif;
      background-color: rgb(75, 72, 219);
      color: white;
      text-align: center;
      padding-top: 50px;
    }

    #clock {
      font-size: 2rem;
      font-weight: bold;
      margin-bottom: 10px;
    }

    #date {
      font-size: 1.5rem;
    }
      .marquee {
      white-space: nowrap;
      display: inline-block;
      padding-left: 50%;
      animation: marquee 15s linear infinite;
      font-weight: bold;
      font-size: 1rem;
      margin-top:10%;
    }

    @keyframes marquee {
      0% {
        transform: translateX(0%);
      }

      100% {
        transform: translateX(-100%);
      }
      
    }
    
  </style>
  </head>
<body>
    
    <h1 style="margin-left:auto;">  
        <img src="{{ asset('assets/favicon.ico') }}" alt="Logo" style="height:50px;">
        <span style="color: rgb(242, 242, 248);">{{$nama_instansi  }}</span>
    </h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<!--times-->
 <div id="clock"></div>
  <div id="date"></div>
  <script>
    function updateTime() {
      const now = new Date();

      // Format waktu: jam:menit:detik
      const time = now.toLocaleTimeString('id-ID',{
  hour12: false,       // pakai format 24 jam
  hour: '2-digit',
  minute: '2-digit',
  second: '2-digit'
}) + ' WIB';
      

      // Format tanggal: hari, tanggal bulan tahun 
      const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
      const date = now.toLocaleDateString('id-ID', options);

      document.getElementById('clock').textContent = time;
      document.getElementById('date').textContent = date;
    }

    // Update setiap detik
    setInterval(updateTime, 1000);

    // Update langsung saat halaman dimuat
    updateTime();

    
  </script>
 

<!--POLI UMUM-->
<form  method="POST" action="{{ route('poliumumprint') }}">
   @csrf
    <input type="hidden" name="poli" value="Poli Umum">
    <input type="hidden" name="datetime" value="{{ now() }}">
    <div><tr>
    <button   type="submit"  class="btn btn-primary" style="margin-left:-30%; margin-top:5%; width:20%; height:60%;  padding:50px;"
    >POLI UMUM</button>
    </div></tr>
</form>
    <!--CEK KONTROL-->
<form  method="POST" action="{{ route('cekkontrolprint') }}">
   @csrf
    <input type="hidden" name="poli" value="Cek Kontrol">
    <input type="hidden" name="datetime" value="{{ now() }}">
    <div><tr>
    <div><tr>
   <button  type="submit"  class="btn btn-success" style="margin-left:30%; margin-top:-147px; width:20%; height:60%;  padding:50px;"
    >KONTROL</button>
    </div></tr>
  </form>



 
<!--Footer-->
  <footer>
    <div class="marquee" style="color: white">Selamat Datang di Mesin Anjungan Pasien - {{ $nama_instansi}} </div>
  </footer>    
</body>
</html>