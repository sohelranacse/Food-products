    <!--div class="home-slider">
        <div class="banner">
            <div class="bg-white"></div>
            <div id="wowslider-container1">
                <div class="ws_images">
                <ul>
                    <li><img src="<?php echo base_url() ?>home_assest/img/slider_img_1.jpg" id="wows1_0" /></li>
                    <li><img src="<?php echo base_url() ?>home_assest/img/slider_img_2.jpg" id="wows1_1" /></li>
                </ul>
            </div>

                <div class="ws_bullets">
                    <div>
                        <a href="#"><span>1</span></a>
                        <a href="#"><span>2</span></a>
                    </div>
                </div>
                <div class="ws_shadow"></div>
            </div>
        </div>
     </div-->
     
<div class="home-slider"> 
     <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel" data-slide-to="0" class=""></li>
            <li data-target="#carousel" data-slide-to="1" class="active"></li>
            <li data-target="#carousel" data-slide-to="2" class=""></li>
            <li data-target="#carousel" data-slide-to="3" class=""></li>
        </ol>
    
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="<?php echo base_url() ?>home_assest/img/slider_img_1.jpg">
            </div>
    
            <div class="item">
                <img src="<?php echo base_url() ?>home_assest/img/slider_img_2.jpg">
            </div>
    
            <div class="item">
                <img src="<?php echo base_url() ?>home_assest/img/slider_img_3.jpg">
            </div>
            
             <div class="item">
                <img src="<?php echo base_url() ?>home_assest/img/slider_img_4.jpg">
            </div>
        </div>
    </div>
