<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Products</h3>
	</div>
	<div class="panel-body">
		<div role="tabpanel">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active">
					<a href="#allpro" aria-controls="home" role="tab" data-toggle="tab">All Products</a>
				</li>
				<li role="presentation">
					<a href="#searchpro" aria-controls="tab" role="tab" data-toggle="tab">Search Products</a>
				</li>
			</ul>
		
			<!-- Tab panes -->
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="allpro">
					<div class="table-responsive">
						<table class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>SL</th>
									<th>Title</th>
									<th>Category</th>
									<th>Image</th>
									<th>Thumb</th>
									<th width="30%">Description</th>
									<th width="10%">Action</th>
								</tr>
							</thead>
							<tbody>
							<?php
					    		$i=1;
					    		foreach ($results as $gallery_all) {
					            	$id = $gallery_all->id;
					            	$title = $gallery_all->title;
					            	$category = $gallery_all->name;
					            	$body = substr($gallery_all->body,0,100).'...';
					        ?>
					        	<tr id="delp<?php echo $id; ?>">
									<td><?php echo $i++ ?></td>
									<td><?php echo $title ?></td>
									<td><?php echo $category ?></td>
									<td>
										<img src="<?php echo base_url() ?>assest/images/products/<?php echo $id; ?>_big.jpg" width="100" onerror="this.src='<?php echo base_url(); ?>assest/images/products/alt.jpg'";>
									</td>
									<td>
										<img src="<?php echo base_url() ?>assest/images/products/<?php echo $id; ?>_thumb.jpg" width="80" onerror="this.src='<?php echo base_url(); ?>assest/images/products/alt.jpg'";>
									</td>

									<td><?php echo $body ?></td>

									<td>
										<button value="<?php echo $id; ?>" class="btn btn-sm btn-info" onclick="editproduct(this)" class="btn btn-sm btn-info" data-toggle="modal" data-target="#editmodalp"><i class="icofont icofont-edit"></i></button>
										<button value="<?php echo $id; ?>" class="btn btn-sm btn-danger" onclick="confirm('Are You Sure to Delete !'); deleteproduct(this)" class="btn btn-sm btn-danger"><i class="icofont icofont-trash"></i></button>
									</td>
								</tr>

					        <?php } ?>

							</tbody>
						</table>
					</div>
					<?php echo $links; ?>
				</div>
				<div role="tabpanel" class="tab-pane" id="searchpro">

						<div class="form-group col-md-6 col-sm-6" style="padding:0;">
							<select id="seachproid" class="form-control">
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
						<div class="form-group col-md-6 col-sm-6">
							<button class="btn btn-default" onclick="searchclick()"><i class="icofont icofont-search"></i></button>
						</div>
					<div id="searchresultpro"></div>

				</div>
			</div>
		</div>
					


	</div>
</div> <!-- panel end -->






<style>
	.paginations>a,.paginations>strong{border:1px solid #eee;padding:8px 10px;transition: 0.5s;outline: 0 none;}
	.paginations>a:hover,.paginations>strong:hover{background: #eee;text-decoration: none;}
</style>

   

<div class="modal fade" id="editmodalp">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icofont icofont-ui-close"></i></button>
				<h4 class="modal-title">Update Product</h4>
				<script src="http://cdn.ckeditor.com/4.6.2/standard-all/ckeditor.js"></script>
			</div>
			<div class="modal-body" id="upcatresult">
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>