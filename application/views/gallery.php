<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Gallery</h3>
	</div>
	<div class="panel-body">
		<form action="<?php echo base_url() ?>home/galleryadded" method="POST" role="form" enctype="multipart/form-data" class="col-md-6">
			
		
			<div class="form-group imageform">
				<label for="">Image</label>
				<input type="file" name="userfile" required>
			</div>
			<div class="form-group">
				<label for="">Image Title</label> 
				<input type="text" class="form-control" name="title" placeholder="Image Title" required>
			</div>
		
			
		
			<button type="submit" class="btn btn-primary" name="added">Added</button>
		</form>
	</div>
</div> <!-- panel end -->