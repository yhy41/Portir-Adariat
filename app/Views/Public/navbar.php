<div id="navbar-container">			
	<svg id="svg-header-brand" width="387" height="122" viewBox="0 0 387 122" fill="none" xmlns="http://www.w3.org/2000/svg">
		<path d="M0 -10.90406C2.64401 27.9981 0 110.808 77.6505 120.396C151.022 129.454 165.5 89.2939 313.524 110.808C366.293 118.478 384.495 14.7985 387 -38L0 -5.90406Z" fill="white"/>
	</svg>

	<nav id="top-navbar" class="navbar fixed-top navbar-expand-lg bg-transparent">
		<a class="navbar-brand" href="<?= route_to('homepage') ?>">
			<img id="logo-header" src="<?= base_url('assets/img/logo_portiraddariat.jpg') ?>">
			<span class="text-dark">PORTIR ADDAARIAT</span>
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			<div class="navbar-nav ml-auto">
				<a class="nav-item nav-link" href="<?= route_to('list-kegiatan') ?>">KEGIATAN KAMI</a>
				<a class="nav-item nav-link" href="<?= route_to('about') ?>">TENTANG KAMI</a>
				<a class="nav-item nav-link" href="<?= route_to('donasi') ?>">DONASI</a>
				<a class="nav-item nav-link" href="<?= route_to('bergabung') ?>">BERGABUNG</a>
			</div>
		</div>
	</nav>				
</div>