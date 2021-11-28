<?php include 'layout/header.php'; ?>

<div class="row mb-4">
  <div class="col-md-12 text-center text-primary">

  	<div class="jumbotron">
	  <h1 class="display-4">EAD Travel</h1>
	</div>

  </div>
</div>

<div class="row">
	<div class="col-md-12">
		<?= flashdata('alert_message') ?>
	</div>
</div>

<div class="card-group">
	<?php foreach (WISATA as $key => $row){ ?>
		<div class="card">
			<center>
			    <img style="width: 250px; height: 250px" src="gambar/<?= $row['gambar'] ?>" class="card-img-top" alt="...">
			</center>
		    <div class="card-body">
		      <h5 class="card-title"><?= $row['nama_tempat'].", ".$row['lokasi'] ?></h5>
		      <p class="card-text">
		      	<?= $row['deskripsi'] ?>
		      </p>

		      <div class="row">
		    		<div class="col-md-6">
		    			Harga
		    		</div>
		    		<div class="col-md-6 text-right">
		    			<h6>Rp. <?= number_format($row['harga']) ?></h6>
		    		</div>
		    	</div>
		    </div>
		    <div class="card-footer">
		    	<a href="javascript:void(0)" data-toggle="modal" data-target="#btnModal<?= $key ?>" class="btn btn-primary btn-block pull-right">Pesan Tiket</a>
		    </div>
		</div>

		<form action="process/booking_insert.php?id=<?= $key ?>" method="post">
			<div class="modal fade" id="btnModal<?= $key ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Tanggal Perjalanan</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			        
		        	<div class="row">
		        		<div class="col-md-12">
		        			<input type="date" name="tanggal_perjalanan" class="form-control" required="" autocomplete="off">
		        		</div>
		        	</div>
			        
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
			        <button class="btn btn-primary">Tambahkan</button>
			      </div>
			    </div>
			  </div>
			</div>
		</form>

	<?php } ?>
</div>

<?php include 'layout/footer.php'; ?>