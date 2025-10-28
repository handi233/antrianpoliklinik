<!doctype html>
<html lang="id">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
    <title>Antrian Poliklinik - {{$nama_instansi}}</title>
    
    <!--Favicon-->
   <link rel="icon" type="image/svg+xml" href="{{$logo}}">
    <style>
       body {
    background-color: rgb(59, 159, 59);
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    font-size: 1.5rem;
    overflow: hidden; /* Hindari scroll di TV */
}

/* Tabel dan teks besar untuk layar TV */
.table {
    font-size: 1rem;
}

.card-text {
    font-size: 1rem;
    text-align: center;
}

/* Logo */
.logo-img {
    max-width: 200px;
    height: auto;
    display: block;
    margin: 0 auto 10px;
}

/* Video style */
iframe {
    margin-top: -100px;
    width: 215%;
    height: auto;
    aspect-ratio: 16 / 9;
}

/*  running text */
footer {
    position: fixed;
    bottom: 0;
    width: 100%;
    background-color: #ffffff;
    color: rgb(116, 19, 241);
    font-size: 2rem;
    height: 50px;
    line-height: 50px;
    overflow: hidden;
    z-index: 999;
}

.marquee {
    white-space: nowrap;
    display: inline-block;
    padding-left: 100%;
    animation: scroll-left 30s linear infinite;
}

@keyframes scroll-left {
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
<!--Logo-->
        <div style="position:fixed;margin-top:0; margin-left:30%;">
        <img src="{{ $logo }}"  />
          </div>
<!--Nama Instansi-->
        <div>
        <h1 style="color: white; margin: 20px auto; text-align: center; margin-top: 20px;">
            Antrian Poliklinik - {{ $nama_instansi }}
        </h1>
      </div>

  <!--table-->
  <div>
    <table class="table table-striped" style="width:45%; margin-left:53%; ">
     <thead>
    <tr style="background-color: rgb(31, 156, 235)">
      <th style="text-align:left; padding-left: 10px; color:white;">Antrian Poli Umum Terakhir</th>
      <th style="text-align:right; padding-right: 120px; color:white;">Petugas</th>
    </tr>
</thead>
 <tbody>
  <td>
    <div class="card" style="margin-right: 40%">
  <div class="card-body">
    {{ $antrian_terakhir ? $antrian_terakhir->no_antrian : 'Belum ada yang dipanggil' }}
 </td>
 <td>
    <div class="card" style="margin-right: 20%">
  <div class="card-body">
    <p class="card-text">{{ $fullnama }}</p>

 </td>
  </div>
</div>
    </tbody>
  </table>
</table>
</div>
</div>
<!--table-->
  <div>
    <table class="table table-striped" style="width:45%; margin-left:53%; ">
     <thead>
    <tr style="background-color: rgb(31, 156, 235)">
      <th style="text-align:left; padding-left: 10px; color:white;">Antrian Poli Kontrol Terakhir</th>
      <th style="text-align:right; padding-right: 120px; color:white;">Petugas Kontrol</th>
    </tr>
</thead>
 <tbody>
  <td>
    <div class="card" style="margin-right: 40%">
  <div class="card-body">
    {{ $antrian_terakhirr ? $antrian_terakhirr->no_antrian : 'Belum ada yang dipanggil' }}
 </td>
 <td>
    <div class="card" style="margin-right: 20%">
  <div class="card-body">
    <p class="card-text">{{ $fullnama }}</p>

 </td>
 
  </div>
</div>
    </tbody>
  </table>
</table>
</div>
</div>
<!--Youtube-->
<div style="display: flex;  margin-left: 2%; margin-top:-150px;">
  <!-- YouTube -->
  <div>
    <iframe width="627" height="400" src="{{$video1}}" 
      title="YouTube video player" frameborder="0" 
       allow="autoplay; encrypted-media" 
      allowfullscreen>
    </iframe>
  </div>
</div>


    <!-- Footer-->
    <footer>
        <div class="marquee">SELAMAT DATANG  - {{$nama_instansi}}</div>
    </footer>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>