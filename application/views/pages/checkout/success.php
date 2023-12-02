<div class="container">
	<div class="row mt-4">
		<div class="col">
			<div class="card">
				<h5 class="card-header">Checkout Berhasil</h5>	
				<div class="card-body">
					<h4><strong>Nomor Pesanan : <?= $content['faktur'] ?></strong></h4>
					<p>Terima kasih telah berbelanja.</p>
					<br>
					<p>Mohon lakukan pembayaran dengan mengikuti langkah berikut:</p>
					<ol>
						<li>Lakukan pembayaran ke rekening <strong>BCA 0123456789</strong> An. Gaming Store</li>
						<li>Sertakan informasi dengan nomor pesanan <strong><?= $content['faktur'] ?></strong></li>
						<li>Total pembayaran <strong>Rp. <?= number_format($content['total'], 0, ',', '.') ?></strong></li>
					</ol>
					<p>Jika Anda sudah melakukan pembayaran, silakan kirimkan bukti transfernya<a href="<?= base_url('myorder/detail/' . $content['faktur']) ?>"> ke link berikut</a></p>
					<a href="<?= base_url('home') ?>" class="btn btn-primary btn-sm">Kembali</a>
				</div>
			</div>
		</div>
	</div>
</div>
