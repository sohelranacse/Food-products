<?php
if ($proid) {
$this->db->where("id", $proid);
$products_info=$this->db->get("products");
foreach ($products_info->result_array() as $products_all) {
    $id = $products_all['id'];
    $title = $products_all['title'];
    $body = $products_all['body'];
?>

<div class="page-bg-section padding-top-50">

</div>

<div class="content-page-section">
	<div class="container content-page">
		<div class="row">
			<div class="col-md-12 text-center">
				<h2 class="wow fadeInDown"><?php echo $title; ?></h2>
				<hr class="blue wow fadeInUp">
			</div>
		</div>


		<div class="row">
			<div class="col-md-5">
				<img src="<?php echo base_url() ?>assest/images/products/<?php echo $id; ?>_big.jpg" onerror="this.src='<?php echo base_url(); ?>assest/images/products/alt.jpg'">
			</div>
			<div class="col-md-7">
				<?php echo $body; ?>
			</div>
		</div>
	</div>
</div>



<?php }} ?>