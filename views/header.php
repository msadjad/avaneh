<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo $this->title;?></title>
        <meta charset="utf-8">
        <meta name="description" content="Avaneh-Soushiant.com is a grain packaging companies official website">
        <meta name="keywords" content="soushiant, avaneh, grains, packaging, <?php echo ($this->type); ?>">
        <meta name="author" content="Mohammad Sadjad Fallah">
        <link rel="stylesheet" href="<?php echo URL;?>public/css/style.css">
        <script src="<?php echo URL;?>public/js/jquery-1.7.1.min.js"></script>
        <script src="<?php echo URL;?>public/js/superfish.js"></script>
        <script src="<?php echo URL;?>public/js/jquery.easing.1.3.js"></script>
        <script src="<?php echo URL;?>public/js/tms-0.4.1.js"></script>
        <script src="<?php echo URL;?>public/js/slider.js"></script>
        <!--[if lt IE 8]>
           <div style=' clear: both; text-align:center; position: relative;'>
             <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
               <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
            </a>
          </div>
        <![endif]-->
        <!--[if lt IE 9]>
                <script src="js/html5.js"></script>
                <link rel="stylesheet" href="css/ie.css"> 
        <![endif]-->
    </head>
    <body>
        <div class="main-bg">
            <!-- Header -->
            <header>
                <div class="inner">
                    <h1 class="logo"><a href="home.html">Avaneh-Soushiant - Grain Packaging Company</a></h1>
                    <nav>
                        <ul class="sf-menu">
                            <li <?php if($this->type == "home") echo "class=\"current\""; ?>><a href="<?php echo URL;?>index">home</a></li>
                            <li <?php if($this->type == "products") echo "class=\"current\""; ?>><a href="<?php echo URL;?>products">products</a></li>
                            <!--li <?php /* if($this->type == "news") echo "class=\"current\""; ?>><a href="<?php echo URL;*/ ?>news">news</a></li-->
                            <li <?php if($this->type == "aboutus") echo "class=\"current\""; ?>><a href="<?php echo URL;?>aboutus">about us</a></li>
                            <li <?php if($this->type == "contactus") echo "class=\"current\""; ?>><a href="<?php echo URL;?>contactus">contact us</a></li>
                        </ul>
                    </nav>
                    <div class="clear"></div>
                </div>
            </header>