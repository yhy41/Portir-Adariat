<?php 
	$judul = $post['judul'];
	$tanggal = $post['tanggal'];
	$lokasi = $post['lokasi'];
	$deskripsi = $post['deskripsi'];
	$foto = json_decode($post['foto']);
?>

<?= $this->extend('Public/LayoutView') ?>

<?= $this->section('style') ?>
<style>
	.card-tanggal{
		width: 100px;
		height: 100px;
		border-radius: 10px;
		box-shadow: 0px 0px 5px grey;
		text-align: center;
	}
	.card-tanggal-innershape{
		width: 100%;
		height: 20%;
		background-color: red;
		border-top-left-radius: 10px;
		border-top-right-radius: 10px;
	}
	.card-tanggal-text{
		font-size: 48px;
	}

	.foto-kegiatan-container{
		overflow: hidden;
	}

	.foto-kegiatan{
	  max-width: 100%;
	  min-height: 175px;
	  object-fit: cover;
	  background-position: center;
	  transition: 0.3s;
	}

	.foto-kegiatan:hover {
	  opacity: 0.5;
	  cursor: pointer;
	}

	.img-grid {
	  display: grid;
	  grid-template-columns: repeat(5, 1fr);
	  grid-template-rows: repeat(2, 175px);
	  grid-gap: 5px;
	}

	/* The Modal (background) */
	.modal-fotokegiatan {
	  display: none; /* Hidden by default */
	  position: fixed; /* Stay in place */
	  z-index: 3; /* Sit on top */
	  padding-top: 20vh; /* Location of the box */
	  left: 0;
	  top: 0;
	  width: 100%; /* Full width */
	  height: 100%; /* Full height */
	  overflow: auto; /* Enable scroll if needed */
	  background-color: rgb(0,0,0); /* Fallback color */
	  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
	}

	/* Modal Content (image) */
	.modal-fotokegiatan-content {
	  margin: auto;
	  display: block;
	  width: 80%;
	  max-width: 700px;
	  height: 70%;
	  object-fit: contain;
	}

	/* Caption of Modal Image */
	#caption-fotokegiatan {
	  margin: auto;
	  display: block;
	  width: 80%;
	  max-width: 700px;
	  text-align: center;
	  color: #ccc;
	  padding: 10px 0;
	  height: 20%;
	}

	/* Add Animation */
	.modal-fotokegiatan-content, #caption-fotokegiatan {  
	  -webkit-animation-name: zoom;
	  -webkit-animation-duration: 0.6s;
	  animation-name: zoom;
	  animation-duration: 0.6s;
	}

	@-webkit-keyframes zoom {
	  from {-webkit-transform:scale(0)} 
	  to {-webkit-transform:scale(1)}
	}

	@keyframes zoom {
	  from {transform:scale(0)} 
	  to {transform:scale(1)}
	}

	/* The Close Button */
	.close-modal {
	  position: absolute;
	  top: 15px;
	  right: 35px;
	  color: #f1f1f1;
	  font-size: 40px;
	  font-weight: bold;
	  transition: 0.3s;
	}

	.close-modal:hover,
	.close-modal:focus {
	  color: #bbb;
	  text-decoration: none;
	  cursor: pointer;
	}

	/* On screens that are 991px wide or less */
	@media screen and (max-width: 991px) {
		.img-grid {
		  grid-template-columns: repeat(4, 1fr);
		  grid-template-rows: repeat(3, 175px);
		}
	}
	/* On screens that are 767px wide or less */
	@media screen and (max-width: 767px) {
		.img-grid {
		  grid-template-columns: repeat(3, 1fr);
		  grid-template-rows: repeat(4, 175px);
		}
	}
	/* On screens that are 575px wide or less */
	@media screen and (max-width: 575px) {
	.img-grid {
		grid-template-columns: repeat(2, 1fr);
		grid-template-rows: repeat(5, 175px);
	}
}
</style>
<?= $this->endSection() ?>

<?= $this->section('img-bgheader') ?>
<img class="img-bg-header" src="<?= base_url() . '/uploads/imgs/' . $foto['0'] ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container hspace-xs">
	<div class="row d-flex flex-row align-items-center">
		<div class="card-tanggal mr-5">
			<div class="card-tanggal-innershape"></div>
			<span class="card-tanggal-text"><?= substr($tanggal,8,2) ?></span>
		</div>
		<h4 class="font-weight-bold"><?= $judul ?></h4>
	</div>
	<div class="row hspace-xs d-flex flex-column align-items-left">
		<h4 class="font-weight-bold mb-4">Detail</h4>
		<p class="lead">Tanggal : <?= $tanggal?></p>
		<p class="lead">Lokasi : <?= $lokasi ?></p>
		<p class="lead"><?= $deskripsi ?></p>
	</div>

	<div class="row hspace-xs d-flex flex-column align-items-left">
		<h4 class="font-weight-bold mb-4">Foto Kegiatan</h4>
		<div class="container">
			<div class="img-grid">
				<?php foreach ($foto as $item): ?>
				<div class="foto-kegiatan-container">
					<img class="foto-kegiatan" src="<?= base_url() . '/uploads/imgs/' . $item ?>" alt="">
				</div>
				<?php endforeach ?>			
			</div>
		</div>
	</div>
</div>

<!-- modal foto kegiatan -->
<div id="modal-foto" class="modal-fotokegiatan">
  <span class="close-modal">&times;</span>
  <img class="modal-fotokegiatan-content" id="img-modal-fotokegiatan">
  <div id="caption-fotokegiatan"></div>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
$(document).ready(function(){
	// Get the modal
	var modal = document.getElementById("modal-foto");

	// Get the <span> element that closes the modal
	var span = document.getElementsByClassName("close-modal")[0];

	// When the user clicks on <span> (x), close the modal
	span.onclick = function() { 
	  modal.style.display = "none";
	}

	for (var i = 0; i < document.querySelectorAll('.foto-kegiatan').length; i++) {
		document.querySelectorAll('.foto-kegiatan')[i].onclick = function() {
		// Get the image and insert it inside the modal - use its "alt" text as a caption
		var img = this;
		var modalImg = document.getElementById("img-modal-fotokegiatan");
		var captionText = document.getElementById("caption-fotokegiatan");

		modal.style.display = "block";
		modalImg.src = this.src;
		captionText.innerHTML = this.alt;
		}
	}
});
</script>
<?= $this->endSection() ?>