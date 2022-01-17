<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Atlantis Bootstrap 4 Admin Dashboard</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../assets/img/icon.ico" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="{{ asset('assets/js/plugin/webfont/webfont.min.js') }}"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: [ '/assets/css/fonts.min.css' ]},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/atlantis2.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}">

    
</head>
<body>
	<div class="wrapper horizontal-layout-2">
		
		<div class="main-header" data-background-color="light-blue2">
			<div class="nav-top">
				<div class="container d-flex flex-row">
					<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon">
							<i class="icon-menu"></i>
						</span>
					</button>
					<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
					<!-- Logo Header -->
					<a href="index.html" class="logo d-flex align-items-center">
						<h2 class="text-white">POINT OF SALES</h2>
					</a>
					<!-- End Logo Header -->

					<!-- Navbar Header -->
					<nav class="navbar navbar-header navbar-expand-lg p-0">

						<div class="container-fluid p-0">
							<div class="collapse" id="search-nav">
								<form class="navbar-left navbar-form nav-search ml-md-3">
									<div class="input-group">
										<div class="input-group-prepend">
											<button type="submit" class="btn btn-search pr-1">
												<i class="fa fa-search search-icon"></i>
											</button>
										</div>
										<input type="text" placeholder="Search ..." class="form-control">
									</div>
								</form>
							</div>
							<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
								<li class="nav-item toggle-nav-search hidden-caret">
									<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
										<i class="fa fa-search"></i>
									</a>
								</li>
								<li class="nav-item dropdown hidden-caret">
									<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
										<div class="avatar-sm">
											<img src="../assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
										</div>
									</a>
									<ul class="dropdown-menu dropdown-user animated fadeIn">
										<div class="dropdown-user-scroll scrollbar-outer">
											<li>
												<div class="user-box">
													<div class="avatar-lg"><img src="../assets/img/profile.jpg" alt="image profile" class="avatar-img rounded"></div>
													<div class="u-text">
														<h4>Hizrian</h4>
														<p class="text-muted">hello@example.com</p>
													</div>
												</div>
											</li>
											<li>
												<div class="dropdown-divider"></div>
												<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
												<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
													@csrf
												</form>
											</li>
										</div>
									</ul>
								</li>
							</ul>
						</div>
					</nav>
					<!-- End Navbar -->
				</div>
			</div>
			<div class="nav-bottom">
				<div class="container">
					<h3 class="title-menu d-flex d-lg-none"> 
						Menu 
						<div class="close-menu"> <i class="flaticon-cross"></i></div>
					</h3>
					<ul class="nav page-navigation page-navigation-info bg-white">
						
						<li class="nav-item">
							<a class="nav-link" href="#">
								<i class="link-icon icon-screen-desktop"></i>
								<span class="menu-title">Dashboard</span>
							</a>
						</li>
						<li class="nav-item submenu">
							<a class="nav-link" href="#">
								<i class="link-icon icon-grid"></i>
								<span class="menu-title">Master data</span>
							</a>
							<div class="navbar-dropdown animated fadeIn">
								<ul>
									<li>
										<a href="boards.html">Boards</a>
									</li>
									<li>
										<a href="projects.html">Projects</a>
									</li>
								</ul>
							</div>
						</li>
                        <li class="nav-item submenu">
							<a class="nav-link" href="#">
								<i class="link-icon icon-grid"></i>
								<span class="menu-title">Transaksi</span>
							</a>
							<div class="navbar-dropdown animated fadeIn">
								<ul>
									<li>
										<a href="boards.html">Boards</a>
									</li>
									<li>
										<a href="projects.html">Projects</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">
								<i class="link-icon icon-pie-chart"></i>
								<span class="menu-title">Pengaturan</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>

        @yield('content')

		
		<footer class="footer">
			<div class="container">
				<div class="copyright ml-auto">
					2018, made with <i class="fa fa-heart heart text-danger"></i> by <a href="http://www.themekita.com">ThemeKita</a>
				</div>				
			</div>
		</footer>
	</div>
	<!--   Core JS Files   -->
    <script src="{{ asset('assets/js/core/jquery.3.2.1.min.js') }}"></script>
	<script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
	<script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
	<script src="{{ asset('assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>
	<script src="{{ asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
	<script src="{{ asset('assets/js/plugin/moment/moment.min.js') }}"></script>
	<script src="{{ asset('assets/js/plugin/chart.js/chart.min.js') }}"></script>
	<script src="{{ asset('assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>
	<script src="{{ asset('assets/js/plugin/chart-circle/circles.min.js') }}"></script>
	<script src="{{ asset('assets/js/plugin/datatables/datatables.min.js') }}"></script>
	<script src="{{ asset('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
	<script src="{{ asset('assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js') }}"></script>
	<script src="{{ asset('assets/js/plugin/jqvmap/jquery.vmap.min.js') }}"></script>
	<script src="{{ asset('assets/js/plugin/jqvmap/maps/jquery.vmap.world.js') }}"></script>
	<script src="{{ asset('assets/js/plugin/gmaps/gmaps.js') }}"></script>
	<script src="{{ asset('assets/js/plugin/dropzone/dropzone.min.js') }}"></script>
	<script src="{{ asset('assets/js/plugin/fullcalendar/fullcalendar.min.js') }}"></script>
	<script src="{{ asset('assets/js/plugin/datepicker/bootstrap-datetimepicker.min.js') }}"></script>
	<script src="{{ asset('assets/js/plugin/bootstrap-tagsinput/bootstrap-tagsinput.min.js') }}"></script>
	<script src="{{ asset('assets/js/plugin/bootstrap-wizard/bootstrapwizard.js') }}"></script>
	<script src="{{ asset('assets/js/plugin/jquery.validate/jquery.validate.min.js') }}"></script>
	<script src="{{ asset('assets/js/plugin/summernote/summernote-bs4.min.js') }}"></script>
	<script src="{{ asset('assets/js/plugin/select2/select2.full.min.js') }}"></script>
	<script src="{{ asset('assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>
	<script src="{{ asset('assets/js/atlantis2.min.js') }}"></script>
    @stack('scripts')
    @include('sweet::alert')
    <script>
        $(document).ready(function() {
			$('#basic-datatables').DataTable({
				"scrollX": true
			});

			$('#select2').select2({
				theme: "bootstrap"
			});
			$('#datepicker').datetimepicker({
				format: 'DD/MM/YYYY',
			});
        });
		
    </script>
</body>
</html>