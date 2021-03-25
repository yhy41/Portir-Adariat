<?= $this->extend('Public/LayoutView') ?>

<?= $this->section('style') ?>
<?= $this->endSection() ?>

<?= $this->section('img-bgheader') ?>
<img class="img-bg-header bg-filterdark" src="<?= base_url('/assets/img/fotokegiatan02.jpg')?>">
<?= $this->endSection() ?>

<?= $this->section('text-header') ?>
<div class="flex-fill d-flex">
	<div class="jumbotron transparent align-self-center mx-auto">
		<h1 class="display-4 text-white">Tentang Kami</h1>
	</div>
</div>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container hspace-sm">
	<div class="row">
		<div class="col-lg-8 col-md-12">
			<p class="lead">Komunitas Program Terima Kasih, Portir Addaariat Banyuwangi.<br />
				"no one has become poor by giving"</p>
		</div>
		<div class="col-lg-4 col-md-12 mt-lg-0 mt-4">
			<div class="pl-4" style="border-left: 1px solid grey">
			<h4>Kontak</h4>
			<br />
			<p><i class="fas fa-phone-square"></i>  Telepon : 0812-4912-6226</p>
			<p><i class="fab fa-facebook"></i>  Facebook : <a href="https://facebook.com/Portiraddariat">Portir Addaariat Banyuwangi</a></p>
			</div>
		</div>
	</div>
	<div class="row hspace-xs d-flex flex-column">
		<div class="col">
			<h4>Lokasi pada peta</h4>
		</div>
		<div class="col-lg-8 col-md-12 mt-3">
			<div style="width: 100%"><iframe width="100%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=%20Jajag%20Kel.,%20Gambiran,%20Banyuwangi,%20Indonesia%20Jajag,%20East%20Java%2068486+(Portir%20Addaariat)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://www.maps.ie/route-planner.htm">Google Route Planner</a></div>
		</div>
	</div>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<?= $this->endSection() ?>