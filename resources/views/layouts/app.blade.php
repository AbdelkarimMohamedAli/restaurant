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
	<link href="assets/plugins/summernote/dist/summernote-lite.css" rel="stylesheet">
	<link href="assets/plugins/blueimp-file-upload/css/jquery.fileupload.css" rel="stylesheet">
	<link href="assets/plugins/tag-it/css/jquery.tagit.css" rel="stylesheet">
	<!-- ================== BEGIN page-css ================== -->
	<link href="assets/plugins/jvectormap-next/jquery-jvectormap.css" rel="stylesheet">
	<!-- ================== END page-css ================== -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600&display=swap" rel="stylesheet">
	
	<link rel="stylesheet" href="assets/select2/css/select2.min.css">
    <style>
        *{font-family: 'Cairo', sans-serif;}
        .btn-block {display: block;width: 100%;}
		.trans{transition: all 0.5s ease-in-out;}
		.addon-select-o{transition: all 0.3s ease-in-out;height: auto;transform: scaleY(1);}
		.addon-select-c{transition: all 0.3s ease-in-out;height: 0;transform: scaleY(0);}
		.pointer{
			cursor: pointer;
		}
    </style>
	
	<livewire:styles />
</head>
<body>
	<div id="app" class="app">
		<!-- BEGIN #header -->
		<div id="header" class="app-header">
			@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
			<!-- BEGIN desktop-toggler -->
			<div class="desktop-toggler">
				<button type="button" class="menu-toggler" data-toggle-class="app-sidebar-collapsed" data-dismiss-class="app-sidebar-toggled" data-toggle-target=".app">
					<span class="bar"></span>
					<span class="bar"></span>
					<span class="bar"></span>
				</button>
			</div>
			<!-- BEGIN desktop-toggler -->
			
			<!-- BEGIN mobile-toggler -->
			<div class="mobile-toggler">
				<button type="button" class="menu-toggler" data-toggle-class="app-sidebar-mobile-toggled" data-toggle-target=".app">
					<span class="bar"></span>
					<span class="bar"></span>
					<span class="bar"></span>
				</button>
			</div>
			<!-- END mobile-toggler -->
			
			
			
			<!-- BEGIN brand -->
			<div class="brand">
				<a href="" class="brand-logo">
					<span class="brand-img">
						<span class="brand-img-text text-theme">H</span>
					</span>
					<span class="brand-text">HUD ADMIN</span>
				</a>
			</div>
			<!-- END brand -->
			
			<!-- BEGIN menu -->
			<div class="menu">
				<div class="menu-item dropdown">
					<a href="#" data-toggle-class="app-header-menu-search-toggled" data-toggle-target=".app" class="menu-link">
						<div class="menu-icon"><i class="bi bi-search nav-icon"></i></div>
					</a>
				</div>
				<div class="menu-item dropdown dropdown-mobile-full">
					<a href="#" data-bs-toggle="dropdown" data-bs-display="static" class="menu-link">
						<div class="menu-icon"><i class="bi bi-grid-3x3-gap nav-icon"></i></div>
					</a>
					<div class="dropdown-menu fade dropdown-menu-end w-300px text-center p-0 mt-1">
						<div class="row row-grid gx-0">
							<div class="col-4">
								<a href="#" class="dropdown-item text-decoration-none p-3 bg-none">
									<div class="position-relative">
										<i class="bi bi-circle-fill position-absolute text-theme top-0 mt-n2 me-n2 fs-6px d-block text-center w-100"></i>
										<i class="bi bi-envelope h2 opacity-5 d-block my-1"></i>
									</div>
									<div class="fw-500 fs-10px text-inverse">INBOX</div>
								</a>
							</div>
							<div class="col-4">
								<a href="#" target="_blank" class="dropdown-item text-decoration-none p-3 bg-none">
									<div><i class="bi bi-hdd-network h2 opacity-5 d-block my-1"></i></div>
									<div class="fw-500 fs-10px text-inverse">POS SYSTEM</div>
								</a>
							</div>
							<div class="col-4">
								<a href="#" class="dropdown-item text-decoration-none p-3 bg-none">
									<div><i class="bi bi-calendar4 h2 opacity-5 d-block my-1"></i></div>
									<div class="fw-500 fs-10px text-inverse">CALENDAR</div>
								</a>
							</div>
						</div>
						<div class="row row-grid gx-0">
							<div class="col-4">
								<a href="#" class="dropdown-item text-decoration-none p-3 bg-none">
									<div><i class="bi bi-terminal h2 opacity-5 d-block my-1"></i></div>
									<div class="fw-500 fs-10px text-inverse">HELPER</div>
								</a>
							</div>
							<div class="col-4">
								<a href="#" class="dropdown-item text-decoration-none p-3 bg-none">
									<div class="position-relative">
										<i class="bi bi-circle-fill position-absolute text-theme top-0 mt-n2 me-n2 fs-6px d-block text-center w-100"></i>
										<i class="bi bi-sliders h2 opacity-5 d-block my-1"></i>
									</div>
									<div class="fw-500 fs-10px text-inverse">SETTINGS</div>
								</a>
							</div>
							<div class="col-4">
								<a href="#" class="dropdown-item text-decoration-none p-3 bg-none">
									<div><i class="bi bi-collection-play h2 opacity-5 d-block my-1"></i></div>
									<div class="fw-500 fs-10px text-inverse">WIDGETS</div>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="menu-item dropdown dropdown-mobile-full">
					<a href="#" data-bs-toggle="dropdown" data-bs-display="static" class="menu-link">
						<div class="menu-icon"><i class="bi bi-bell nav-icon"></i></div>
						<div class="menu-badge bg-theme"></div>
					</a>
					<div class="dropdown-menu dropdown-menu-end mt-1 w-300px fs-11px pt-1">
						<h6 class="dropdown-header fs-10px mb-1">NOTIFICATIONS</h6>
						<div class="dropdown-divider mt-1"></div>
						<a href="#" class="d-flex align-items-center py-10px dropdown-item text-wrap fw-semibold">
							<div class="fs-20px">
								<i class="bi bi-bag text-theme"></i>
							</div>
							<div class="flex-1 flex-wrap ps-3">
								<div class="mb-1 text-inverse">NEW ORDER RECEIVED ($1,299)</div>
								<div class="small text-inverse text-opacity-50">JUST NOW</div>
							</div>
							<div class="ps-2 fs-16px">
								<i class="bi bi-chevron-right"></i>
							</div>
						</a>
						<a href="#" class="d-flex align-items-center py-10px dropdown-item text-wrap fw-semibold">
							<div class="fs-20px w-20px">
								<i class="bi bi-person-circle text-theme"></i>
							</div>
							<div class="flex-1 flex-wrap ps-3">
								<div class="mb-1 text-inverse">3 NEW ACCOUNT CREATED</div>
								<div class="small text-inverse text-opacity-50">2 MINUTES AGO</div>
							</div>
							<div class="ps-2 fs-16px">
								<i class="bi bi-chevron-right"></i>
							</div>
						</a>
						<a href="#" class="d-flex align-items-center py-10px dropdown-item text-wrap fw-semibold">
							<div class="fs-20px w-20px">
								<i class="bi bi-gear text-theme"></i>
							</div>
							<div class="flex-1 flex-wrap ps-3">
								<div class="mb-1 text-inverse">SETUP COMPLETED</div>
								<div class="small text-inverse text-opacity-50">3 MINUTES AGO</div>
							</div>
							<div class="ps-2 fs-16px">
								<i class="bi bi-chevron-right"></i>
							</div>
						</a>
						<a href="#" class="d-flex align-items-center py-10px dropdown-item text-wrap fw-semibold">
							<div class="fs-20px w-20px">
								<i class="bi bi-grid text-theme"></i>
							</div>
							<div class="flex-1 flex-wrap ps-3">
								<div class="mb-1 text-inverse">WIDGET INSTALLATION DONE</div>
								<div class="small text-inverse text-opacity-50">5 MINUTES AGO</div>
							</div>
							<div class="ps-2 fs-16px">
								<i class="bi bi-chevron-right"></i>
							</div>
						</a>
						<a href="#" class="d-flex align-items-center py-10px dropdown-item text-wrap fw-semibold">
							<div class="fs-20px w-20px">
								<i class="bi bi-credit-card text-theme"></i>
							</div>
							<div class="flex-1 flex-wrap ps-3">
								<div class="mb-1 text-inverse">PAYMENT METHOD ENABLED</div>
								<div class="small text-inverse text-opacity-50">10 MINUTES AGO</div>
							</div>
							<div class="ps-2 fs-16px">
								<i class="bi bi-chevron-right"></i>
							</div>
						</a>
						<hr class="my-0">
						<div class="py-10px mb-n2 text-center">
							<a href="#" class="text-decoration-none fw-bold">SEE ALL</a>
						</div>
					</div>
				</div>
				
					
				@guest
					
				@endguest
				<div class="menu-item dropdown dropdown-mobile-full">
					<a href="#" data-bs-toggle="dropdown" data-bs-display="static" class="menu-link">
						<div class="menu-img online">
							<img src="assets/img/user/profile.jpg" alt="Profile" height="60">
						</div>
						<div class="menu-text d-sm-block d-none w-170px">{{Auth::user()->email}}</div>
					</a>
					<div class="dropdown-menu dropdown-menu-end me-lg-3 fs-11px mt-1">
						<a class="dropdown-item d-flex align-items-center" href="profile.html">PROFILE <i class="bi bi-person-circle ms-auto text-theme fs-16px my-n1"></i></a>
						<a class="dropdown-item d-flex align-items-center" href="email_inbox.html">INBOX <i class="bi bi-envelope ms-auto text-theme fs-16px my-n1"></i></a>
						<a class="dropdown-item d-flex align-items-center" href="calendar.html">CALENDAR <i class="bi bi-calendar ms-auto text-theme fs-16px my-n1"></i></a>
						<a class="dropdown-item d-flex align-items-center" href="settings.html">SETTINGS <i class="bi bi-gear ms-auto text-theme fs-16px my-n1"></i></a>
						<div class="dropdown-divider"></div>
						<livewire:logout />
					</div>
				</div>
			</div>
			<!-- END menu -->
			
			<!-- BEGIN menu-search -->
			<form class="menu-search" method="POST" name="header_search_form">
				<div class="menu-search-container">
					<div class="menu-search-icon"><i class="bi bi-search"></i></div>
					<div class="menu-search-input">
						<input type="text" class="form-control form-control-lg" placeholder="Search menu...">
					</div>
					<div class="menu-search-icon">
						<a href="#" data-toggle-class="app-header-menu-search-toggled" data-toggle-target=".app"><i class="bi bi-x-lg"></i></a>
					</div>
				</div>
			</form>
			<!-- END menu-search -->
		</div>
		<!-- BEGIN #sidebar -->
		<div id="sidebar" class="app-sidebar">
			<!-- BEGIN scrollbar -->
			<div class="app-sidebar-content" data-scrollbar="true" data-height="100%">
				<!-- BEGIN menu -->
				<div class="menu">
					<div class="menu-header">Navigation</div>
					<div class="menu-item {{(request()->routeIs('')) ? 'active' :''}}" >
						<a href="/" class="menu-link">
							<span class="menu-icon"><i class="bi bi-cpu"></i></span>
							<span class="menu-text">لوحة التحكم</span>
						</a>
					</div>
					<div class="menu-item ">
						<a href="#" class="menu-link "">
							<span class="menu-icon"><i class="bi bi-bar-chart"></i></span>
							<span class="menu-text">تحليل بيانات</span>
						</a>
					</div>
					<div class="menu-header">Components</div>
					<div class="menu-item has-sub">
						<a href="javascript:;" class="menu-link">
							<div class="menu-icon">
								<i class="bi bi-bag-check"></i>
								<span class="w-5px h-5px rounded-3 bg-theme position-absolute top-0 end-0 mt-3px me-3px"></span>
							</div>
							<div class="menu-text d-flex align-items-center">المبيعات</div> 
							<span class="menu-caret"><b class="caret"></b></span>
						</a>
						<div class="menu-submenu">
							<div class="menu-item">
								<a href="#" class="menu-link">
									<div class="menu-text">نقطة بيع الكاشير</div>
								</a>
							</div>
							<div class="menu-item">
								<a href="#" class="menu-link">
									<div class="menu-text">نقطة بيع النادل</div>
								</a>
							</div>
							<div class="menu-item">
								<a href="#"  class="menu-link">
									<div class="menu-text">الطلبات</div>
								</a>
							</div>
						</div>
					</div>
					<div class="menu-divider"></div>
					<div class="menu-header">ادارة الاصناف</div>
					<div class="menu-item has-sub {{(request()->routeIs('items')) ? 'active' :''}}">
						<a href="javascript:;" class="menu-link">
							<span class="menu-icon"><i class="bi bi-columns-gap"></i></span>
							<div class="menu-text">الاصناف</div>
							<span class="menu-caret"><b class="caret"></b></span>
						</a>
						<div class="menu-submenu">
							<div class="menu-item">
								<a href="items" class="menu-link">
									<div class="menu-text">قائمة الاصناف</div>
								</a>
							</div>
							<div class="menu-item">
								<a href="#" class="menu-link">
									<div class="menu-text">Bulk import</div>
								</a>
							</div>
							<div class="menu-item">
								<a href="#" class="menu-link">
									<div class="menu-text">Bulk export</div>
								</a>
							</div>
						</div>
					</div>
					<div class="menu-item {{(request()->routeIs('categories')) ? 'active' :''}}">
						<a href="/categories" class="menu-link">
							<span class="menu-icon"><i class="bi bi-diagram-3"></i></span>
							<div class="menu-text">الاقسام</div>
						</a>
					</div>
					<div class="menu-item has-sub {{(request()->routeIs('material')) ? 'active' :''}} {{(request()->routeIs('units')) ? 'active' :''}}">
						<a href="#" class="menu-link">
							<span class="menu-icon "><i class="bi bi-basket3"></i></span>
							<div class="menu-text">الخامات</div>
							<span class="menu-caret"><b class="caret"></b></span>
						</a>
						<div class="menu-submenu">
							<div class="menu-item">
								<a href="/material"  class="menu-link">
									<div class="menu-text">قائمة الخامات</div>
								</a>
							</div>
							<div class="menu-item">
								<a href="/units" class="menu-link">
									<div class="menu-text">الوحدات</div>
								</a>
							</div>
						</div>
					</div>
					<div class="menu-item {{(request()->routeIs('addons')) ? 'active' :''}}">
						<a href="/addons" class="menu-link">
							<span class="menu-icon"><i class="bi bi-bag-plus-fill"></i></span>
							<div class="menu-text">الاضافات</div>
						</a>
					</div>
					<div class="menu-divider"></div>
					<div class="menu-header">الطاولات</div>
					<div class="menu-item {{(request()->routeIs('tables')) ? 'active' :''}}">
						<a href="/tables" class="menu-link">
							<span class="menu-icon"><i class="bi bi-grid-3x3"></i></span>
							<div class="menu-text">قائمة الطاولات</div>
						</a>
					</div>
					<div class="menu-item {{(request()->routeIs('booktables')) ? 'active' :''}}">
						<a href="/booktables" class="menu-link">
							<span class="menu-icon"><i class="bi bi-grid-3x3"></i></span>
							<div class="menu-text">حجوزات الطاولات</div>
						</a>
					</div>
					<div class="menu-divider"></div>
					<div class="menu-header">المطبخ</div>
					<div class="menu-submenu">
						<div class="menu-item">
							<a href="#" class="menu-link">
								<span class="menu-icon"><i class="bi bi-basket"></i></span>
								<div class="menu-text">الطلبات</div>
							</a>
						</div>
					</div>
					
					<div class="menu-divider"></div>
					<div class="menu-header">ادارة الحسابات</div>
					<div class="menu-item">
						<a href="#" class="menu-link">
							<span class="menu-icon"><i class="bi bi-cart-plus"></i></span>
							<div class="menu-text">المشتريات</div>
						</a>
					</div>
					<div class="menu-item">
						<a href="#" class="menu-link">
							<span class="menu-icon"><i class="bi bi-building-dash"></i></span>
							<div class="menu-text">المصروفات</div>
						</a>
					</div>
					<div class="menu-item">
						<a href="#" class="menu-link">
							<span class="menu-icon"><i class="bi bi-shop"></i></span>
							<div class="menu-text">المخزون</div>
						</a>
					</div>
					<div class="menu-item">
						<a href="#" class="menu-link">
							<span class="menu-icon"><i class="bi bi-arrow-down-up"></i></span>
							<div class="menu-text">ورديات العمل</div>
						</a>
					</div>
						
					<div class="menu-divider"></div>
					<div class="menu-header">ادارة التوصيل</div>
					<div class="menu-item">
						<a href="#" class="menu-link">
							<span class="menu-icon"><i class="bi bi-bicycle"></i></span>
							<div class="menu-text">مندوب توصيل</div>
						</a>
					</div>
					<div class="menu-item">
						<a href="#" class="menu-link">
							<span class="menu-icon"><i class="bi bi-geo-alt"></i></span>
							<div class="menu-text">مناطق توصيل</div>
						</a>
					</div>
						
					<div class="menu-divider"></div>
					<div class="menu-header">ادارة المستخدمين</div>
					<div class="menu-item">
						<a href="#" class="menu-link">
							<span class="menu-icon"><i class="bi bi-menu-down"></i></span>
							<div class="menu-text">الادوار</div>
						</a>
					</div>
					<div class="menu-item">
						<a href="/users" class="menu-link">
							<span class="menu-icon"><i class="bi bi-people"></i></span>
							<div class="menu-text">المستخدمين</div>
						</a>
					</div>
					<div class="menu-item">
						<a href="#" class="menu-link">
							<span class="menu-icon"><i class="bi bi-people"></i></span>
							<div class="menu-text">العملاء</div>
						</a>
					</div>
					<div class="menu-divider"></div>
					<div class="menu-header">التقارير</div>
					
					<div class="menu-item">
						<a href="#" class="menu-link">
							<span class="menu-icon"><i class="bi bi-file-text"></i></span>
							<div class="menu-text">تقرير المخزون</div>
						</a>
					</div>
					<div class="menu-item">
						<a href="#" class="menu-link">
							<span class="menu-icon"><i class="bi bi-file-text"></i></span>
							<div class="menu-text">تقرير المبيعات</div>
						</a>
					</div>
					<div class="menu-item">
						<a href="#" class="menu-link">
							<span class="menu-icon"><i class="bi bi-file-text"></i></span>
							<div class="menu-text">تقرير المشتريات</div>
						</a>
					</div>
					<div class="menu-item">
						<a href="#" class="menu-link">
							<span class="menu-icon"><i class="bi bi-file-text"></i></span>
							<div class="menu-text">تقرير العملاء الاكثر طلبا</div>
						</a>
					</div>
					<div class="menu-item">
						<a href="#" class="menu-link">
							<span class="menu-icon"><i class="bi bi-file-text"></i></span>
							<div class="menu-text">تقرير الربح والخساره</div>
						</a>
					</div>
					<div class="menu-item">
						<a href="#" class="menu-link">
							<span class="menu-icon"><i class="bi bi-file-text"></i></span>
							<div class="menu-text">تقرير المصروفات</div>
						</a>
					</div>
					<div class="menu-item">
						<a href="#" class="menu-link">
							<span class="menu-icon"><i class="bi bi-file-text"></i></span>
							<div class="menu-text">تقرير المنتجات الاكثر مبيعا</div>
						</a>
					</div>
					<div class="menu-item">
						<a href="#" class="menu-link">
							<span class="menu-icon"><i class="bi bi-file-text"></i></span>
							<div class="menu-text">سجل النشاطات</div>
						</a>
					</div>
					<div class="menu-divider"></div>
					<div class="menu-item">
						<a href="#" class="menu-link">
							<span class="menu-icon"><i class="bi bi-gear"></i></span>
							<span class="menu-text">الاعدادات</span>
						</a>
					</div>
				</div>
				<!-- END menu -->
			</div>
			<!-- END scrollbar -->
		</div>
		
		<!-- BEGIN mobile-sidebar-backdrop -->
		<button class="app-sidebar-mobile-backdrop" data-toggle-target=".app" data-toggle-class="app-sidebar-mobile-toggled"></button>
		<!-- END mobile-sidebar-backdrop -->
		<div id="content" class="app-content">
			{{ $slot}}
		</div>
		@extends('components.theme-panal')
		<!-- BEGIN btn-scroll-top -->
		<a href="#" data-toggle="scroll-to-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>
		<!-- END btn-scroll-top -->
	</div>