</div>    

    <!--div class="chairman_home">
        <div class="row">
            <div class="col-md-6 chairman_msg_lf">
                <div class="row">
                    <div class="col-md-7 cmo">
                        <img src="<?php echo base_url() ?>home_assest/img/chairman-image.jpg">
                    </div>
                    <div class="col-md-5 text-center">
                        <h3>Al-Haj Md. Shah Alam</h3>
                        <p>The Founder of Fulkoli</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 chairman_msg_rt">
                <h2>Al-Haj Md. Shah Alam</h2>
                <p>Al-Haj Md. Shah Alam was born in a famous family in Shatkania in Chittagong district.He is a strong minded businessman. This long active man is very honest from his childhood.His primary business oriented with export-import business. In this sector, he got a lot of names, inspirations & goodwill to go to success.</p>
            </div>
        </div>
    </div-->

    <div class="home-update-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="home-update-box">
                        <div class="update-section">
                            <div class="col-md-12">
                                <div class="home-update-hdr">
                                    <h2><img src="<?php echo base_url() ?>home_assest/img/news-icon.png"> LATEST PRODUCT</h2>
                                </div>    
                            </div>
                        
                            <div class="brdr-line">
                                <div class="real_border_container sp">
                                    <div class="color1 wow fadeInUp" data-wow-delay="300ms" style="opacity: 1; top: 0px;"></div>
                                    <div class="color2 wow fadeInUp" data-wow-delay="600ms"  style="opacity: 1; top: 0px;"></div>
                                    <div class="color3 wow fadeInUp" data-wow-delay="900ms"  style="opacity: 1; top: 0px;"></div>
                                </div>
                            </div>
                        </div>
                        
                        <?php
                        $this->db->select("*");
                        $this->db->order_by("id","desc");
                        $this->db->limit("4");
                        $products_info=$this->db->get("products");
                        foreach ($products_info->result_array() as $products_all) {
                            $id = $products_all['id'];
                            $title = $products_all['title'];
                            $body = substr($products_all['body'],0,50).'...';
                        ?>
                        <div class="home-latest">
                            <a href="<?php echo base_url().'mains/productdetails/'.$id; ?>">
                                <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4">
                                    <img src="<?php echo base_url() ?>assest/images/products/<?php echo $id; ?>_thumb.jpg" onerror="this.src='<?php echo base_url(); ?>assest/images/products/alt.jpg'">
                                </div>
                                <div class="col-md-8 col-lg-8 col-sm-8 col-xs-8">
                                    <h2><?php echo $title; ?></h2>
                                   <?php echo $body; ?>
                                </div>
                            </a>
                        </div>
                        <?php } ?>

                    </div>    
                </div>

                <div class="col-md-4">
                    <div class="home-update-box">
                        <div class="row update-section">
                            <div class="col-md-12">
                                <div class="home-update-hdr">
                                    <h2><img src="<?php echo base_url() ?>home_assest/img/news-icon.png"> OUR MISSION</h2>
                                </div>    
                            </div>
                        
                            <div class="brdr-line">
                                <div class="real_border_container sp">
                                    <div class="color1 wow fadeInUp" data-wow-delay="300ms" style="opacity: 1; top: 0px;"></div>
                                    <div class="color2 wow fadeInUp" data-wow-delay="600ms"  style="opacity: 1; top: 0px;"></div>
                                    <div class="color3 wow fadeInUp" data-wow-delay="900ms"  style="opacity: 1; top: 0px;"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <p>Our Mission is to "Committed to Serve the Best".<br> We are dedicated to our promise of delivering the best quality products to consumers Who have relied on us for a long time. We are committed in produeing cookies, rusk, Bread, cake & snacks items to suit local tostes as well as international standards. <a href="<?php echo base_url() ?>mains/mission">...Read More</a></p>
                            </div>
                        </div>

                    </div>    
                </div>

                <div class="col-md-4">
                    <div class="home-update-box">
                        <div class="row update-section">
                            <div class="col-md-12">
                                <div class="home-update-hdr">
                                    <h2><img src="<?php echo base_url() ?>home_assest/img/news-icon.png"> OUR VISION</h2>
                                </div>    
                            </div>
                        
                            <div class="brdr-line">
                                <div class="real_border_container sp">
                                    <div class="color1 wow fadeInUp" data-wow-delay="300ms" style="opacity: 1; top: 0px;"></div>
                                    <div class="color2 wow fadeInUp" data-wow-delay="600ms"  style="opacity: 1; top: 0px;"></div>
                                    <div class="color3 wow fadeInUp" data-wow-delay="900ms"  style="opacity: 1; top: 0px;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p>To build or our success & high standards in the food manufacturing industry. We plan to enterd our oppration overseas thereby generating a logn-term rustairanble comperirive advabtage thus providing ruoeruion returns for our business partners. <a href="<?php echo base_url() ?>mains/vision">...Read More</a></p>
                            </div>
                        </div>


                    </div>    
                </div>
                
                
            </div>
        </div>
    </div>


    <div class="home-video-section">
        <div class="container home-video">
            <!--div class="row">
                <div class="col-md-12">
                    <div class="team-hdr text-center">VIDEOS</div>
                    <div class="brdr-line">
                        <div class="real_border_container sp">
                            <div class="color1 wow fadeInUp" data-wow-delay="300ms" style="opacity: 1; top: 0px;"></div>
                            <div class="color2 wow fadeInUp" data-wow-delay="600ms"  style="opacity: 1; top: 0px;"></div>
                            <div class="color3 wow fadeInUp" data-wow-delay="900ms"  style="opacity: 1; top: 0px;"></div>
                        </div>
                    </div>
                </div>
            </div-->

            <div class="row">
                <div class="col-md-6">
                    <div class="home-video">
                        <div id="amazingslider-wrapper-1" style="display:block;position:relative;">
                            <div id="amazingslider-1" style="display:block;position:relative;margin:0 auto;">
                                <ul class="amazingslider-slides" style="display:none;">
                                    <li>
                                        <img src="<?php echo base_url() ?>home_assest/uploads/hme_video/video_thumb.png" />
                                        <!--video preload="none" src="https://www.youtube.com/v/2mfQC4vwT1c"></video-->
                                        <video src="https://www.youtube.com/watch?v=2mfQC4vwT1c"></video>
                                    </li>
                                </ul>
                                
                                <ul class="amazingslider-thumbnails" style="display:none;">
                                    <li><img src="<?php echo base_url() ?>home_assest/uploads/hme_video/thumb/video.png" /></li>
                                </ul>
                            </div>
                        </div>
                    </div> 
                </div>
                <!--div class="col-md-6 vmo pt100">
                    <h2 class="wow fadeInRight" data-wow-delay="300ms">Peoria Company in 2017.</h2>
                    <p class="wow fadeInRight" data-wow-delay="600ms">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                </div-->
                
                <div class="col-md-6">
                    <img src="<?php echo base_url() ?>home_assest/img/featured-item.png"/>
                    <h2 class="wow fadeInRight text-center" data-wow-delay="300ms">Featured Item</h2>
                </div>
            </div>


            <!--div class="row">
                <div class="col-md-12">
                    <div class="team-hdr text-center pt125">OUR TEAM</div>
                    <div class="brdr-line">
                        <div class="real_border_container sp">
                            <div class="color1 wow fadeInUp" data-wow-delay="300ms" style="opacity: 1; top: 0px;"></div>
                            <div class="color2 wow fadeInUp" data-wow-delay="600ms"  style="opacity: 1; top: 0px;"></div>
                            <div class="color3 wow fadeInUp" data-wow-delay="900ms"  style="opacity: 1; top: 0px;"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 text-center">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                </div>
            </div-->
        </div>
    </div>

    <div class="global_map"><img src="<?php echo base_url() ?>home_assest/images/global-bg.png" width="1877" height="280" alt=""></div>
    <div class='home-global-map'>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="home-global-hdr">GLOBAL PRESENCE</div>
                    <div class="brdr-line">
                        <div class="real_border_container sp">
                            <div class="color1 wow fadeInUp" data-wow-delay="300ms" style="opacity: 1; top: 0px;"></div>
                            <div class="color2 wow fadeInUp" data-wow-delay="600ms"  style="opacity: 1; top: 0px;"></div>
                            <div class="color3 wow fadeInUp" data-wow-delay="900ms"  style="opacity: 1; top: 0px;"></div>
                        </div>
                    </div>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <h3>WE ARE PREPARING <br/>TO SERVE TO THE GLOBE</h3>
                </div>
                <div class="col-md-6">
                    <img src="<?php echo base_url() ?>home_assest/img/global-map.png">
                </div>
            </div>
        </div>
    </div>

    <div class="slide_div">
        <div class="container">
            <div class='row'>
                <div class='col-md-12'>
                  <div class="carousel slide media-carousel" id="media">
                    <div class="carousel-inner">

                        <div class="item  active">
                            <div class="row">
                            <?php
                                $this->db->select("*");
                                $this->db->order_by("id","desc");
                                $this->db->limit("6","0");
                                $products_info=$this->db->get("products");
                                foreach ($products_info->result_array() as $products_all) {
                                    $id = $products_all['id'];
                                ?>
                              <div class="col-md-2">
                                <a class="thumbnail" href="<?php echo base_url().'mains/productdetails/'.$id; ?>">
                                    <img src="<?php echo base_url() ?>assest/images/products/<?php echo $id; ?>_thumb.jpg" onerror="this.src='<?php echo base_url(); ?>assest/images/products/alt.jpg'">
                                </a>
                              </div>
                            <?php } ?>

                            </div>
                        </div>
                        <div class="item">
                            <div class="row">

                              <?php
                                $this->db->select("*");
                                $this->db->order_by("id","RANDOM");
                                $this->db->limit("6","6");
                                $products_info=$this->db->get("products");
                                foreach ($products_info->result_array() as $products_all) {
                                    $id = $products_all['id'];
                                ?>
                              <div class="col-md-2">
                                <a class="thumbnail" href="<?php echo base_url().'mains/productdetails/'.$id; ?>">
                                    <img src="<?php echo base_url() ?>assest/images/products/<?php echo $id; ?>_thumb.jpg" onerror="this.src='<?php echo base_url(); ?>assest/images/products/alt.jpg'">
                                </a>
                              </div>
                            <?php } ?>

                            </div>
                        </div>


                    </div>
                    <a data-slide="prev" href="#media" class="left carousel-control"><i class="fa fa-angle-left"></i></a>
                    <a data-slide="next" href="#media" class="right carousel-control"><i class="fa fa-angle-right"></i></a>
                  </div>                          
                </div>
              </div>
        </div>
    </div>