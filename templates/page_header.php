<?php 
	/*
		Template Name: Page Header
	*/

get_header(); ?>
<head>
    <link type="text/css" href="<?php echo plugins_url()."/ml-slider/assets/sliders/flexslider/flexslider.css"; ?>" rel="stylesheet" media="all" />
</head>
 
        <div id="container">
            <div id="content">
 
<?php the_post(); ?>
 
                <div class="pages" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="row_verde">
                        <div class="container">
                            <h1><?php echo types_render_field("titulo-pagina", array("output"=>"html"));  ?></h1>
                            <h5><?php echo types_render_field("sub-titulo", array("output"=>"html"));  ?></h5>
                        </div>
                    </div>
                    <?php
                        $image_header = types_render_field("imagem-header", array("output"=>"raw"));

                        if(isset($image_header) && !empty($image_header)) :
                    ?>
                        <div class="img-header-page">
                            <img src="<?php echo types_render_field("imagem-header", array("output"=>"raw")); ?>" alt="<?php echo get_the_title(); ?>" />
                        </div>
                    <?php
                        endif;
                    ?>
                    <div class="entry-content">
                        <div class="container"> 
                            <div class="row">
                                <div class="col-lg-1 col-md-1 col-sm-1 hidden-xs"></div>
                                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                    <?php get_template_part('templates/breadcrumbs'); ?>
                                    <?php the_content(); ?>
                                </div>
                                <div class="col-lg-1 col-md-1 col-sm-1 hidden-xs"></div>
                            </div>
                        </div>
                    </div><!-- .entry-content -->
                </div><!-- #post-<?php the_ID(); ?> -->                  
 
            </div><!-- #content -->
        </div><!-- #container -->

        <script src="<?php echo get_bloginfo('template_url')."/assets/js/jquery.flexslider-min.js" ?>"></script>

        <?php //get_template_part( 'depoimentos', 'template' ); ?>

        <?php edit_post_link( __( 'Edit', 'your-theme' ), '<span class="edit-link">', '</span>' ) ?>
 
<?php get_footer(); ?>