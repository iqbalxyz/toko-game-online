<div class="container">

	<div class="row mt-4">
		<div class="col-10">
			<h3>Daftar Pesanan Pengguna</h3>
		</div>
	</div>

	<?php $this->load->view('layouts/_alert') ?>

	<div class="row mt-4">
		<div class="col bg-light p-4">
			<table class="table table-bordered text-center">
				<thead>
					<tr>
						<th>Invoice</th>
						<th>Tanggal</th>
						<th>Total</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($pesanan as $o) : ?>
						<tr>
							<td><a href="<?= base_url('order/detail/' . $o['id']) ?>"><strong><?= $o['faktur'] ?></strong></a></td>
							<td><?= $o['tanggal'] ?></td>
							<td>Rp. <?= number_format($o['total'], 2, ',', '.') ?></td>
							<td>
								<?php if($o['status'] == 'menunggu') : ?>
									<span class="badge badge-primary"><?= $o['status'] ?></span>
								<?php elseif($o['status'] == 'dibayar') : ?>
									<span class="badge badge-warning text-light"><?= $o['status'] ?></span>
								<?php elseif($o['status'] == 'dikirim') : ?>
									<span class="badge badge-info"><?= $o['status'] ?></span>
								<?php elseif($o['status'] == 'batal') : ?>
									<span class="badge badge-danger"><?= $o['status'] ?></span>
								<?php endif; ?>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>

</div>
