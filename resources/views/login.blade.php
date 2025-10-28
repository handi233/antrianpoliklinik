<!doctype html>
<html lang="en">
  <head><script>(function(w,i,g){w[g]=w[g]||[];if(typeof w[g].push=='function')w[g].push(i)})
(window,'G-SEKJ4E9T4H','google_tags_first_party');</script><script async src="/s9cc/"></script>
			<script>
				window.dataLayer = window.dataLayer || [];
				function gtag(){dataLayer.push(arguments);}
				gtag('js', new Date());
				gtag('set', 'developer_id.dYzg1YT', true);
				gtag('config', 'G-SEKJ4E9T4H');
			</script>
			
  	<title>Login | {{$nama_instansi}}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="css/style.css">
<!--Favicon-->
<link rel="icon" href="{{ asset($logo) }}" type="image/icon">
	</head>
	<!--background-->
<body style=" background-image: url('{{ asset($background) }}'); background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  height: 100vh;
  margin: 0;
">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">{{$nama_instansi}}</h2>
				</div>
			</div>
			 <!-- logo-->
			 <div>
  <img src="{{ asset($logo) }}" alt="Logo" style="display: block; margin: 10px auto; width: 10%; margin-top:-55px;">
		</div>	
		</div>	
  <div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	<p class="mb-4 text-center">{{$alamat_instansi}}</p>
		      	<form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
					 <input type="hidden" name="_token" value="{{ csrf_token() }}">
					 @if ($errors->any() || session('error'))
				<div style="display: flex; justify-content: center; margin-bottom: 20px;">
                	<div style="color: red; background-color: #ffe6e6; border: 1px solid #ff0000; padding: 10px 20px; border-radius: 5px; text-align: center;">
					@if ($errors->any())
					<div style="color: red;">
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif
				@if (session('error'))
					<div style="color: red;">
						{{ session('error') }}
					</div>
				@endif
			</div>
		</div>
		@endif

		      		<div class="form-group">
		      			<input type="text" class="form-control" placeholder="Username" name="username" required autofocus>
		      		</div>
	            <div class="form-group">
	              <input id="password-field" type="password" class="form-control" name="password" placeholder="Password" required >
	              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	            </div>
	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary submit px-3"  >Masuk</button>
	            </div>  
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"984e8ee97cafb2ad","serverTiming":{"name":{"cfExtPri":true,"cfEdge":true,"cfOrigin":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"version":"2025.9.1","token":"cd0b4b3a733644fc843ef0b185f98241"}' crossorigin="anonymous"></script>
</body>
</html>

