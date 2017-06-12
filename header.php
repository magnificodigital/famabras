<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
    <title><?php
        if ( is_single() ) { single_post_title(); }
        elseif ( is_home() || is_front_page() ) { bloginfo('name'); print ' | '; bloginfo('description'); get_page_number(); }
        elseif ( is_page() ) { single_post_title(''); }
        elseif ( is_search() ) { bloginfo('name'); print ' | Resultados para ' . wp_specialchars($s); get_page_number(); }
        elseif ( is_404() ) { bloginfo('name'); print ' | Not Found'; }
        else { bloginfo('name'); wp_title('|'); get_page_number(); }
    ?></title>
 
    <meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1">
 
    <link rel="stylesheet" href="<?php echo get_bloginfo('template_url')."/assets/css/bootstrap.min.css"; ?>" />

    <link type="text/css" href="<?php echo get_bloginfo('template_url')."/assets/css/jquery.jscrollpane.css"; ?>" rel="stylesheet" media="all" />



    <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_bloginfo('template_url')."/assets/css/media-queries.css"; ?>" />

    <link type="text/css" href="<?php echo get_bloginfo('template_url')."/assets/css/navigation.css"; ?>" rel="stylesheet" media="all" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.6.3/flexslider.min.css">
 
    <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

    <?php wp_head(); ?>
 
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    
    <script type="text/javascript">//<![CDATA[
            // Google Analytics
            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-66325188-1']);
                            _gaq.push(['_trackPageview']);
            (function () {
                var ga = document.createElement('script');
                ga.type = 'text/javascript';
                ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';

                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(ga, s);
            })();
//]]></script>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WHBDRM6');</script>
<!-- End Google Tag Manager -->

</head>
<body>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WHBDRM6"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<div id="wrapper" class="hfeed">
	<header>
	    <div id="header">
	        <div class="container">
		        <div class="header">
		            <nav class="navbar navbar-default">
		                <div class="container-fluid">
		                    <div class="navbar-header">
		                      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		                        <span class="sr-only">Toggle navigation</span>
		                        <span class="icon-bar"></span>
		                        <span class="icon-bar"></span>
		                        <span class="icon-bar"></span>
		                      </button>
		                      <a class="navbar-brand" href="<?php echo get_bloginfo('url'); ?>"><img src="<?php echo get_bloginfo('template_url')."/assets/images/logo_farmabras.png"; ?>" /></a>
		                    </div>
		                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		                        <ul class="nav navbar-nav openBold">
		                            <?php
									
										$menuParameters = array(
										  'theme_location'  => 'header-menu',
										  'container'       => '',
										  'echo'            => false,
										  'items_wrap'      => '%3$s',
										  'depth'           => 0,
										);
								        
								        //echo wp_nav_menu( $menuParameters );

								        $options = array(
										  'echo' => false,
										  'container' => ''
										);

										$menu = wp_nav_menu($options);
										echo preg_replace( array( '#^<ul[^>]*>#', '#</ul>$#' ), '', $menu );
							        ?>
		                        </ul>
		                    </div>
		                    <div class="box-search">
		                    	<div class="icon-search">
									<img src="<?php echo get_bloginfo('template_url')."/assets/images/lupa_icon.jpg"; ?>" height="21" width="20">
								</div>
								<div class="box-form-search">
									<form action="<?php echo get_bloginfo('url'); ?>" method="get">
										<input name="s" type="text" class="input_search" placeholder="Qual produto você está procurando?" />
										<input type="submit" value="Buscar" class="bt-buscar">
									</form>
								</div>
		                    </div>
		                </div>
		            </nav>
		        </div>
		    </div>
	    </div><!-- #header -->
	</header>
 
    <div id="main">