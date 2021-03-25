<?= $this->extend('Public/LayoutView') ?>

<?= $this->section('style') ?>
<style>
	.header-bg-homepage{
		background-color: rgba(0,0,0,0);
		width: 100%;
		height: 707px;
		position: relative;
		overflow: hidden;
	}
	.img-bg-header{
		height: 706px;
	}

	.bergabung-bg{
		background-color: rgba(0,0,0,0);
		width: 100%;
		height: 640px;
		position: relative;
		overflow: hidden;
	}
	.img-bg-bergabung{
		position: absolute;
		width: 100%;
		height: 637px;
		object-fit: cover;
		overflow: hidden;
		z-index: -1;
		top: 2px;
	}

	.thumbnail-kegiatan{
		max-width: 100%;
		height: 500px;
		object-fit: cover;
		object-position: center;
	}

	.clip-svg-kegiatan1{
	clip-path: url(#border-foto-kegiatan1-xl);
	}
	.clip-svg-kegiatan2{
		clip-path: url(#border-foto-kegiatan2-xl);
	}

	#svg-header-bor-btm-homepage{
		position: absolute;
		left: 0;
		top: 579.61px;
		z-index: 1;
	}
	#svg-bergabung-bor-top{
		position: absolute;
		left: 0;
		top: -20px;
		z-index: 1;
	}
	#svg-bergabung-bor-btm{
		position: absolute;
		left: 0;
		top: 520px;
		z-index: 1;
	}

	#svg-berdonasi-bor-top{
		position: absolute;
		left: 0;
		top: -30px;
		z-index: 1;
	}
	#svg-berdonasi-bor-btm{
		position: absolute;
		left: 0;
		top: 520px;
		z-index: 1;
	}

	.title-bergabung{
		font-size: 3.5rem;
	    font-weight: 300;
	    line-height: 1.2;
	}

	/* On screens that are 1199px wide or less */
	@media screen and (max-width: 1199px) {
		.clip-svg-kegiatan1{
			clip-path: url(#border-foto-kegiatan1-lg);
		}
		.clip-svg-kegiatan2{
			clip-path: url(#border-foto-kegiatan2-lg);
		}
		.thumbnail-kegiatan{
			height: 250px;
		}
	}

	/* On screens that are 991px wide or less */
	@media screen and (max-width: 991px) {
		.bergabung-bg{
			height: 400px;
		}
		.img-bg-bergabung{
			height: 395px;
		}
		#svg-bergabung-bor-top{
			top: -35px;
		}
		#svg-bergabung-bor-btm{
			top: 290px;
		}

		#svg-berdonasi-bor-top{
			top: -40px;
		}
		#svg-berdonasi-bor-btm{
			top: 290px;
		}
		.title-bergabung{
			font-size: 2rem;
		    font-weight: 400;
		}
	}

	/* On screens that are 767px wide or less */
	@media screen and (max-width: 767px) {
		#svg-header-bor-btm-homepage{
			top: 590px;
		}
		#svg-bergabung-bor-top{
			top: -40px;
		}
		#svg-bergabung-bor-btm{
			top: 300px;
		}

		#svg-berdonasi-bor-top{
			top: -50px;
		}
		#svg-berdonasi-bor-btm{
			top: 300px;
		}
	}
	
	/* On screens that are 575px wide or less */
	@media screen and (max-width: 575px) {
		#svg-header-bor-btm-homepage{
			top: 600px;
		}
		#svg-bergabung-bor-top{
			top: -50px;
		}
		#svg-bergabung-bor-btm{
			top: 310px;
		}

		#svg-berdonasi-bor-top{
			top: -60px;
		}
		#svg-berdonasi-bor-btm{
			top: 310px;
		}
	}

</style>
<?= $this->endSection() ?>

<?= $this->section('img-bgheader') ?>
<img class="img-bg-header" src="<?= base_url('assets/img/portir_addaariat_kegiatan2.jpg') ?>">
<?= $this->endSection() ?>

<?= $this->section('text-header') ?>
<div class="flex-fill d-flex">
	<div class="jumbotron transparent align-self-center col">
		<h1 class="display-4 text-white">Program Terima Kasih</h1>
		<p class="lead text-white">"no one has become poor by giving"</p>
	</div>
