<div class="container">
	<div class="row justify-content-center mt-4">
		<div class="col-12">
			<div class="card">
				<h5 class="card-header text-center"><strong>Detail Pesanan #<?= $pesanan['faktur'] ?></strong></h5>
				<div class="card-body">
					<ul>
						<li>Tanggal : <?= $pesanan['tanggal'] ?></li>
						<li>Nama    : <?= $pesanan['nama'] ?></li>
						<li>Telepon : <?= $pesanan['telepon'] ?></li>
						<li>Alamat  : <?= $pesanan['alamat'] ?></li>
						<li>Status  : 
							<?php if($pesanan['status'] == 'waiting') : ?>
								<span class="badge badge-primary"><?= $pesanan['status'] ?></span>
							<?php elseif($pesanan['status'] == 'paid') : ?>
								<span class="badge badge-warning text-light"><?= $pesanan['status'] ?></span>
							<?php elseif($pesanan['status'] == 'delivered') : ?>
								<span class="badge badge-info"><?= $pesanan['status'] ?></span>
							<?php elseif($pesanan['status'] == 'cancel') : ?>
								<span class="badge badge-danger"><?= $pesanan['status'] ?></span>
							<?php endif; ?>
						</li>
					</ul>

					<table class="table table-bordered text-center">
						<thead class="thead-dark">
							<tr>
								<th>Game</th>
								<th>Harga</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($detail_pesanan as $od) : ?>
								<tr>
									<td>
										<img src="<?= base_url('images/game/' . $od['gambar']) ?>" style="width:200px">
									</td>
									<td><h5>Rp. <?= number_format($od['harga'], 2, ',', '.') ?></h5></td>
								</tr>
							<?php endforeach ?>
						</tbody>
						<tfoot class="bg-success text-light">
							<tr>
								<td><strong>Total</strong></td>
								<td><h5><strong>Rp. <?= number_format(array_sum(array_column($detail_pesanan, 'subtotal')), 2, ',', '.') ?></strong></h5></td>
							</tr>
						</tfoot>
					</table>
				</div>
				<div class="card-footer">
					<form action="<?= base_url("order/update/" . $pesanan['id']) ?>" method="post">
						<input type="hidden" name="id" value="<?= $pesanan['id'] ?>">
						<div class="input-group">
							<select name="status" class="form-control">
								<option value="menunggu" <?= $pesanan['status'] == 'menunggu' ? 'selected' : '' ?>>Menunggu</option>
								<option value="dibayar" <?= $pesanan['status'] == 'dibayar' ? 'selected' : '' ?>>Dibayar</option>
								<option value="dikirim" <?= $pesanan['status'] == 'dikirim' ? 'selected' : '' ?>>Dikirim</option>
								<option value="batal" <?= $pesanan['status'] == 'batal' ? 'selected' : '' ?>>Batal</option>
							</select>
							<div class="input-group-append">
								<button class="btn btn-info" type="submit">Save</button>
							</div>
						</div>
					</form>
        		</div>
			</div>
		</div>
	</div>

	<?php if(isset($konfirmasi_pesanan)) : ?>
		<div class="row mt-3 mb-5">
			<div class="col-8">
				<div class="card">
					<h5 class="card-header">Konfirmasi Pembayaran</h5>
					<div class="card-body">
						<p>Nomor Akun: <strong class="text-info"><?= $konfirmasi_pesanan['nomor_akun'] ?></strong></p>
						<p>Nama Akun: <strong class="text-info"><?= $konfirmasi_pesanan['nama_akun'] ?></strong></p>
						<p>Nominal: <strong class="text-info">Rp. <?= number_format($konfirmasi_pesanan['nominal'], 2, ',', '.') ?></strong></p>
						<p>Note: <strong class="text-info"><?= $konfirmasi_pesanan['note'] ?></strong></p>
					</div>
				</div>
			</div>

			<div class="col-4 text-center">
				<img src="<?= base_url('images/payments/' . $konfirmasi_pesanan['gambar']) ?>" height="200px">
			</div>
		</div>
	<?php endif ?>
</div>
