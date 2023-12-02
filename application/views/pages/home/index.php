<!-- Carousel -->
<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
	<div class="carousel-inner">
		<?php $no = 0;?>
		<?php foreach($spanduk as $b) : ?>
			<?php $no++;  ?>
			<div class="carousel-item <?php if($no <= 1) { echo "active"; } ?>">
				<img src="<?= base_url() ?>images/banner/<?= $b['gambar'] ?>" class="d-block w-100" width="1040" height="393">
				<div class="carousel-caption d-none d-md-block  <?= $b['warna_text'] ?>">
					<h3 class="text-uppercase"><?= $b['judul'] ?></h3>
					<h5 class="mt-3"> <?= $b['konten'] ?></h5>
					<a href="<?= base_url('home/detail/' . $b['id_produk']) ?>" class="btn btn-success badge-pill mt-3" style="width:200px">BELI SEKARANG</a>
				</div>
			</div>
		<?php endforeach ?> 
	</div>
	<a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div>
<!-- End of Carousel -->

<!-- List Item -->
<div class="container">
	<div class="row mt-5">
		<div class="col">
			<h2 class="head">Rilis terbaru</h2>
			<hr>
		</div>
	</div>

	<div class="row mb-5">
		<?php foreach($games as $game) : ?>
			<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mt-4">
				<div class="card">
				<img src="<?= base_url() ?>/images/game/<?= $game['gambar'] ?>" class="card-img-top" alt="<?= $game['judul'] ?>" width="284" height="373">
					<div class="card-body">
						<h6 class="card-title font-weight-bold"><?= $game['judul'] ?></h6>
						<h6 class="text-muted"><?= ucfirst($game['edisi']) ?> Edition</h6>
						<h3 class="text-right text-warning price mt-4">Rp.<?= number_format($game['harga'], 2, ', ', '.'); ?></h3>
						<a href="<?= base_url('home/detail/' . $game['id']) ?>" class="btn btn-outline-info btn-sm btn-block mt-3">Lihat Detail</a>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>
<!-- End of List Item -->

<!-- Footer -->
<?php $this->load->view('layouts/_footer') ?>
<!-- End of footer -->
