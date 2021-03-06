<?php 

	/*
		Template Name: Thank You Page
	*/

	get_header();

?>

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
            
            <div class="entry-content">
                <div class="container"> 
                    <div class="row">
                        <div class="col-lg-1 col-md-1 col-sm-1 hidden-xs"></div>
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12" style="text-align: center;">
                            <?php the_content(); ?>
                        </div>
                        <div class="col-lg-1 col-md-1 col-sm-1 hidden-xs"></div>
                    </div>
                </div>
            </div><!-- .entry-content -->
        </div><!-- #post-<?php the_ID(); ?> -->

        <?php
            $image_header = types_render_field("imagem-header", array("output"=>"raw"));

            if(isset($image_header) && !empty($image_header)) :
        ?>
            <div id="map"></div>
        <?php
            endif;
        ?>          

    </div><!-- #content -->
</div><!-- #container -->
		 
<?php get_footer(); ?>