<?php 
	/*
		Template Name: Home
	*/

get_header(); ?>
 
    <div class="banner">
        <?php 
            echo do_shortcode("[metaslider id=87]"); 
        ?>
    </div>
    
    <div class="row_verde row_verde_home">
        <div class="container">
            <h3><a href="<?php echo get_bloginfo('url')."/linha-de-produtos/"; ?>">Confira nossa linha de produtos</a></h3>
        </div>
    </div>
    
    <section id="informações" class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <h4>Desde 1965</h4>
                    <div class="img-informacoes"><img src="<?php echo get_bloginfo('template_url')."/assets/images/fabrica.jpg"; ?>" alt="Empresa Famabras" /></div>
                    <ul>
                        <li>Instrumento de Medição para Grandeza Pressão e Temperatura</li>
                        <li>Equipamentos de Solda e Controle de Gases Comprimidos</li>
                    </ul>
                    <a href="<?php echo get_bloginfo('url')."/empresa/" ?>" class="bt-saiba-mais">Saiba Mais</a>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <h4>Serviços</h4>
                    <div class="img-informacoes"><img src="<?php echo get_bloginfo('template_url')."/assets/images/servicos_home.jpg"; ?>" alt="Serviços" /></div>
                    Laboratório de Pressão Acreditado
                    <ul>
                        <li>Instrumento de Medição para Grandeza Pressão e Temperatura</li>
                        <li>Equipamentos de Solda e Controle de Gases Comprimidos</li>
                    </ul>
                    <a href="<?php echo get_bloginfo('url')."/servicos/" ?>" class="bt-saiba-mais">Saiba Mais</a>
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part( 'depoimentos', 'template' ); ?>
    
    <section id="produtos" class="section">
        <div class="container">
            <div class="section-header">
                <h2>Produtos</h2>
                <h5>Clique nos produtos abaixo e conheça nossa linha completa.</h5>
            </div>

            <form id="form_prod" action="<?php echo get_bloginfo('url')."/linha-de-produtos/" ?>" method="POST">

                <input type="hidden" name="id_prod" id="id_prod" value="" />
            
                <?php
                    $args = array(
                        'hide_empty'        => false,
                        'hierarchical'      => false,
                        'parent'            => 0
                    ); 

                    $terms = get_terms("linha-produto", $args);

                    $contador = 0;

                    //print_r($terms);

                    $html = '';

                    foreach ($terms as $cat) 
                    {
                        if($contador == 0)
                        {
                            $html .= '<div class="row row-produtos">';
                        }

                        $url = get_bloginfo('url')."/linha-de-produtos/";

                        $images = get_option('taxonomy_image_plugin');
                        $image_url = wp_get_attachment_image_url( $images[$cat->term_id], 'large' );

                        $html .= '<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="box-produto-categoria">
                                        <a href="'.$url.$cat->slug.'">
                                            <div class="img-prod-categoria"><img src="'.$image_url.'" alt="'.$cat->name.'" /></div>
                                            <div class="divider-prod-cat"></div>
                                            <div class="nome-prod-cat">'.$cat->name.'</div>
                                        </a>
                                    </div>
                                </div>';

                        if($contador == 2)
                        {
                            $html .= '</div>';
                            $contador = -1;
                        }

                        $contador ++;
                    }

                    echo $html;
                ?>
            </form>
        </div>
    </section>
    
    <section id="blog" class="section" style="background-color:#fff">
        <div class="container">
            <div class="row">
                <div class="section-header">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <h2>Blog</h2>
                        <h5>Confira as últimas novidades do mercado em nosso blog.</h5>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="pull-right box-bt-veja-mais">
                            <a href="<?php echo get_bloginfo('url')."/blog/"?>" class="bt-veja-mais">
                                Veja mais
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row-posts-blog">
            <div class="blogslider flexslider slider_quadros_empresa">
                <ul class="slides">
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

                                $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

                            
                    ?>
                            <li>
                                <div class="title-blog"><?php echo get_the_title(); ?></div>
                                <div class="img-post-blog"><img src="<?php echo $url ?>" width="471" height="163" alt="<?php echo get_the_title(); ?>" /></div>
                                <div class="txt-post-blog"><?php the_excerpt(); ?></div>
                                <a href="<?php the_permalink(); ?>" class="bt-saiba-mais">Saiba mais</a>
                            </li>
                    <?php
                        endwhile;
                    }
                    ?>
                </ul>
            </div>
        </div>
            
        </div>
    </section>

   

<?php get_footer(); ?>