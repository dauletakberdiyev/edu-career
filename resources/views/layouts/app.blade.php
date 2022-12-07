<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
		@yield('meta')
		<title>Betacareer</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<link href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" rel="stylesheet">

		<link rel="stylesheet" href="{{ asset('css/style.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/buttons.datatables.min.css') }}">
		<link rel="stylesheet" href="{{ asset('cdn/dataTables.bootstrap4.min.css') }}">
		

		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

		@yield('styles')
	</head>
	<body>
		@php 
		$user = Auth::user();
		@endphp
		<div id="app">
			<div class="all">
				<!-- Header -->
				<header class="header">
					<div class="container-fluid">
						<nav class="header__menu">
							<div class="burger" onclick="openSidebar()">
								<span class="bar"></span>
								<span class="bar"></span>
								<span class="bar"></span>
							</div>
							<a href="#" class="header__logo">
							<img src="{{ asset('/images/header/logo_beta.png') }}" alt="logo_beta">
							</a>
							<div class="menu__right">
								<button class="menu__notification">
									<svg class="MuiSvgIcon-root MuiSvgIcon-fontSizeSmall css-ptiqhd-MuiSvgIcon-root" focusable="false" viewBox="0 0 24 24" aria-hidden="true" data-testid="BellIcon">
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="white">
											<path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"></path>
										</svg>
									</svg>
								</button>
								<button class="menu__ava" onclick="openInfo(this)">
								<img src="{{ $user->avatar }}" alt="">
								</button>
								<div class="ava__info" id="ava">
									<div class="profile__info">
										<h6 class="info__name">{{ $user->firstname }} {{ $user->lastname }}</h6>
										<span class="info__status">{{ $user->role }}</span>
									</div>
									<hr>
									<ul class="ava__list">
										<li class="ava__item">
											<a href="{{ route('profile') }}" class="ava__link">
												<span class="link__svg">
													<svg class="MuiSvgIcon-root MuiSvgIcon-fontSizeSmall css-ptiqhd-MuiSvgIcon-root" focusable="false" viewBox="0 0 24 24" aria-hidden="true" data-testid="UserIcon">
														<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
															<path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
														</svg>
													</svg>
												</span>
												Profile
											</a>
										</li>
										<li class="ava__item">
											<a href="{{ route('profile.edit') }}" class="ava__link">
												<span class="link__svg">
													<svg class="MuiSvgIcon-root MuiSvgIcon-fontSizeSmall css-ptiqhd-MuiSvgIcon-root" focusable="false" viewBox="0 0 24 24" aria-hidden="true" data-testid="CogIcon">
														<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
															<path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path>
														</svg>
													</svg>
												</span>
												Edit Profile
											</a>
										</li>
									</ul>
									<div class="ava__btn">
										<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
										Logout
										</a>    
										<form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
											{{ csrf_field() }}
										</form>
									</div>
								</div>
							</div>
						</nav>
						<!-- Header menu -->
					</div>
					<!-- /.container -->
				</header>
				<!-- End Header -->
				<!-- Sidebar -->
				<div class="sidebar">
					<div class="sidebar__profile">
						<a href="#" class="profile__img">
						<img src="{{ $user->avatar }}" alt="profile_picture">
						</a>
						<div class="profile__info">
							<h6 class="info__name">{{ $user->firstname }} {{ $user->lastname }}</h6>
							<span class="info__status">{{ $user->role }}</span>
						</div>
					</div>
					<!--  SideBar profile  -->
					<hr>
					<ul class="sidebar__menu">
						<li class="sidebar__item">
							<a class="sidebar__link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
								<span class="link__svg">
									<svg id="unig-svg-home" class="MuiSvgIcon-root MuiSvgIcon-fontSizeSmall css-ptiqhd-MuiSvgIcon-root" focusable="false" viewBox="0 3 21 20" aria-hidden="true">
										<path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"></path>
									</svg>
								</span>
								Home
							</a>
						</li>
						<li class="sidebar__item">
							<a class="sidebar__link {{ request()->routeIs('profile') ? 'active' : '' }}" href="{{ route('profile.edit') }}">
								<span class="link__svg">
									<svg class="MuiSvgIcon-root MuiSvgIcon-fontSizeSmall css-ptiqhd-MuiSvgIcon-root" focusable="false" viewBox="0 0 24 24" aria-hidden="true" data-testid="CogIcon">
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
											<path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path>
										</svg>
									</svg>
								</span>
								Edit Profile
							</a>
						</li>
						@role('student')
						<li class="sidebar__item">
							<a class="sidebar__link {{ request()->routeIs('report') ? 'active' : '' }}" href="{{ route('report.submit') }}">
								<span class="link__svg">
									<svg class="MuiSvgIcon-root MuiSvgIcon-fontSizeSmall css-ptiqhd-MuiSvgIcon-root" focusable="false" viewBox="0 0 24 24" aria-hidden="true" data-testid="CogIcon">
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
											<path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path>
										</svg>
									</svg>
								</span>
								Submit report
							</a>
						</li>
						<li class="sidebar__item">
							<a href="{{ route('grade.index') }}" class="sidebar__link">
									<span class="link__svg">
										<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
											<polyline points="9 11 12 14 22 4"></polyline>
											<path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
										</svg>
									</span>
								Grades
							</a>
						</li>
						@endrole
						@role('admin|coordinator|company')
						<li class="sidebar__item">
							<a href="{{ route('grade.all') }}" class="sidebar__link">
									<span class="link__svg">
										<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
											<polyline points="9 11 12 14 22 4"></polyline>
											<path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
										</svg>
									</span>
								Grades
							</a>
						</li>
						@endrole
						@role('admin')
						<li class="sidebar__item">
							<a class="sidebar__link {{ request()->routeIs(['staff', 'staff.*']) ? 'active' : '' }}" href="{{ route('staff') }}">
								<span class="link__svg">
									<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="80.13px" height="80.13px" viewBox="0 0 80.13 80.13" style="enable-background:new 0 0 80.13 80.13;" xml:space="preserve" fill="currentColor">
										<g>
											<path d="M48.355,17.922c3.705,2.323,6.303,6.254,6.776,10.817c1.511,0.706,3.188,1.112,4.966,1.112
												c6.491,0,11.752-5.261,11.752-11.751c0-6.491-5.261-11.752-11.752-11.752C53.668,6.35,48.453,11.517,48.355,17.922z M40.656,41.984
												c6.491,0,11.752-5.262,11.752-11.752s-5.262-11.751-11.752-11.751c-6.49,0-11.754,5.262-11.754,11.752S34.166,41.984,40.656,41.984
												z M45.641,42.785h-9.972c-8.297,0-15.047,6.751-15.047,15.048v12.195l0.031,0.191l0.84,0.263
												c7.918,2.474,14.797,3.299,20.459,3.299c11.059,0,17.469-3.153,17.864-3.354l0.785-0.397h0.084V57.833
												C60.688,49.536,53.938,42.785,45.641,42.785z M65.084,30.653h-9.895c-0.107,3.959-1.797,7.524-4.47,10.088
												c7.375,2.193,12.771,9.032,12.771,17.11v3.758c9.77-0.358,15.4-3.127,15.771-3.313l0.785-0.398h0.084V45.699
												C80.13,37.403,73.38,30.653,65.084,30.653z M20.035,29.853c2.299,0,4.438-0.671,6.25-1.814c0.576-3.757,2.59-7.04,5.467-9.276
												c0.012-0.22,0.033-0.438,0.033-0.66c0-6.491-5.262-11.752-11.75-11.752c-6.492,0-11.752,5.261-11.752,11.752
												C8.283,24.591,13.543,29.853,20.035,29.853z M30.589,40.741c-2.66-2.551-4.344-6.097-4.467-10.032
												c-0.367-0.027-0.73-0.056-1.104-0.056h-9.971C6.75,30.653,0,37.403,0,45.699v12.197l0.031,0.188l0.84,0.265
												c6.352,1.983,12.021,2.897,16.945,3.185v-3.683C17.818,49.773,23.212,42.936,30.589,40.741z"></path>
										</g>
									</svg>
								</span>
								Manage staff
							</a>
						</li>
						<li class="sidebar__item">
							<a href="{{ route('term.edit') }}" class="sidebar__link">
								<span class="link__svg">
									<svg height="512pt" viewBox="0 -20 512 512" width="512pt" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
										<path d="m119 161c-22.054688 0-40 17.945312-40 40v151c0 22.054688 17.945312 40 40 40h76c22.054688 0 40-17.945312 40-40v-151c0-22.054688-17.945312-40-40-40zm76 191h-76v-151h76l.023438 151s-.003907 0-.023438 0zm236-75c0 11.046875-8.953125 20-20 20h-116c-11.046875 0-20-8.953125-20-20s8.953125-20 20-20h116c11.046875 0 20 8.953125 20 20zm0 76c0 11.046875-8.953125 20-20 20h-116c-11.046875 0-20-8.953125-20-20s8.953125-20 20-20h116c11.046875 0 20 8.953125 20 20zm0-152c0 11.046875-8.953125 20-20 20h-116c-11.046875 0-20-8.953125-20-20s8.953125-20 20-20h116c11.046875 0 20 8.953125 20 20zm21-201h-392c-33.085938 0-60 26.914062-60 60v332c0 44.113281 35.886719 80 80 80h352c44.113281 0 80-35.886719 80-80 0-11.046875-8.953125-20-20-20s-20 8.953125-20 20c0 22.054688-17.945312 40-40 40h-352c-22.054688 0-40-17.945312-40-40v-271h432v171c0 11.046875 8.953125 20 20 20s20-8.953125 20-20v-232c0-33.085938-26.914062-60-60-60zm-81 40c11.027344 0 20 8.972656 20 20s-8.972656 20-20 20-20-8.972656-20-20 8.972656-20 20-20zm100 20c0 11.027344-8.972656 20-20 20s-20-8.972656-20-20 8.972656-20 20-20 20 8.972656 20 20zm-431 0c0-11.027344 8.972656-20 20-20h254.441406c-2.222656 6.261719-3.441406 12.988281-3.441406 20 0 7.386719 1.347656 14.460938 3.800781 21h-274.800781zm0 0"></path>
									</svg>
								</span>
								Term settings
							</a>
						</li>
						<li class="sidebar__item">
							<a href="{{ route('report') }}" class="sidebar__link">
								<span class="link__svg">
									
								</span>
								Manage reports
							</a>
						</li>
						@endrole
						@role('admin|coordinator')
						<li class="sidebar__item">
							<a href="{{ route('registration.manage') }}" class="sidebar__link">
								<span class="link__svg">
									<svg height="512pt" viewBox="0 -20 512 512" width="512pt" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
										<path d="m119 161c-22.054688 0-40 17.945312-40 40v151c0 22.054688 17.945312 40 40 40h76c22.054688 0 40-17.945312 40-40v-151c0-22.054688-17.945312-40-40-40zm76 191h-76v-151h76l.023438 151s-.003907 0-.023438 0zm236-75c0 11.046875-8.953125 20-20 20h-116c-11.046875 0-20-8.953125-20-20s8.953125-20 20-20h116c11.046875 0 20 8.953125 20 20zm0 76c0 11.046875-8.953125 20-20 20h-116c-11.046875 0-20-8.953125-20-20s8.953125-20 20-20h116c11.046875 0 20 8.953125 20 20zm0-152c0 11.046875-8.953125 20-20 20h-116c-11.046875 0-20-8.953125-20-20s8.953125-20 20-20h116c11.046875 0 20 8.953125 20 20zm21-201h-392c-33.085938 0-60 26.914062-60 60v332c0 44.113281 35.886719 80 80 80h352c44.113281 0 80-35.886719 80-80 0-11.046875-8.953125-20-20-20s-20 8.953125-20 20c0 22.054688-17.945312 40-40 40h-352c-22.054688 0-40-17.945312-40-40v-271h432v171c0 11.046875 8.953125 20 20 20s20-8.953125 20-20v-232c0-33.085938-26.914062-60-60-60zm-81 40c11.027344 0 20 8.972656 20 20s-8.972656 20-20 20-20-8.972656-20-20 8.972656-20 20-20zm100 20c0 11.027344-8.972656 20-20 20s-20-8.972656-20-20 8.972656-20 20-20 20 8.972656 20 20zm-431 0c0-11.027344 8.972656-20 20-20h254.441406c-2.222656 6.261719-3.441406 12.988281-3.441406 20 0 7.386719 1.347656 14.460938 3.800781 21h-274.800781zm0 0"></path>
									</svg>
								</span>
								Manage registration
							</a>
						</li>
						<li class="sidebar__item">
							<a href="{{ route('assign.index') }}" class="sidebar__link">
								<span class="link__svg">
									<svg height="512pt" viewBox="0 -20 512 512" width="512pt" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
										<path d="m119 161c-22.054688 0-40 17.945312-40 40v151c0 22.054688 17.945312 40 40 40h76c22.054688 0 40-17.945312 40-40v-151c0-22.054688-17.945312-40-40-40zm76 191h-76v-151h76l.023438 151s-.003907 0-.023438 0zm236-75c0 11.046875-8.953125 20-20 20h-116c-11.046875 0-20-8.953125-20-20s8.953125-20 20-20h116c11.046875 0 20 8.953125 20 20zm0 76c0 11.046875-8.953125 20-20 20h-116c-11.046875 0-20-8.953125-20-20s8.953125-20 20-20h116c11.046875 0 20 8.953125 20 20zm0-152c0 11.046875-8.953125 20-20 20h-116c-11.046875 0-20-8.953125-20-20s8.953125-20 20-20h116c11.046875 0 20 8.953125 20 20zm21-201h-392c-33.085938 0-60 26.914062-60 60v332c0 44.113281 35.886719 80 80 80h352c44.113281 0 80-35.886719 80-80 0-11.046875-8.953125-20-20-20s-20 8.953125-20 20c0 22.054688-17.945312 40-40 40h-352c-22.054688 0-40-17.945312-40-40v-271h432v171c0 11.046875 8.953125 20 20 20s20-8.953125 20-20v-232c0-33.085938-26.914062-60-60-60zm-81 40c11.027344 0 20 8.972656 20 20s-8.972656 20-20 20-20-8.972656-20-20 8.972656-20 20-20zm100 20c0 11.027344-8.972656 20-20 20s-20-8.972656-20-20 8.972656-20 20-20 20 8.972656 20 20zm-431 0c0-11.027344 8.972656-20 20-20h254.441406c-2.222656 6.261719-3.441406 12.988281-3.441406 20 0 7.386719 1.347656 14.460938 3.800781 21h-274.800781zm0 0"></path>
									</svg>
								</span>
								Assign student
							</a>
						</li>
						@endrole
						@role('admin|coordinator')
						<li class="sidebar__item">
							<a class="sidebar__link {{ request()->routeIs(['company', 'company.*']) ? 'active' : '' }}" href="{{ route('company') }}">
								<span class="link__svg">
									<svg id="bold" enable-background="new 0 0 24 24" height="512" viewBox="0 0 24 24" width="512" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
										<path d="m13.03 1.87-10.99-1.67c-.51-.08-1.03.06-1.42.39-.39.34-.62.83-.62 1.34v21.07c0 .55.45 1 1 1h3.25v-5.25c0-.97.78-1.75 1.75-1.75h2.5c.97 0 1.75.78 1.75 1.75v5.25h4.25v-20.4c0-.86-.62-1.59-1.47-1.73zm-7.53 12.88h-1.5c-.414 0-.75-.336-.75-.75s.336-.75.75-.75h1.5c.414 0 .75.336.75.75s-.336.75-.75.75zm0-3h-1.5c-.414 0-.75-.336-.75-.75s.336-.75.75-.75h1.5c.414 0 .75.336.75.75s-.336.75-.75.75zm0-3h-1.5c-.414 0-.75-.336-.75-.75s.336-.75.75-.75h1.5c.414 0 .75.336.75.75s-.336.75-.75.75zm0-3h-1.5c-.414 0-.75-.336-.75-.75s.336-.75.75-.75h1.5c.414 0 .75.336.75.75s-.336.75-.75.75zm5 9h-1.5c-.414 0-.75-.336-.75-.75s.336-.75.75-.75h1.5c.414 0 .75.336.75.75s-.336.75-.75.75zm0-3h-1.5c-.414 0-.75-.336-.75-.75s.336-.75.75-.75h1.5c.414 0 .75.336.75.75s-.336.75-.75.75zm0-3h-1.5c-.414 0-.75-.336-.75-.75s.336-.75.75-.75h1.5c.414 0 .75.336.75.75s-.336.75-.75.75zm0-3h-1.5c-.414 0-.75-.336-.75-.75s.336-.75.75-.75h1.5c.414 0 .75.336.75.75s-.336.75-.75.75z"></path>
										<path d="m22.62 10.842-7.12-1.491v14.649h6.75c.965 0 1.75-.785 1.75-1.75v-9.698c0-.826-.563-1.529-1.38-1.71zm-2.37 10.158h-1.5c-.414 0-.75-.336-.75-.75s.336-.75.75-.75h1.5c.414 0 .75.336.75.75s-.336.75-.75.75zm0-3h-1.5c-.414 0-.75-.336-.75-.75s.336-.75.75-.75h1.5c.414 0 .75.336.75.75s-.336.75-.75.75zm0-3h-1.5c-.414 0-.75-.336-.75-.75s.336-.75.75-.75h1.5c.414 0 .75.336.75.75s-.336.75-.75.75z"></path>
									</svg>
								</span>
								Manage company
							</a>
						</li>
						<li class="sidebar__item">
							<a class="sidebar__link {{ request()->routeIs(['student', 'student.*']) ? 'active' : '' }}" href="{{ route('student') }}">
								<span class="link__svg">
									<svg id="unig-svg-home" class="MuiSvgIcon-root MuiSvgIcon-fontSizeSmall css-ptiqhd-MuiSvgIcon-root" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
										<path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
										<circle cx="8.5" cy="7" r="4"></circle>
										<line x1="20" y1="8" x2="20" y2="14"></line>
										<line x1="23" y1="11" x2="17" y2="11"></line>
									</svg>
								</span>
								Manage student
							</a>
						</li>
						@endrole
						@role('company|teacher')
						@php 
						$company = Auth::user()->company;
						@endphp
						<li class="sidebar__item">
							<a class="sidebar__link" href="{{ route('vacancy', ['id' => $company->id]) }}">
								<span class="link__svg">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard2-minus" viewBox="0 0 16 16">
										<path d="M9.5 0a.5.5 0 0 1 .5.5.5.5 0 0 0 .5.5.5.5 0 0 1 .5.5V2a.5.5 0 0 1-.5.5h-5A.5.5 0 0 1 5 2v-.5a.5.5 0 0 1 .5-.5.5.5 0 0 0 .5-.5.5.5 0 0 1 .5-.5h3Z"/>
										<path d="M3 2.5a.5.5 0 0 1 .5-.5H4a.5.5 0 0 0 0-1h-.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1H12a.5.5 0 0 0 0 1h.5a.5.5 0 0 1 .5.5v12a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5v-12Z"/>
										<path d="M6 8a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1H6Z"/>
									</svg>
								</span>
								My vacancies
							</a>
						</li>
						@endrole
						@role('admin|coordinator|student')
						<li class="sidebar__item">
							<a class="sidebar__link" href="{{ route('vacancy.index') }}">
								<span class="link__svg">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard2-minus" viewBox="0 0 16 16">
										<path d="M9.5 0a.5.5 0 0 1 .5.5.5.5 0 0 0 .5.5.5.5 0 0 1 .5.5V2a.5.5 0 0 1-.5.5h-5A.5.5 0 0 1 5 2v-.5a.5.5 0 0 1 .5-.5.5.5 0 0 0 .5-.5.5.5 0 0 1 .5-.5h3Z"/>
										<path d="M3 2.5a.5.5 0 0 1 .5-.5H4a.5.5 0 0 0 0-1h-.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1H12a.5.5 0 0 0 0 1h.5a.5.5 0 0 1 .5.5v12a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5v-12Z"/>
										<path d="M6 8a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1H6Z"/>
									</svg>
								</span>
								All vacancies
							</a>
						</li>
						@endrole

						<!--
						@role('admin|student')
						<li class="sidebar__item">
							<a class="sidebar__link" href="{{ route('registration') }}">
								<span class="link__svg">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard2-minus" viewBox="0 0 16 16">
										<path d="M9.5 0a.5.5 0 0 1 .5.5.5.5 0 0 0 .5.5.5.5 0 0 1 .5.5V2a.5.5 0 0 1-.5.5h-5A.5.5 0 0 1 5 2v-.5a.5.5 0 0 1 .5-.5.5.5 0 0 0 .5-.5.5.5 0 0 1 .5-.5h3Z"/>
										<path d="M3 2.5a.5.5 0 0 1 .5-.5H4a.5.5 0 0 0 0-1h-.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1H12a.5.5 0 0 0 0 1h.5a.5.5 0 0 1 .5.5v12a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5v-12Z"/>
										<path d="M6 8a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1H6Z"/>
									</svg>
								</span>
								Registration
							</a>
						</li>
						@endrole
							<li class="sidebar__item">
								<a class="sidebar__link" href="/templates/general_pages/manage_report.html">
									<span class="link__svg">
										<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" fill="currentColor">
											<g>
												<g>
													<polygon points="320,0 320,128 448,128     "></polygon>
												</g>
											</g>
											<g>
												<g>
													<path d="M320,160c-17.632,0-32-14.368-32-32V0H96C78.368,0,64,14.368,64,32v448c0,17.664,14.368,32,32,32h320
														c17.664,0,32-14.336,32-32V160H320z M192,448h-64v-96h64V448z M288,448h-64V288h64V448z M384,448h-64V224h64V448z"></path>
												</g>
											</g>
										</svg>
									</span>
									Manage report
								</a>
							</li>
							<li class="sidebar__item">
								<a href="/templates/general_pages/grades_list.html" class="sidebar__link">
									<span class="link__svg">
										<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
											<polyline points="9 11 12 14 22 4"></polyline>
											<path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
										</svg>
									</span>
									Grades list
								</a>
							</li>
							<li class="sidebar__item">
								<a href="/templates/general_pages/manage_posts.html" class="sidebar__link">
									<span class="link__svg">
										<svg id="Capa_1" fill="currentColor" enable-background="new 0 0 508 508" height="512" viewBox="0 0 508 508" width="512" xmlns="http://www.w3.org/2000/svg">
											<g>
												<path d="m470.958 169.333h-433.916c-20.32 0-37.042 16.722-37.042 37.042v264.583c0 20.32 16.722 37.042 37.042 37.042h433.917c20.32 0 37.042-16.722 37.042-37.042v-264.583c-.001-20.32-16.723-37.042-37.043-37.042zm-26.458 100.542v137.583c0 20.32-16.51 37.042-37.042 37.042h-116.416c-20.532 0-37.042-16.722-37.042-37.042v-137.583c0-20.32 16.51-37.042 37.042-37.042h116.417c20.531 0 37.041 16.722 37.041 37.042zm-248.708 79.375h-116.417c-8.678 0-15.875-7.197-15.875-15.875s7.197-15.875 15.875-15.875h116.417c8.678 0 15.875 7.197 15.875 15.875s-7.197 15.875-15.875 15.875zm15.875 47.625c0 8.678-7.197 15.875-15.875 15.875h-116.417c-8.678 0-15.875-7.197-15.875-15.875s7.197-15.875 15.875-15.875h116.417c8.678 0 15.875 7.197 15.875 15.875zm-15.875-111.125h-116.417c-8.678 0-15.875-7.197-15.875-15.875s7.197-15.875 15.875-15.875h116.417c8.678 0 15.875 7.197 15.875 15.875s-7.197 15.875-15.875 15.875z"></path>
												<path d="m470.958 0h-433.916c-20.426 0-37.042 16.616-37.042 37.042v52.917c0 20.425 16.616 37.041 37.042 37.041h433.917c20.425 0 37.041-16.616 37.041-37.042v-52.916c0-20.426-16.616-37.042-37.042-37.042z"></path>
											</g>
										</svg>
									</span>
									Posts
								</a>
							</li>
							<li class="sidebar__item">
								<a href="/templates/general_pages/feedback.html" class="sidebar__link">
									<span class="link__svg">
										<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" fill="currentColor">
											<g>
												<g>
													<g>
														<path d="M462.75,210.479c-3.979-1.656-8.583-0.74-11.625,2.313l-65.854,65.833c-4.479,4.49-10.146,7.51-16.333,8.75
															l-53.333,10.667c-10.625,2.146-21.375-1.229-28.896-8.74c-7.583-7.594-10.854-18.406-8.75-28.906l9.408-47.063H117.333
															c-5.896,0-10.667-4.771-10.667-10.667c0-5.896,4.771-10.667,10.667-10.667h179.061c0.371-0.411,0.587-0.928,0.98-1.323
															l41.35-41.344H117.333c-5.896,0-10.667-4.771-10.667-10.667c0-5.896,4.771-10.667,10.667-10.667H352
															c2.271,0,4.259,0.866,5.988,2.074l69.22-69.21c5.833-5.844,12.896-10.438,21-13.667c3.688-1.469,6.25-4.875,6.646-8.823
															c0.417-3.958-1.417-7.802-4.729-9.99c-7.021-4.615-15.125-7.052-23.458-7.052h-384C19.146,21.333,0,40.469,0,64v416
															c0,4.313,2.604,8.208,6.583,9.854c1.313,0.552,2.708,0.813,4.083,0.813c2.771,0,5.5-1.083,7.542-3.125L121.75,384h304.917
															c23.521,0,42.667-19.135,42.667-42.667v-121C469.333,216.021,466.729,212.125,462.75,210.479z M245.333,277.333h-128
															c-5.896,0-10.667-4.771-10.667-10.667c0-5.896,4.771-10.667,10.667-10.667h128c5.896,0,10.667,4.771,10.667,10.667
															C256,272.563,251.229,277.333,245.333,277.333z"></path>
														<path d="M471.167,64c-10.771,0-21.292,4.365-28.875,11.958L312.458,205.771c-1.5,1.49-2.5,3.385-2.917,5.448l-10.667,53.354
															c-0.708,3.5,0.396,7.115,2.917,9.635c2.021,2.021,4.75,3.125,7.542,3.125c0.688,0,1.396-0.073,2.083-0.208l53.313-10.667
															c2.083-0.417,3.979-1.427,5.458-2.917l129.854-129.833c0,0,0,0,0-0.01c7.604-7.604,11.958-18.125,11.958-28.865
															C512,82.313,493.688,64,471.167,64z M454.249,149.332l-27.587-27.587l15.083-15.083l27.589,27.589L454.249,149.332z"></path>
													</g>
												</g>
											</g>
										</svg>
									</span>
									Feedback reply
								</a>
							</li>
							-->
					</ul>
					<!--  SideBar menu  -->
				</div>
				<!-- End Sidebar -->
				<!-- Main -->
				@yield('content')
				<!-- End Main -->
			</div>
		</div>
		<script src="{{ asset('/js/script.js') }}"></script>
		<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
		<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
		<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

		@yield('scripts')
	</body>
</html>