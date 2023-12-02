<div class="container">
	<div class="row justify-content-center mt-4">
		<div class="col-6">
			<div class="card">
				<h5 class="card-header text-center"><strong>Detail Pesanan #<?= $order['faktur'] ?></strong></h5>
				<div class="card-body">
					<ul>
						<li>Date : <?= $order['tanggal'] ?></li>
						<li>Name    : <?= $order['nama'] ?></li>
						<li>Phone : <?= $order['telepon'] ?></li>
						<li>Address  : <?= $order['alamat'] ?></li>
						<li>Status  : 
							<?php if($order['status'] == 'menunggu') : ?>
								<span class="badge badge-primary"><?= $order['status'] ?></span>
							<?php elseif($order['status'] == 'dibayar') : ?>
								<span class="badge badge-warning text-light"><?= $order['status'] ?></span>
							<?php elseif($order['status'] == 'dikirim') : ?>
								<span class="badge badge-info"><?= $order['status'] ?></span>
							<?php elseif($order['status'] == 'batal') : ?>
								<span class="badge badge-danger"><?= $order['status'] ?></span>
							<?php endif; ?>
						</li>
					</ul>

					<hr>
					<div class="text-center text-info">
						<small class="text-dark">Jika Anda memerlukan bantuan atau informasi, Anda dapat menghubungi email.</small>
						<br>
						<small>kelompok3@mail.com</small>
					</div>

					<?php if($order['status'] == 'menunggu') : ?>
						<form action="<?= base_url('myorder/confirm/' .  $order['faktur']) ?>" method="POST">
							<button type="submit" class="btn btn-info btn-sm float-right">Konfirmasi Pembayaran</button>
						</form>
					<?php endif ?>

				</div>
			</div>
		</div>
	</div>
</div>
