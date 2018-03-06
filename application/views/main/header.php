<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--favicon icon-->
    <link rel="icon" type="image/png" href="<?php echo base_url() ?>home_assest/img/favicon.png">

    <title><?php echo $title; ?></title>
    <meta property="og:image" content="http://peoriafoods.com/blank.jpg"/>

    
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google fonts - witch you want to use - (rest you can just remove) -->
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,300italic,400italic,700italic,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,700' rel='stylesheet' type='text/css'>

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="stylesheet" href="<?php echo base_url() ?>home_assest/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://peoriafoods.com/home_assest/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>home_assest/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>home_assest/css/animate.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>home_assest/slide/style_new.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>home_assest/css/normalize.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>home_assest/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>home_assest/css/main.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>home_assest/style.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>home_assest/responsive.css">
    <script src="<?php echo base_url() ?>home_assest/js/vendor/modernizr-2.6.2.min.js"></script>
</head>

<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=274974622694148";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
    <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <!-- Add your site or application content here -->

    <header class="headar_area navbar-fixed-top">
        <!-- Fixed navbar -->
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo base_url() ?>mains/">
                        <div class="logo"><img src="<?php echo base_url() ?>home_assest/img/logo.png"></div>
                    </a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?php echo base_url() ?>mains/">Home</a></li>
                        
                        <li class="dropdown">
                            <a class="dropdown-toggle disabled" href="<?php echo base_url() ?>mains/company_about">About Company<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url() ?>mains/company_about">About Us</a></li>
                                <li><a href="<?php echo base_url() ?>mains/company_directors">Board of Directors</a></li>
                                <li><a href="<?php echo base_url() ?>mains/company_chairman_message">Chairman's Message</a></li>
                                <li><a href="<?php echo base_url() ?>mains/company_md_message">MD's Message</a></li>
                            </ul>
                        </li>
                        
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Product <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <?php 
                                $this->db->select("*");
                                $product=$this->db->get("product");
                                foreach ($product->result_array() as $product_info) {
                                    $id = $product_info['proid'];
                                    $name = $product_info['name'];
                                ?>
                                <li><a href="<?php echo base_url().'mains/product/'.$id; ?>"><?php echo $name; ?></a></li>
                                <?php } ?>
                            </ul>
                        </li>
                        
                        <!--li><a href="<?php echo base_url() ?>mains/concern">Concern</a></li-->
                        <li><a href="<?php echo base_url() ?>mains/export">Export</a></li>
                        <li><a href="<?php echo base_url() ?>mains/gallery">Gallery</a></li>
                        <li><a href="<?php echo base_url() ?>mains/contact">Contact</a></li>
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
        </nav>
    </header>