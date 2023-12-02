<div class="container">
	<div class="row mt-4">
		<div class="col">

			<?php $this->load->view('layouts/_alert') ?>

			<div class="card">
				<h5 class="card-header text-center"><strong>Pesanan Saya</strong></h5>
				<div class="card-body">
					<table class="table table-bordered text-center">
						<thead>
							<tr>
								<th>Faktur</th>
								<th>Tanggal</th>
								<th>Total</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($orders as $o) : ?>
								<tr>
									<td><strong><a href="<?= base_url('myorder/detail/' . $o['faktur']) ?>"><?= $o['faktur'] ?></a></strong></td>
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
	</div>
</div>