<!-- ================== BEGIN core-js ================== -->

	<!-- ================== BEGIN core-js ================== -->
	<script src="assets/js/vendor.min.js"></script>
	<script src="assets/js/app.min.js"></script>
	<!-- ================== END core-js ================== -->
	
	<!-- ================== BEGIN page-js ================== -->
	<script src="assets/plugins/jvectormap-next/jquery-jvectormap.min.js"></script>
	<script src="assets/plugins/jvectormap-content/world-mill.js"></script>
	<script src="assets/plugins/apexcharts/dist/apexcharts.min.js"></script>
	<script src="assets/js/demo/dashboard.demo.js"></script>
	<script src="assets/select2/js/jquery.js"></script>
	<script src="assets/select2/js/select2.min.js"></script>

<!-- ================== END page-js ================== -->
<livewire:scripts />
@stack('scripts')
<script >
	window.addEventListener('show-form',event=>{
		$(event.detail.modalId).modal(event.detail.actionModal)
	})
	window.addEventListener('collapsed',event=>{
		$(event.detail.modalId).collapse(event.detail.actionModal)
	})
	
	window.addEventListener('dropdown',event=>{
		$(event.detail.modalId).dropdown(event.detail.actionModal)
	})
	$(document).ready(function() {
    $('.js-example-basic-single').select2();
	});
	
	
	
</script>
</body>
</html>