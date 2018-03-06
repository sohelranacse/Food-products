<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Gallery</h3>
	</div>
	<div class="panel-body">
		<div class="table-responsive col-md-6">
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>SL</th>
						<th>Title</th>
						<th>Image</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				<?php
					$this->db->select("*");
		    		$gallery_info=$this->db->get("gallery");
		    		$i=1;
		    		foreach ($gallery_info->result_array() as $gallery_all) {
		            	$id = $gallery_all['id'];
		            	$title = $gallery_all['title'];
		        ?>
		        	<tr id="delg<?php echo $id; ?>">
						<td><?php echo $i++ ?></td>
						<td><?php echo $title ?></td>
						<td>
							<img src="<?php echo base_url() ?>assest/images/gallery/<?php echo $id; ?>.jpg" width="80" onerror="this.src='<?php echo base_url(); ?>assest/images/gallery/alt.jpg'";>
						</td>

						<td>
							<button value="<?php echo $id; ?>" class="btn btn-sm btn-info" onclick="editgallery(this)" class="btn btn-sm btn-info" data-toggle="modal" data-target="#editmodalg"><i class="icofont icofont-edit"></i></button>
							<button value="<?php echo $id; ?>" class="btn btn-sm btn-danger" onclick="confirm('Are You Sure to Delete !'); deletegallery(this)" class="btn btn-sm btn-danger"><i class="icofont icofont-trash"></i></button>
						</td>
					</tr>

		        <?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div> <!-- panel end -->
<div class="modal fade" id="editmodalg">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icofont icofont-ui-close"></i></button>
				<h4 class="modal-title">Update Gallery</h4>
			</div>
			<div class="modal-body" id="upcatresult">
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>