</div>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<svg width="0" height="0">
	<defs>
		<clipPath id="border-foto-kegiatan1-xl">
			<path d="M480.5 267C480.5 142.502 435 129 377.428 58.0888C275.495 -67.4613 -18.5723 33.5888 1.92764 151.089C71 267 38.4276 298.089 40.4276 370.089C42.4276 442.089 164 467.589 315.928 467.589C412.5 467.589 480.5 362.42 480.5 267Z" />
		</clipPath>
	</defs>
</svg>

<svg width="0" height="0">
	<defs>
		<clipPath id="border-foto-kegiatan2-xl">
			<path d="M5.39325 299.351C-10.9794 205.269 5.39325 105.566 118.204 59.1405C430.482 -69.3721 513.543 34.619 493.077 152.222C409.717 271.827 456.638 299.351 454.642 371.414C452.645 443.478 332.845 469 179.602 469C69.7133 433.38 21.7659 393.434 5.39325 299.351Z" fill="#C4C4C4"/>
		</clipPath>
	</defs>
</svg>

<svg width="0" height="0">
	<defs>
		<clipPath id="border-foto-kegiatan1-lg">
			<path d="M250 142.693C250 76.091 226.282 68.8677 196.271 30.9328C143.136 -36.2317 -10.1543 17.8263 0.531821 80.6844C36.5376 142.693 19.5584 159.324 20.6009 197.841C21.6435 236.358 85.0162 250 164.212 250C214.553 250 250 193.739 250 142.693Z" fill="#C4C4C4"/>
		</clipPath>
	</defs>
</svg>

<svg width="0" height="0">
	<defs>
		<clipPath id="border-foto-kegiatan2-lg">
			<path d="M2.71837 159.569C-5.53395 109.418 2.71838 56.2719 59.5789 31.5248C216.977 -36.9788 258.842 18.4537 248.527 81.1419C206.51 144.897 230.16 159.569 229.154 197.982C228.148 236.395 167.765 250 90.5251 250C35.1377 231.013 10.9707 209.719 2.71837 159.569Z" fill="#C4C4C4"/>
		</clipPath>
	</defs>
</svg>


<!-- kegiatan section -->
<div class="container hspace-xs">
	<?php $index_kegiatan = 1 ?>
	<?php foreach ($post as $row): ?>
	<?php if($index_kegiatan % 2 != 0): ?>
	<div class="row hspace-md d-flex align-items-center">
		<div class="col-xl-6 col-lg-4 col-md-6 col-sm-12 pl-5 mb-4">
			<?php $photos = json_decode($row['foto']); ?>
			<img class="clip-svg-kegiatan1 thumbnail-kegiatan" src="<?= '/uploads/imgs/' . $photos[0] ?>">
		</div>
		<div class="col">
			<h4 class="font-weight-light"><?= $row['tanggal'] ?></h4>
			<h4 class="font-weight-bold"><?= $row['judul'] ?></h4>
			<i class="fa fa-map-marker" aria-hidden="true"></i><h4 class="d-inline font-weight-bold"> <?= $row['lokasi'] ?></h4>
			<p class="lead desc-kegiatan mt-5"><?= $row['deskripsi'] ?></p>
			<a href="<?= route_to('detail-public', $row['slug'] . '-' . $row['u_code']) ?>" class="btn btn-primary mt-3">Lihat Selengkapnya</a>
		</div>
	</div>
	<?php else: ?>
	<div class="row hspace-md d-flex align-items-center">
		<div class="col order-md-first order-last">
			<h4 class="font-weight-light"><?= $row['tanggal'] ?></h4>
			<h4 class="font-weight-bold"><?= $row['judul'] ?></h4>
			<i class="fa fa-map-marker" aria-hidden="true"></i><h4 class="d-inline font-weight-bold"> <?= $row['lokasi'] ?></h4>
			<p class="lead desc-kegiatan mt-5"><?= $row['deskripsi'] ?></p>
			<a href="<?= route_to('detail-public', $row['slug'] . '-' . $row['u_code']) ?>" class="btn btn-primary mt-3">Lihat Selengkapnya</a>
		</div>
		<div class="col-xl-6 col-lg-4 col-md-6 col-sm-12 order-md-last order-first pl-4 mb-4">
			<?php $photos = json_decode($row['foto']); ?>
			<img class="clip-svg-kegiatan2 thumbnail-kegiatan" src="<?= '/uploads/imgs/' . $photos[0] ?>">
		</div>
	</div>
	<?php endif ?>
	<?php $index_kegiatan = $index_kegiatan + 1 ?>
	<?php endforeach ?>
