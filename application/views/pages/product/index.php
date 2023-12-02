<div class="container">
	<div class="row mt-4 mb-3">
		<div class="col-11">
			<h2>Daftar Game</h2>
		</div>
		<div class="col float-right">
			<a href="<?= base_url('product/add') ?>" class="btn btn-primary btn-sm">
				<i class="fas fa-plus"></i>
				Game
			</a>
		</div>
	</div>

	<?php $this->load->view('layouts/_alert') ?>

	<div class="row mt-3">
		<div class="col">
			<table class="table table-light text-center">
				<thead class="thead-dark">
					<tr>
						<th>#</th>
						<th>Nama</th>
						<th>Harga</th>
						<th>Edisi</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1; foreach($produk as $p) : ?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= $p['judul'] ?></td>
							<td>Rp. <?= number_format($p['harga'], 2, ', ', '.'); ?></td>
							<td><?= ucfirst($p['edisi']) ?></td>
							<td>
								<a href="<?= base_url('product/edit/' . $p['id']) ?>" class="btn btn-warning btn-sm">
									<i class="fas fa-edit text-light"></i>
								</a>
								<a href="<?= base_url('product/delete/' . $p['id']) ?>" class="btn btn-danger btn-sm">
									<i class="fas fa-trash"></i>
								</a>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
