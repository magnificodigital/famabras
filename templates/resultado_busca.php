<?php

    if(isset($_GET['termo'])) {
        $termo = $_GET['termo'];
    } 

	/*
		Template Name: Resultado Busca
	*/

get_header(); 

?>
<head>
    <link type="text/css" href="<?php echo plugins_url()."/ml-slider/assets/sliders/flexslider/flexslider.css"; ?>" rel="stylesheet" media="all" />
</head>
 
        <div id="container">
            <div id="content">
 
                <?php the_post(); ?>
 
                <div class="pages" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="row_verde">
                        <div class="container">
                            <h1>Busca de produtos</h1>
                            <h5>Termo buscado: <?php echo $termo; ?></h5>
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
                                    <h1>Resultados encontrados:</h1>
                                    <div class="listagem-produtos">
                                        <div class="scroll-pane">
                                            <?php

                                                //$pageposts = $wpdb->get_results($querystr, OBJECT);

                                                $args = array(
                                                    'post_type' => 'produto',
                                                    'posts_per_page' => -1,
                                                    'post_title_like' => $termo
                                                );
                                                
                                                $loop = new WP_Query($args);

                                                if(!$loop->have_posts())
                                                {
                                                    echo "Nenhum produto cadastrado nessa categoria.";

                                                }
                                                else
                                                {
                                                    while ( $loop->have_posts() ) : $loop->the_post();
                                            ?>

                                                <div class="box-produto">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                            <div class="img-linha-prod">
                                                                <?php the_post_thumbnail(); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 desc-produto">
                                                            <p>Modelo: <?php echo types_render_field("modelo", array("output"=>"raw")); ?></p>
                                                            <p>Diâmetro: <?php echo types_render_field("diametro", array("output"=>"raw")); ?></p>
                                                            <p>Caixa: <?php echo types_render_field("caixa", array("output"=>"raw")); ?></p>
                                                            <p>Internos: <?php echo types_render_field("internos", array("output"=>"raw")); ?></p>
                                                            <p>Visor: <?php echo types_render_field("visor", array("output"=>"raw")); ?></p>
                                                            <p>Exatidão: <?php echo types_render_field("exatidao", array("output"=>"raw")); ?></p>
                                                        </div>
                                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                                            <?php 
                                                                $link_pdf = types_render_field("link-pdf", array("output"=>"raw"));
                                                                if(isset($link_pdf) && !empty($link_pdf)) :
                                                            ?>
                                                                <a href="<?php echo $link_pdf ?>" target="_blank">
                                                                    <img src="<?php echo get_bloginfo('template_url')."/assets/images/icon_pdf.jpg"; ?>" border="0" alt="Baixar PDF" />
                                                                </a>
                                                            <?php
                                                                endif;
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>

                                            <?php
                                                    endwhile;
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-1 col-md-1 col-sm-1 hidden-xs"></div>
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