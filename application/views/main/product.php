<?php
if ($productid) {
$this->db->where("proid", $productid);
$product_info=$this->db->get("product");
foreach ($product_info->result_array() as $product_cat_all) {
	$name = $product_cat_all['name'];
?>
<div class="page-bg-section padding-top-50"></div>

<div class="content-page-section">
	<div class="container content-page">
		<div class="row">
			<div class="col-md-12 text-center">
				<h2 class="wow fadeInDown"><?php echo $name; ?></h2>
				<hr class="blue wow fadeInUp">
			</div>
		</div>

		<div class="row text-center">
		<?php
		$this->db->where("proid", $productid);
		$this->db->order_by("id", "desc");
		$products_info=$this->db->get("products");
		foreach ($products_info->result_array() as $products_all) {
			$id = $products_all['id'];
			$title = $products_all['title'];
			$body = substr($products_all['body'],0,200).'...';
		?>
			<div class="col-md-3">
				
				<div class="single-item wow fadeInUp" data-wow-delay="800ms">
					<div class="image-hover-image">
					    <img src="<?php echo base_url() ?>assest/images/products/<?php echo $id; ?>_big.jpg" onerror="this.src='<?php echo base_url(); ?>assest/images/products/alt.jpg'">
					</div>
					<div class="image-hover-text">
						<a href="#modal<?php echo $id; ?>" data-toggle="modal" onclick="modal_show(<?php echo $id; ?>);">
						    <div class="image-hover-text-bubble">
						      <span class="image-hover-text-title"><?php echo $title; ?></span>
						      <?php echo $body; ?>
						    </div>
					    </a>
					</div>
				</div>
			</div>
			<div id="modal<?php echo $id; ?>" class="modal fade" role="dialog">
			    <div class="modal-dialog">

			        <!-- Modal content-->
			        <div class="modal-content">
			            <div class="modal-header">
			                <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>
			            </div>


			            <div class="modal-body text-left modalsresult">
			                

			                
			            </div>


			            <div class="modal-footer">
			                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			            </div>
			        </div>

			    </div>
			</div>
		<?php } ?>


		</div>


	</div>
</div>



<?php }} ?>
<script type="text/javascript">
	function modal_show(dataid){
		var id = dataid;
		$.ajax({
	        type: "POST",
	        url:'<?php echo base_url(); ?>mains/modal_show',
	        data: {id:""+id+""}
	      }).done (function(data) { 
	           $(".modalsresult").html(data);
	        }).fail (function()  {       
	    });
	}
</script>