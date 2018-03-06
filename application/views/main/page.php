<?php  if (isset($contact)) { ?>

<div class="contact-bg-section padding-top-50"></div>

<div class="content-page-section">
	<div class="container contact-page">
		<div class="row">
			<div class="col-md-12 text-center">
				<h2 class="wow fadeInDown">Get In Touch</h2>
				<hr class="blue wow fadeInUp">

				<p class="wow fadeInLeft" data-wow-delay="600ms">If you have comments or queries, write to us and we’ll contact you as soon as we can.</p>
		</div>
		<div class="row">	
			<div class="col-md-4">
				<strong>Corporate Office</strong><br/>
				1614/1656 Idrish Building (Ground Floor)<br/>
		    		Amair Ali Chowdury Road, Asadgonj.<br/>
                    		Chittagong, Bangladesh.<br/>
                    		Phone: +88 031 2855061, +88 031 2855062
                    		</p>
			</div>
			<div class="col-md-4">
				<p class="wow fadeInLeft" data-wow-delay="1200ms">
				<strong>Factory</strong><br/>
				Plot # 49/A 49/B, Sagarika Road<br/>
				Pahartali, Chittagogn, Bangladesh<br/>
				Phone: +88 031 2773376, 2773377<br/>
				Email: peoriafoods@gmail.com
                    		</p>
			</div>
			<div class="col-md-4 wow fadeInLeft" data-wow-delay="1200ms">
				<div class="fb-page" data-href="https://www.facebook.com/peoriafoods" data-tabs="timeline" data-height="128" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/peoriafoods" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/peoriafoods">Peoria Foods</a></blockquote></div>
			</div>
		</div>
	</div>
</div>

<div class="container padding-top-50">
	<div class="row">
		<script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyBDANiEJVuKVSGnvwUtJwhSxR8cgtYWRjI'></script><div style='overflow:hidden;height:400px;width:100%;'><div id='gmap_canvas' style='height:400px;width:100%;'></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div> <a href='http://maps-generator.com/'>google map embed</a> <script type='text/javascript' src='https://embedmaps.com/google-maps-authorization/script.js?id=293580c39da6c8ea1092dab295f360c441334dfd'></script><script type='text/javascript'>function init_map(){var myOptions = {zoom:12,center:new google.maps.LatLng(23.985571708029667,89.97231960296631),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(23.985571708029667,89.97231960296631)});infowindow = new google.maps.InfoWindow({content:'<strong>Peoria Foods</strong><br>1614/1656 Idrish Building (Ground Floor) Amair Ali Chowdury Road, Asadgonj.<br>4000 Chittagong<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>

	</div>
</div>

<?php } if (isset($gallery)) { ?>
<div class="page-bg-section padding-top-50">

</div>

<div class="content-page-section">
	<div class="container content-page">
		<div class="row">
			<div class="col-md-12 text-center">
				<h2 class="wow fadeInDown">Gallery</h2>
				<hr class="blue wow fadeInUp">
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-4">
			    <img src="https://scontent.fdac6-1.fna.fbcdn.net/v/t1.0-9/17522683_277097749406279_4126023178951628453_n.jpg?oh=ccb89bd559b928c6827f8d316b8a3bc9&oe=59DAE464">
			</div>
			<div class="col-md-4">
			    <img src="https://scontent.fdac6-1.fna.fbcdn.net/v/t1.0-9/17757406_277580859357968_8804072524686649399_n.jpg?oh=42bf8697d66a1f858d9c53d3ea792117&oe=59CF67B9">
			</div>
			<div class="col-md-4">
			    <img src="https://scontent.fdac6-1.fna.fbcdn.net/v/t1.0-9/17795875_278196509296403_3470762693383130523_n.jpg?oh=be3e02f2f2aa2891f78e83d9fa665803&oe=5A047861">
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class='list-group gallery'>

			<?php
				$this->db->select("*");
	    		$gallery_info=$this->db->get("gallery");
	    		foreach ($gallery_info->result_array() as $gallery_all) {
	            	$id = $gallery_all['id'];
	            	$title = $gallery_all['title'];
	        ?>
	            <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3'>
	                <a class="thumbnail fancybox" rel="ligthbox" href="<?php echo base_url() ?>assest/images/gallery/<?php echo $id; ?>.jpg">
	                    <img class="img-responsive" alt="" src="<?php echo base_url() ?>assest/images/gallery/<?php echo $id; ?>.jpg"  onerror="this.src='<?php echo base_url(); ?>assest/images/gallery/alt.jpg'"; />
	                    <div class='text-right'>
	                        <small class='text-muted'><?php echo $title ?></small>
	                    </div> <!-- text-right / end -->
	                </a>
	            </div> <!-- col-6 / end -->

			<?php } ?>

	        </div> <!-- list-group / end -->
		</div> <!-- row / end -->
	</div> <!-- container / end -->
</div>

<?php } if (isset($export)) { ?>
<div class="page-bg-section padding-top-50">

</div>

<div class="content-page-section">
	<div class="container content-page">
		<div class="row">
			<div class="col-md-12 text-center">
				<h2 class="wow fadeInDown">Export</h2>
				<hr class="blue wow fadeInUp">
			</div>
		</div>


		<div class="row">
			<div class="col-md-12">
				
			</div>
		</div>
	</div>
</div>

<?php } if (isset($company_about)) { ?>
    <div class="page-bg-section padding-top-50">

		</div>

		<div class="content-page-section">
			<div class="container company-page">
				<div class="row">
					<?php include ('page_nav.php'); ?>
					<div class="col-md-8">
						<h2>About Us</h2>

                        <p>Our Mission is to "Committed to Serve the Best".</p>
                        <p>We are dedicated to our promise of delivering the best quality products to consumers Who have relied on us for a long time. We are committed in produeing cookies, rusk, Bread, cake & snacks items to suit local tostes as well as international standards.</p>
						    
                        <p>To build or our success & high standards in the food manufacturing industry. We plan to enterd our oppration overseas thereby generating a logn-term rustairanble comperirive advabtage thus providing ruoeruion returns for our business partners.</p>    
					</div>
				</div>
			</div>
		</div>

<?php } if (isset($company_directors)) { ?>
    <div class="page-bg-section padding-top-50">

		</div>

		<div class="content-page-section">
			<div class="container company-page">
				<div class="row">
					<?php include ('page_nav.php'); ?>
					<div class="col-md-8">
						<h2>Board of Directors</h2>
						
						<div class="row text-center">
						    <div class="col-md-4 col-md-offset-2">
								<img src="<?php echo base_url() ?>home_assest/shah-alam.jpg">
								<h3>Shah Alam<br><span>Director & Founder</span></h3>
							</div>
							<div class="col-md-4">
								<img src="<?php echo base_url() ?>home_assest/iqbal-uddin.jpg">
								<h3>Iqbal Uddin<br><span>Chairman</span></h3>
							</div>
						</div>

						<div class="row text-center">
							<div class="col-md-4">
								<img src="<?php echo base_url() ?>home_assest/kafil-uddin.jpg">
								<h3>Kafil Uddin<br><span>Managing Director</span></h3>
							</div>
							<div class="col-md-4">
								<img src="<?php echo base_url() ?>home_assest/jahir-uddin.jpg">se
								<h3>Jahir Uddin<br><span>Director</span></h3>
							</div>
							<div class="col-md-4">
								<img src="<?php echo base_url() ?>home_assest/fahim-abrar.jpg">
								<h3>Fahim Abrar<br><span>Director</span></h3>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

<?php } if (isset($company_chairman_message)) { ?>
        <div class="page-bg-section padding-top-50">

		</div>

		<div class="content-page-section">
			<div class="container company-page">
				<div class="row">
					<?php include ('page_nav.php'); ?>
					<div class="col-md-8">
						<h2>Chairman's Message</h2>
						<div class="col-md-8">
							<p>An in-depth understanding of the Bangladeshi consumer psyche has helped us develop a marketing philosophy that reflects the needs of the Bangladeshi masses. We have made it a tradition to deliver both health and taste, with a value-for-money positioning that allows people from all classes and age groups to enjoy Peoria products to the fullest.</p>
						
						    <p>With a reach spanning the remotest villages of Bangladesh, the House of Peoria has become synonymous with trust, globally.</p>
						</div>
						<div class="col-md-4">
							<img src="<?php echo base_url() ?>home_assest/iqbal-uddin.jpg">
						</div>
					</div>
				</div>
			</div>
		</div>

<?php } if (isset($company_md_message)) { ?>

        <div class="page-bg-section padding-top-50">

		</div>

		<div class="content-page-section">
			<div class="container company-page">
				<div class="row">
					<?php include ('page_nav.php'); ?>
					<div class="col-md-8">
						<h2>MD's Message</h2>
						<div class="col-md-8">
							<p>Peoria Foods is a new mega-addition to Group of Industries, an organization that has been operating successfully in the field of confectionery and bakery products for the past 20 years.</p>

							<p>The foundations of our business are based on ethical and moral principles that have helped us tremendously in molding our dreams into reality, and in earning respect of the industry.</p>
						
						    <p>Our aim is to meet our strategic targets that will help us become a leader in the bakery and confectionery market, and ensure that every consumer is fully satisfied with our products.</p>
						</div>
						<div class="col-md-4">
							<img src="<?php echo base_url() ?>home_assest/kafil-uddin.jpg">
						</div>
						
						<div class="col-md-12">
						    <p>We are proud to have multitalented, skilled professionals on our team. Highly talented in all areas, this expert manpower has been the guiding force behind our safe and high standards of production. We believe in our employees and honor the devotion and sincerity they show towards the company. We know that with the support of our team we will expand into new ventures that will lead to progress and prosperity of not only the organization, but of the country as well.</p>	
						</div>
					</div>
				</div>
			</div>
		</div>
<?php } if (isset($company_testimonials)) { ?>

        <div class="page-bg-section padding-top-50">

		</div>

		<div class="content-page-section">
			<div class="container company-page">
				<div class="row">
					<?php include ('page_nav.php'); ?>
					<div class="col-md-8">
						<h2>Testimonials</h2>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>

						<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.</p>

						<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
					</div>
				</div>
			</div>
		</div><div class="page-bg-section padding-top-50">

		</div>

		<div class="content-page-section">
			<div class="container company-page">
				<div class="row">
					<?php include ('page_nav.php'); ?>
					<div class="col-md-8">
						<h2>Testimonials</h2>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>

						<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.</p>

						<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
					</div>
				</div>
			</div>
		</div>
<?php } if (isset($company_certification)) { ?>
        <div class="page-bg-section padding-top-50">

		</div>

		<div class="content-page-section">
			<div class="container company-page">
				<div class="row">
					<?php include ('page_nav.php'); ?>
					<div class="col-md-8">
						<h2>Certification</h2>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>

						<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.</p>

						<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
					</div>
				</div>
			</div>
		</div>
<?php } if (isset($company_social_responsibility)) { ?>

    <div class="page-bg-section padding-top-50">

		</div>

		<div class="content-page-section">
			<div class="container company-page">
				<div class="row">
					<?php include ('page_nav.php'); ?>
					<div class="col-md-8">
						<h2>Social Responsibility</h2>

						<p>We are not only contributors to business deals but also social welfare in the country. The social and cultural constructions should have strong development, according to us. Our company thinks that philanthropic activities achieve a peaceful nation. We make our nation; we want to develop our nation. By realizing it, we think that we have many social responsibilities as:</p>

						<ul>
							<li>- Blood donation</li>
							<li>- Mosque, Madarasa, Holy place, Holy donation, Orphanage funds</li>
							<li>- Madarasa, school, college establish</li>
							<li>- Donate scholarship to the meritorious students among the various institutions</li>
							<li>- Tree plantation in roadside and other areas.</li>
							<li>- Participation in the big government occasion.</li>
							<li>- Help the poor and helpless person in society.</li>
							<li>- Donate in residential & sanitation to the poor & helpless men.</li>
						</ul>
					</div>
				</div>
			</div>
		</div>

<?php } ?>