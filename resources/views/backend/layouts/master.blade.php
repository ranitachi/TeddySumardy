<!DOCTYPE html>
<html lang="en">

<head>
	@include('backend.includes.head')
	<style>
		.btn-xs {
			height: auto !important;
		}

		.help-block {
			font-size: 12px !important;
		}

		tr > td {
			font-size: 12px !important;
		}

		.label {
			font-size: 11px !important;
		}
	</style>
	@yield('title')
</head>
	
<body class="menubar-left menubar-unfold menubar-light theme-primary">
	<!--============= start main area -->

	<!-- APP NAVBAR ==========-->
	@include('backend.includes.navbar')
	<!--========== END app navbar -->

	<!-- APP ASIDE ==========-->
	@include('backend.includes.sidebar')
	<!--========== END app aside -->

	<!-- navbar search -->
	@include('backend.includes.search')
	<!-- .navbar-search -->

	<!-- APP MAIN ==========-->
	<main id="app-main" class="app-main">
		<div class="wrap">
			<section class="app-content">
				<div class="row">
						
						@include('backend.includes.alert')
						@yield('alert-error')
						@yield('content')
					
			</section><!-- .app-content -->
		</div><!-- .wrap -->

		@yield('modal')
		
		<!-- APP FOOTER -->
		@include('backend.includes.footer')
		<!-- /#app-footer -->
	</main>
	<!--========== END app main -->

	<script>
		var LIB_URL = "{{ asset('theme/backend') }}"
	</script>

	@include('backend.includes.script')

	@yield('footscript')

</body>

</html>