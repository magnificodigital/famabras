<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
    <title><?php
        if ( is_single() ) { single_post_title(); }
        elseif ( is_home() || is_front_page() ) { bloginfo('name'); print ' | '; bloginfo('description'); get_page_number(); }
        elseif ( is_page() ) { single_post_title(''); }
        elseif ( is_search() ) { bloginfo('name'); print ' | Search results for ' . wp_specialchars($s); get_page_number(); }
        elseif ( is_404() ) { bloginfo('name'); print ' | Not Found'; }
        else { bloginfo('name'); wp_title('|'); get_page_number(); }
    ?></title>
 
    <meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1">
 
    <link rel="stylesheet" href="<?php echo get_bloginfo('template_url')."/assets/css/bootstrap.min.css"; ?>" />

    <link type="text/css" href="<?php echo get_bloginfo('template_url')."/assets/css/jquery.jscrollpane.css"; ?>" rel="stylesheet" media="all" />

    <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_bloginfo('template_url')."/assets/css/media-queries.css"; ?>" />
 
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
</head>
<body>
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
									<form action="<?php echo get_bloginfo('url')."/resultado-busca/"; ?>" method="post">
										<input name="termo" type="text" class="input_search" placeholder="Qual produto você está procurando?" />
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