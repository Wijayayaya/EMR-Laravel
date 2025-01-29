<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/pages-blank.html" />

	<title>@yield('title')</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

	<link href="{{asset('asset/css/app.css')}}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="{{route('dashboard')}}">
          <span class="align-middle"><x-application-logo class="block justify-center h-9 w-auto fill-current text-gray-800" /></span>
        </a>

				<ul class="sidebar-nav">

					<li class="sidebar-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
						<a class="sidebar-link" href="{{route('dashboard')}}">
              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
            </a>
					</li>

					<li class="sidebar-header">
						Pasien
					</li>

					<li class="sidebar-item {{ request()->routeIs('pasien') ? 'active' : '' }}">
						<a class="sidebar-link" href="{{route('pasien')}}">
              <i class="align-middle" data-feather="plus-circle"></i> <span class="align-middle">Pasien Baru</span>
            </a>
					</li>
					<li class="sidebar-item {{ request()->routeIs('daftar.pasien') ? 'active' : '' }}">
						<a class="sidebar-link" href="{{route('daftar.pasien')}}">
              <i class="align-middle" data-feather="list"></i> <span class="align-middle">Daftar Pasien</span>
            </a>
					</li>

					<li class="sidebar-header">
						Pemeriksaan
					</li>

					<li class="sidebar-item {{ request()->routeIs('rekam.medis') ? 'active' : '' }}">
						<a class="sidebar-link" href="{{route('rekam.medis')}}">
              <i class="align-middle" data-feather="plus-circle"></i> <span class="align-middle">Rekam Medis</span>
            </a>
					</li>
					<li class="sidebar-item {{ request()->routeIs('daftar.rekammedis') ? 'active' : '' }}">
						<a class="sidebar-link" href="{{route('daftar.rekammedis')}}">
              <i class="align-middle" data-feather="list"></i> <span class="align-middle">Daftar Rekam Medis</span>
            </a>
					</li>
            </a>
					</li>
				</ul>
				<!-- <form action="{{ route('dashboard') }}" class="mb-3">
        			@csrf
					<input type="submit" value="Back" class="ms-3 btn btn-danger">
				</form>	 -->
			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
          <i class="hamburger align-self-center"></i>
        </a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                <i class="align-middle" data-feather="settings"></i>
              </a>

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                                <span class="text-dark">
                    {{ Auth::user()->name }}
                </span>
              </a>
							<div class="dropdown-menu dropdown-menu-end my-2">
                                <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                     <i class="align-middle my-2" data-feather="user"></i> Profile
                                </a>
								<form method="POST" action="{{ route('logout') }}">
                    			@csrf
									<input type="submit" value="Logout" class="ms-3 btn btn-danger">
								</form>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			<main class="content">
				<div class="container-fluid p-0">

					@yield('content')

				</div>
			</main>

			<footer class="footer">
				<div class="container-fluid">
					
				</div>
			</footer>
		</div>
	</div>

	<script src="{{asset('asset/js/app.js')}}"></script>

</body>

</html> 