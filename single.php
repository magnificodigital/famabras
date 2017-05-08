<?php get_header(); ?>
 
<head>
    <link type="text/css" href="<?php echo plugins_url()."/ml-slider/assets/sliders/flexslider/flexslider.css"; ?>" rel="stylesheet" media="all" />
</head>

        <div id="container">
            <div id="content">

				<?php the_post(); ?>

                <div class="pages" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                	<div class="row_verde">
                        <div class="container">
                            <h1>BLOG</h1>
                            <h5>Encontre aqui novidades do mercado, dicas técnicas e muito mais.</h5>
                        </div>
                    </div>
					
					<div class="entry-content">
						<div class="container">
							<div class="row">
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	                                	<h1 class="entry-title" style="margin-bottom: 40px;"><?php the_title(); ?></h1>
										<?php the_content(); ?>
									</div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 sidebar">
	                                <?php get_sidebar(); ?>
	                            </div>
							</div>
							<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'hbd-theme' ) . '&after=</div>') ?>
						</div>
					</div><!-- .entry-utility --> 
            
 				<?php comments_template('', true); ?>

            </div><!-- #content -->
        </div><!-- #container -->
 
<?php get_footer(); ?>