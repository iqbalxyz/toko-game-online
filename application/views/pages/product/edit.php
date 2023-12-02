<div class="container">
	<div class="row mt-4">
		<div class="col">
			<h2 class="text-center">Update Game</h2>
		</div>
	</div>

	<div class="row bg-light p-3 mt-4">
		<div class="col">

			<?= form_open_multipart(base_url('product/edit/' . $produk['id'])) ?>
				<input type="hidden" name="id" value="<?= $produk['id'] ?>">
				<div class="form-group row">
					<label for="name" class="col-sm-2 col-form-label font-weight-bold">Judul Game</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="judul" value="<?= $produk['judul'] ?>">
						<?= form_error('judul', '<small class="form-text text-danger">', '</small>') ?>
					</div>
				</div> 
				<div class="row">
					<div class="col-5 offset-2">
						<div class="form-group">
							<label class="font-weight-bold">Harga</label>
							<input type="number" class="form-control" name="harga" value="<?= $produk['harga'] ?>">
							<?= form_error('harga', '<small class="form-text text-danger">', '</small>') ?>
						</div>
					</div>
					<div class="col-5">
						<div class="form-group">
							<label class="font-weight-bold">Edisi</label>
							<select class="form-control" name="edisi">
								<option value="reguler" <?php if($produk['edisi'] == "reguler"){ print ' selected'; }?>>Reguler</option>
								<option value="premium" <?php if($produk['edisi'] == "premium"){ print ' selected'; }?>>Premium</option>
							</select>
						</div>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label font-weight-bold">Deskripsi</label>
					<div class="col-sm-10">
						<textarea class="form-control" id="summernote" name="deskripsi" rows="3">
							<?= $produk['deskripsi'] ?>
						</textarea>
						<?= form_error('deskripsi', '<small class="form-text text-danger">', '</small>') ?>
					</div>
				</div>	
				<div class="form-group row">
					<label class="col-sm-2 col-form-label font-weight-bold">System Requirements</label>
					<div class="col-sm-10">
						<textarea class="form-control" id="summernote2" name="requirements" rows="3">
							<?= $produk['requirements'] ?>
						</textarea>
						<?= form_error('requirements', '<small class="form-text text-danger">', '</small>') ?>
					</div>
				</div>
				<div class="form-group row">
					<label for="" class="col-sm-2 col-form-label font-weight-bold">Gambar</label>
					<div class="col">
						<?php if(!empty($produk['gambar'])) : ?>
							<img src="<?= base_url('images/game/'. $produk['gambar']) ?>" height="300" width="200">
						<?php else: ?>
							No Image
						<?php endif; ?>
						<br> <br>
						<input name="gambar" type="file" class="form-control-file">
						<?php if($this->session->flashdata('image_error')) :  ?>
							<small class="form-text text-danger">
								<?= $this->session->flashdata('image_error') ?>
							</small>
						<?php endif ?>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<a href="<?= base_url('product') ?>" class="btn btn-secondary btn-sm">
							<i class="fa fa-arrow-left mr-1"></i>
							Kembali
						</a>
						<button type="submit" class="btn btn-info btn-sm float-right">
							<i class="fa fa-save mr-2"></i>
							Update
						</button>
					</div>
				</div>
			<?= form_close() ?>			
		</div>
	</div>
</div>

