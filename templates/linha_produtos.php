<?php 
	/*
		Template Name: Linha Produtos
	*/

get_header();

$key="rule"; 
$id_rule = get_post_meta($post->ID, $key, true);

?>
<head>
    <link type="text/css" href="<?php echo plugins_url()."/ml-slider/assets/sliders/flexslider/flexslider.css"; ?>" rel="stylesheet" media="all" />
    <link rel="stylesheet" href="<?php echo get_bloginfo('template_url')."/assets/css/linhas.css"; ?>" />
</head>
 
        <div id="container">
            <div id="content">
 
                <?php the_post(); ?>
 
                <div class="pages" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="row_verde">
                        <div class="container">
                            <h1 style="font-size: 30px; text-align: left;margin-left:14px;margin:0"><?php echo types_render_field("titulo-pagina", array("output"=>"html"));  ?></h1>
                            <?php
                                $subtitulo = types_render_field("sub-titulo", array("output"=>"html"));
                                if($subtitulo != "")
                                {
                            ?>        
                                <h5><?php echo $subtitulo;  ?></h5>
                            <?php
                                }
                            ?>    
                        </div>
                    </div>
                    <?php
                        $image_header = types_render_field("imagem-header", array("output"=>"raw"));

                        if(isset($image_header) && !empty($image_header)) :
                    ?>
                        <div class="img-header-page">
                            <img src="<?php echo types_render_field("imagem-header", array("output"=>"raw")); ?>" alt="<?php the_title(); ?>" />
                        </div>
                    <?php
                        endif;
                    ?>

                    <?php
                        $terms = get_terms( array(
                            'taxonomy' => 'linha-produto',
                            'hide_empty' => false,
                            'parent' => 0
                        ) );
                    ?>
                    <div class="entry-content">
                        <div class="container">

                            <?php get_template_part('templates/breadcrumbs'); ?>

                            <?php
                                $contador = 0;
                                $html = '';
                                $submenus = '';
                                $url_blog = get_bloginfo('url');

                                foreach ($terms as $item) 
                                {
                                    /*echo "<pre>";
                                    print_r($item); // or var_dump($data);
                                    echo "</pre>";*/

                                    $terms_childs = get_terms( array(
                                        'taxonomy' => 'linha-produto',
                                        'hide_empty' => false,
                                        'parent' => $item->term_id
                                    ));

                                    $images = get_option('taxonomy_image_plugin');
                                    $image_url = wp_get_attachment_image_url( $images[$item->term_id], 'large' );

                                    foreach($terms_childs as $childs)
                                    {
                                        $submenus .= '<li><a href="'.$url_blog.'/linha-de-produtos/'.$item->slug.'/'.$childs->slug.'">'.$childs->name.'</a></li>';
                                    }

                                    if($contador == 0)
                                    {
                                        $html .= '<div class="box_linhas"><div class="row">';
                                    }

                                    $html .= '
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <div class="img_cat">
                                                <img src="'.$image_url.'" alt="'.$item->name.'" />
                                            </div>
                                            <div class="info_cat">
                                                <h2>'.$item->name.'</h2>
                                                <ul>
                                                    '.$submenus.'
                                                    <li><a target="_blank" href="'.get_field('acessorios', 'linha-produto_' . $item->term_id).'">Acessórios</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    ';

                                    $contador ++;

                                    if($contador == 3)
                                    {
                                        $html .= '</div></div>';
                                        $contador = 0;
                                    }

                                    $submenus = '';
                                }

                                echo $html;
                            ?>
                        </div>
                    </div><!-- .entry-content -->
                </div><!-- #post-<?php the_ID(); ?> -->                  
 
            </div><!-- #content -->
        </div><!-- #container -->

        <script src="<?php echo get_bloginfo('template_url')."/assets/js/jquery.flexslider-min.js" ?>"></script>

        <?php edit_post_link( __( 'Edit', 'your-theme' ), '<span class="edit-link">', '</span>' ) ?>

        <script src="<?php echo get_bloginfo('template_url')."/assets/js/jquery.mousewheel.js"; ?>"></script>

        <script type="text/javascript" id="sourcecode">

            $(function()
            {
                
            });

        </script>
 
<?php get_footer(); ?>