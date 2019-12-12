<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	
	<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ __(config('app.name', 'Laravel')) }} - {{ __('Backend Control') }}</title>

	<!-- Scripts -->
	<script src="{{ asset('js/backend.js') }}" defer></script>

	<!-- Plugin JavaScript -->
	<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}" defer></script>
	<script src="{{ asset('vendor/chart.js/Chart.min.js') }}" defer></script>
	<script src="{{ asset('vendor/datatables/jquery.dataTables.js') }}" defer></script>
	<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.js') }}" defer></script>
	
	<!-- Custom scripts for all pages-->
	<script src="{{ asset('js/admin/sb-admin.min.js') }}" defer></script>

	<!-- Demo scripts for this page-->
	<script src="{{ asset('js/admin/demo/datatables-demo.js') }}" defer></script>
	<script src="{{ asset('js/admin/demo/chart-area-demo.js') }}" defer></script>

	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet" type='text/css'>
	<link href="{{ asset('vendor/fontawesome/css/all.min.css') }}" rel="stylesheet" type='text/css'>

	<!-- Page level plugin CSS-->
	<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="{{ asset('css/backend.css') }}" rel="stylesheet">

</head>
<body id="page-top">
	@include('partials.backend.navbar')
	  
	<div id="wrapper">
		@include('partials.backend.sidebar')
		
    	<div id="content-wrapper">

			<div id="backend" class="container-fluid">
            	@yield('content')
			</div>

			@include('partials.backend.footer')
		</div>
		
  	</div>

	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>
</body>
</html>