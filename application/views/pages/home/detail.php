<div class="container">

	<!-- Alert -->
	<?php $this->load->view('layouts/_alert') ?>
	<!-- End of alert -->

	<!-- Hero -->
	<div class="row mt-5">		
		<div class="col">
			<img src="<?= base_url() ?>/images/game/<?= $game['gambar'] ?>" class="card-img-top" alt="<?= $game['judul'] ?>" style="width: 330px">
		</div>
		<div class="col-5">
			<h2 class="font-weight-bold"><?= $game['judul'] ?></h2>
			<h4 class="font-weight-normal"><?=  ucfirst($game['edisi']) ?> Edition</h4>
			<br> <br>
			<p><?= character_limiter($game['deskripsi'], 200) ?></p>
			<a href="#description" class="text-info font-weight-bold">Lihat Selengkapnya</a>
			<br> <br>
			<p class="font-weight-bold">EDITION</p>
			<h5><span class="badge badge-info badge-pill p-2"><?=  ucfirst($game['edisi']) ?></span></h5>
		</div>
		<div class="col">
			<div class="card">
				<div class="card-body text-center">
					<h2 class="text-center text-warning price mt-4 mb-4">Rp.<?= number_format($game['harga'], 2, ', ', '.'); ?></h2>
					<form action="<?= base_url('cart/add') ?>" method="POST">
						<input type="hidden" name="id_produk" value="<?= $game['id'] ?>">
						<button type="submit" class="btn btn-large btn-success btn-block badge-pill mb-4">Tambah Ke Keranjang</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- End of hero -->

	<!-- Summary -->
	<div class="row mt-5 mb-2">
		<div class="col">
			<h3 id="description">Ringkasan</h3>
		</div>
	</div>
	
	<div class="row">
		<div class="col bg-light p-5">
			<?= $game['deskripsi'] ?>
		</div>
	</div>
	<!-- End of summary -->

	<!-- System requirements -->
	<div class="row mt-5 mb-2">
		<div class="col">
			<h3>Persyaratan Sistem</h3>
		</div>
	</div>
	
	<div class="row">
		<div class="col bg-light p-5">
			<?= $game['requirements'] ?>
		</div>
	</div>
	<!-- End of System requirements -->
</div>

<?php $this->load->view('layouts/_footer') ?>
