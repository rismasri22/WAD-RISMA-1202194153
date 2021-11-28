<?php include 'layout/header.php';
	if(!isset($_SESSION['login'])){
		header('Location:login.php');
	}
?>

<div class="row mt-5">
	<div class="col-md-12">
		<div class="card shadow">
			<div class="card-header">
				KERANJANG BELANJA
			</div>
			<div class="card-body">
				<?= flashdata('alert_message') ?>
				<table class="table">
					<thead>
						<tr>
							<th style="width: 5%">No</th>
							<th>Nama Tempat</th>
							<th>Lokasi</th>
							<th>Tanggal Perjalanan</th>
							<th>Harga</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php $n=0; $result = mysqli_query($koneksi, 'SELECT * FROM bookings WHERE user_id="'.$_SESSION['user']['id'].'"') or die(mysqli_error($connection));

						while($row = mysqli_fetch_array($result)){ $n++; ?>
								<tr>
									<td><?= $n ?></td>
									<td><?= $row['nama_tempat'] ?></td>
									<td><?= $row['lokasi'] ?></td>
									<td><?= $row['tanggal'] ?></td>
									<td>Rp. <?= number_format($row['harga']) ?></td>
									<td class="text-center">
										<a href="process/booking_delete.php?id=<?= $row['id'] ?>" class="btn btn-danger">Hapus</a>
									</td>
								</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<?php include 'layout/footer.php'; ?>