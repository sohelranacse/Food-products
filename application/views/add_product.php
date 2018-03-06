<script src="http://cdn.ckeditor.com/4.6.2/standard-all/ckeditor.js"></script>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Product</h3>
	</div>
	<div class="panel-body">
		<form action="<?php echo base_url() ?>home/productadded" method="POST" role="form" enctype="multipart/form-data">
			<div class="col-md-6">
				<div class="form-group">
					<label for="">Product Category</label> <span class="label label-danger">*</span>
					<select name="proid" class="form-control">
						<option value="">Select Category</option>
						<?php 
						$this->db->select("*");
			    		$product_info=$this->db->get("product");
			    		foreach ($product_info->result_array() as $product_cat_all) {
			            	$id = $product_cat_all['proid'];
			            	$name = $product_cat_all['name'];
						?>
						<option value="<?php echo $id; ?>"><?php echo $name; ?></option>
						<?php } ?>

					</select>
				</div>
				
				<div class="form-group">
					<label for="">Product Name</label>  <span class="label label-danger">*</span>
					<input type="text" class="form-control" name="title" placeholder="Product Name" required>
				</div>
				<div class="form-group imageform">
					<label for="">Image</label>
					<input type="file" name="userfile">
				</div>
				<button type="submit" class="btn btn-primary" name="added">SUBMIT</button>
			</div>

			<div class="col-md-6">

				<div class="form-group">
					<label for="">Description</label>
					<textarea class="form-control" name="body" height="100"></textarea>
				</div>
				<script>
	                CKEDITOR.replace( 'body' );
	            </script>
            </div>

			
		</form>
	</div>
</div> <!-- panel end -->