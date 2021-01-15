<!doctype html>
<html lang="en">

<head>
	<title>Dashboard | Center Of Students Development
</title>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{asset('admin/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/datatables.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
	<link rel="stylesheet" href="{{asset('admin/assets/vendor/font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('admin/assets/vendor/linearicons/style.css')}}">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{asset('admin/assets/css/main.css')}}">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="{{asset('admin/assets/css/demo.css')}}">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="{{asset('admin/assets/img/apple-icon.png')}}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{asset('admin/assets/img/favicon.png')}}">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>
	$(document).ready(function(){
	  $("#hide").click(function(){
	    $("p").hide();
	  });
	  $("#show").click(function(){
	    $("p").show();
	  });

	  	$(".kegiatan_radio_hasil").hide();
	  	$(".kompetisi_radio_hasil").hide();
	    $("#kegiatan_radio").click(function(){
	      $(".kegiatan_radio_hasil").show();
	      $(".kompetisi_radio_hasil").hide();
	    });

	    $("#kompetisi_radio").click(function(){
	      $(".kompetisi_radio_hasil").show();
	      $(".kegiatan_radio_hasil").hide();
	    });
	});
	</script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    	<!-- Sampai disini SCRIPT untuk autocomplete -->

</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		@include('layout.include._navbar')
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		@include('layout.include._sidebar')
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
				<!-- END MAIN -->
		@yield('content')
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">&copy; 2017 <a href="https://www.themeineed.com" target="_blank">Theme I Need</a>. All Rights Reserved.</p>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="{{asset('admin/assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('admin/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>




  <script>
    $(document).ready(function(){
    	$(".kegiatan_radio_hasil").hide();
    	$(".kompetisi_radio_hasil").hide();
      $(".kegiatan_radio").click(function(){
        $(".kegiatan_radio_hasil").show();
        $(".kompetisi_radio_hasil").hide();
      });

      $(".kompetisi_radio").click(function(){
        $(".kompetisi_radio_hasil").show();
        $(".kegiatan_radio_hasil").hide();
      });
    });
    </script>
<!-- laravel notif package -->
    {{ noty_assets() }}

    {{-- Datatables --}}
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="{{asset('js/datatables.min.js')}}"></script>
    <script type="text/javascript">
        var BASE_URL = {!! json_encode(url('/')) !!}
    </script>
    <script src="{{asset('js/main.js')}}"></script>

    @stack('scripts')
</body>
</html>
