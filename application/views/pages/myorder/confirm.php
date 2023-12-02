<div class="container">
	<div class="row mt-4 mb-5">
		<div class="col">
			<div class="card">

				<?php $this->load->view('layouts/_alert') ?>

				<h5 class="card-header text-center"><strong>Konfirmasi Pembayaran #<?= $pesanan['faktur'] ?></strong></h5>
				<div class="card-body">
					<?= form_open_multipart(base_url('myorder/confirm/' . $pesanan['faktur'])) ?>
						<input type="hidden" name="id_pesanan" value="<?= $pesanan['id'] ?>">
						<div class="form-group">
							<label>Faktur Anda</label>
							<input type="text" class="form-control" name="faktur" value="<?= $pesanan['faktur'] ?>" readonly>
						</div>
						<div class="form-group">
							<label>Nama Akun</label>
							<input type="text" class="form-control" name="nama_akun">
							<?= form_error('nama_akun', '<small class="form-text text-danger">', '</small>') ?>
						</div>
						<div class="form-group">
							<label>Nomor Akun</label>
							<input type="text" class="form-control" name="nomor_akun">
							<?= form_error('nomor_akun', '<small class="form-text text-danger">', '</small>') ?>
						</div>
						<div class="form-group">
							<label>Nominal</label>
							<input type="text" class="form-control" name="nominal">
							<?= form_error('nominal', '<small class="form-text text-danger">', '</small>') ?>
						</div>
						<div class="form-group">
							<label>Note</label>
							<textarea class="form-control" name="note" rows="3"></textarea>
						</div>

						<div class="form-group">
							<label>Bukti Transfer</label>
							<input name="gambar" type="file" class="form-control-file">
							<?php if($this->session->flashdata('image_error')) :  ?>
								<small class="form-text text-danger">
									<?= $this->session->flashdata('image_error') ?>
								</small>
							<?php endif ?>
						</div>

						<button class="btn btn-info float-right" type="submit">Send</button>
					<?= form_close() ?>
				</div>
			</div>
		</div>
	</div>
</div>
