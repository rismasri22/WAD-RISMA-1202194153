			</div>
		</div>
		<br>

		<?php $color = '#63b9db';
			if(isset(['nav_color'])){
				if(['nav_color'] == 'dark-boba'){
					$color = '#361212';
				}
			} 
		?>


		<footer class="footer" style="background-color:<?= $color ?>">
		<div class="container text-center">
			<span style="color:white">2021 Copy Right : <a href="javascript:void(0)" data-toggle="modal" data-target="#modalCopyRight">RISMA 1202194153</a></span>
		</div>
		</footer>
	</body>
	</html>

	<div class="modal fade" id="modalCopyRight" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Created By</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			
			<div class="row">
				<div class="col-md-12">
					<table class="table">
						<tr>
							<td>Nama</td>
							<td>Risma</td>
						</tr>
						<tr>
							<td>NIM</td>
							<td>1202194153</td>
						</tr>
					</table>
				</div>
			</div>
			
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
		</div>
		</div>
	</div>
	</div>