</div>
<!-- kegiatan section end -->


<!-- ajakan bergabung section-->
<div class="bergabung-bg hspace-xl">
	<img class="img-bg-bergabung" src="<?= base_url('assets/img/bergabung-bg.png') ?>">
	<svg id="svg-bergabung-bor-top" width="100%" height="143" viewBox="0 0 1366 143" fill="none" xmlns="http://www.w3.org/2000/svg">
		<path d="M-52 110.5C-25.6667 98.4999 60 81.6999 192 110.5C324 139.3 550 92.1666 646.5 64.9999C745.333 40.9999 994.1 16.4999 1198.5 110.5C1402.9 204.5 1477.67 69.3333 1495 0H-52V110.5Z" fill="white"/>
	</svg>

	<div class="container d-flex h-100">
		<div class="col-md-6 col-sm-12 ml-auto align-self-center">
			<div class="jumbotron transparent">
				<h1 class="title-bergabung text-white">Ayo Bergabung Bersama Kami</h1>
				<a href="<?= route_to('bergabung') ?>" class="btn btn-alpha-grey"><span class="text-white">Bergabung Sekarang</span></a>
			</div>
		</div>
	</div>

	<svg id="svg-bergabung-bor-btm" width="100%" height="143" viewBox="0 0 1366 143" fill="none" xmlns="http://www.w3.org/2000/svg">
		<path d="M1457 32.1627C1430.67 44.1627 1345 60.9627 1213 32.1627C1081 3.36267 855 50.496 758.5 77.6627C659.667 101.663 410.9 126.163 206.5 32.1627C2.09998 -61.8373 -72.6666 73.3293 -90 142.663L1457 142.663V32.1627Z" fill="white"/>
	</svg>

</div>
<!-- ajakan bergabung section end -->


<!-- ajakan berdonasi section -->
<div class="bergabung-bg hspace-xl">
	<img class="img-bg-bergabung" src="<?= base_url('assets/img/berdonasi-bg.png') ?>">
	<svg id="svg-berdonasi-bor-top" width="100%" height="150" viewBox="0 0 1366 150" fill="none" xmlns="http://www.w3.org/2000/svg">
		<path d="M-47 115.5C140 37.5 334.851 85.4691 459.5 115.5C611 152 833.333 160.667 966 133.5C1060.17 102.667 1286.5 55.9 1438.5 115.5C1590.5 175.1 1476.17 63.3333 1400 0L-47 14V115.5Z" fill="white"/>
	</svg>


	<div class="container d-flex h-100">
		<div class="col-md-6 col-sm-12 mr-auto align-self-center">
			<div class="jumbotron transparent align-self-center">
				<h1 class="title-bergabung text-white">Ayo Memberi Donasi</h1>
				<a href="<?= route_to('donasi') ?>" class="btn btn-alpha-grey"><span class="text-white">Donasi Sekarang</span></a>
			</div>
		</div>
	</div>

	<svg id="svg-berdonasi-bor-btm" width="100%" height="145" viewBox="0 0 1366 145" fill="none" xmlns="http://www.w3.org/2000/svg">
		<path d="M-97 111.121C2.66524 76.454 117.158 49.2328 305.927 77.1206C627.45 124.621 947.437 124.621 1046.25 106C1172.39 82.2294 1371.19 10.5 1463 0V144.5H-85.7365L-97 111.121Z" fill="white"/>
	</svg>

</div>
<!-- ajakan berdonasi section end -->

<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
	//membatasi panjang teks deskripsi
	for (var i = 0; i < document.querySelectorAll('.desc-kegiatan').length; i++) {
	  var truncated = document.querySelectorAll('.desc-kegiatan')[i].innerText
	  if (truncated.length > 400) {
	        truncated = truncated.substr(0,400) + '...';
	  }
	  document.querySelectorAll('.desc-kegiatan')[i].innerText = truncated;
	}
</script>
<?= $this->endSection() ?>