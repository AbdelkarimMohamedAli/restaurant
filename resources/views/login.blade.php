<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
	<meta charset="utf-8">
	<title>@yield('title')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	
	<!-- ================== BEGIN core-css ================== -->
	<link href="assets/css/vendor.min.css" rel="stylesheet">
	<link href="assets/css/app.min.css" rel="stylesheet">
	<!-- ================== END core-css ================== -->
	
	<!-- ================== BEGIN page-css ================== -->
	<link href="assets/plugins/jvectormap-next/jquery-jvectormap.css" rel="stylesheet">
	<!-- ================== END page-css ================== -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600&display=swap" rel="stylesheet">

    <style>
        *{
            font-family: 'Cairo', sans-serif;
        }
        .btn-block {
			display: block;
			width: 100%;
		}
    </style>
	
	<livewire:styles />
</head>
<body>
    @livewire('login');
	@extends('components.theme-panal');
<!-- ================== BEGIN core-js ================== -->

<script src="assets/js/vendor.min.js"></script>
<script src="assets/js/app.min.js"></script>
<!-- ================== END core-js ================== -->

<!-- ================== BEGIN page-js ================== -->
<script src="assets/plugins/jvectormap-next/jquery-jvectormap.min.js"></script>
<script src="assets/plugins/jvectormap-content/world-mill.js"></script>
<script src="assets/plugins/apexcharts/dist/apexcharts.min.js"></script>
<script src="assets/js/demo/dashboard.demo.js"></script>
<script
  src="https://code.jquery.com/jquery-3.7.0.min.js"
  integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g="
  crossorigin="anonymous"></script>
<!-- ================== END page-js ================== -->
<livewire:scripts />
@stack('modals')
<script>
	window.addEventListener('show-form',event=>{
		$(event.detail.modalId).modal(event.detail.actionModal)
	})
	window.addEventListener('collapse',event=>{
		$(event.detail.modalId).collapse(event.detail.actionModal)
	})
</script>
</body>
</html>