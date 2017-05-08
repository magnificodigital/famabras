<?php 
	/*
		Template Name: Blog
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
                            <img src="<?php echo types_render_field("imagem-header", array("output"=>"raw")); ?>" />
                        </div>
                    <?php
                        endif;
                    ?>
                    <div class="entry-content">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                    <?php
                                        $args3 = array(
                                            'post_type' => 'post',
                                            'posts_per_page' => 6
                                        );

                                        $query_posts = new WP_Query($args3);

                                        if(!$query_posts->have_posts())
                                        {
                                            echo "Nenhum post no blog encontrado.";
                                        }
                                        else
                                        {
                                            while ( $query_posts->have_posts() ) : $query_posts->the_post();

                                                $image_vitrine = types_render_field("imagem-da-vitrine", array("output"=>"raw"));
                                            
                                    ?>

                                        <div class="post-blog">
                                            <div class="col-lg-1 col-md-1 col-sm-1 hidden-xs"></div>
                                            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                                <h3><?php the_title(); ?></h3>
                                                <div class="img-vitrine-blog">
                                                    <img src="<?php echo $image_vitrine; ?>">
                                                </div>
                                                <p><?php the_excerpt(); ?></p>
                                                <a href="<?php the_permalink(); ?>" class="bt-saiba-mais">Saiba mais</a>
                                            </div>
                                            <div class="col-lg-1 col-md-1 col-sm-1 hidden-xs"></div>
                                        </div>

                                    <?php
                                        endwhile;
                                    }
                                    ?>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 sidebar">
                                    <?php get_sidebar(); ?>
                                </div>
                            </div>
                        </div>
                    </div><!-- .entry-content -->
                </div><!-- #post-<?php the_ID(); ?> -->                  
 
            </div><!-- #content -->
        </div><!-- #container -->
        
        <script src="<?php echo get_bloginfo('template_url')."/assets/js/jquery.flexslider-min.js" ?>"></script>
        <?php get_template_part( 'depoimentos', 'template' ); ?>

        <?php edit_post_link( __( 'Edit', 'your-theme' ), '<span class="edit-link">', '</span>' ) ?>
 
<?php get_footer(); ?>