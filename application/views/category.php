<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Category</h3>
	</div>
	<div class="panel-body">

		<div role="tabpanel col-md-6">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active">
					<a href="#All" aria-controls="home" role="tab" data-toggle="tab">All Category</a>
				</li>
				<li role="presentation">
					<a href="#Added" aria-controls="tab" role="tab" data-toggle="tab">Added Category</a>
				</li>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="All">
					<div class="table-responsive">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>SL</th>
									<th>Category Name</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
                                $this->db->select("*");
                                $i = 1;
                                $product=$this->db->get("product");
                                foreach ($product->result_array() as $product_info) {
                                    $id = $product_info['proid'];
                                    $name = $product_info['name'];
                                ?>
								<tr id="del<?php echo $id; ?>">
									<td><?php echo $i++; ?></td>
									<td><?php echo $name; ?></td>
									<td>
										<button value="<?php echo $id; ?>" class="btn btn-sm btn-info" onclick="editcat(this)" class="btn btn-sm btn-info" data-toggle="modal" data-target="#editmodal"><i class="icofont icofont-edit"></i></button>

										<button value="<?php echo $id; ?>" class="btn btn-sm btn-danger" onclick="confirm('Are You Sure to Delete !'); deletecat(this)" class="btn btn-sm btn-danger"><i class="icofont icofont-trash"></i></button>
									</td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
				<div role="tabpanel" class="tab-pane" id="Added">
					<form action="<?php echo base_url() ?>home/categoryadded" method="POST" role="form" class="col-md-6">		
		
						<div class="form-group imageform">
							<label for="">Category Name</label>
							<input type="text" name="name" class="form-control" required placeholder="Category Name">
						</div>
					
						
					
						<button type="submit" class="btn btn-primary" name="added">Added</button>
					</form>
				</div>
			</div>


		</div>
		
	</div>
</div> <!-- panel end -->
<div class="modal fade" id="editmodal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icofont icofont-ui-close"></i></button>
				<h4 class="modal-title">Update Category</h4>
			</div>
			<div class="modal-body" id="upcatresult">
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>