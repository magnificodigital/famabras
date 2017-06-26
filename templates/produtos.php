<?php 
	/*
		Template Name: Produtos
	*/

get_header();

$key="rule"; 
$id_rule = get_post_meta($post->ID, $key, true);

?>
<head>
    <link type="text/css" href="<?php echo plugins_url()."/ml-slider/assets/sliders/flexslider/flexslider.css"; ?>" rel="stylesheet" media="all" />
</head>
 
        <div id="container">

            <div id="content">

 
<?php the_post(); ?>

    <?php
        $parent_title = get_the_title($post->post_parent);
        if ($parent_title != "Linha de produtos") {
            if (isset($parent_title) && !empty($parent_title)) {
                $titulo = $parent_title." - ".get_the_title();
            }
        } else {
            $titulo = get_the_title();
        }
    ?>


 
                <div class="pages page-produtos" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="row_verde">
                        <div class="container">
                            <h1><?php //echo types_render_field("titulo-pagina", array("output"=>"raw"));  ?> LINHA DE PRODUTOS - <span style="font-size:24px; font-weight: 400;"><?php //echo types_render_field("sub-titulo", array("output"=>"raw"));  ?><?php echo $titulo; ?></span></h1>

                            <a href="<?php get_bloginfo('url') ?>/linha-de-produtos/" class="back_bt pull-right">VOLTAR</a>
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
                    <div class="entry-content" style="padding-top: 0">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="listagem-produtos">
                                        <?php get_template_part('templates/breadcrumbs'); ?>
                                        <!--<div class="loading" style="display:block"><img src="<?php echo get_bloginfo('template_url')."/assets/images/loading.gif"; ?>" /></div>-->
                                        <div class="scroll-pane">
                                          
                                            <?php global $post;
                                            $slug = $post->post_name;

                                            if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
                                            elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
                                            else { $paged = 1; }

                                            $args = array(
                                                'post-type' => 'produto',
                                                'paged'=>$paged,
                                                'posts_per_page'=>10,
                                                'orderby' => 'date',
                                                'order'   => 'ASC',
                                                'tax_query' => array(
                                                    array(
                                                        'taxonomy' => 'linha-produto',
                                                        'field' => 'slug',
                                                        'terms' => $slug
                                                    )
                                                )
                                            );

                                            $loop = new WP_Query( $args );



                                            $html = '';

                                            if($loop->have_posts()) {
                                                
                                                while ( $loop->have_posts() ) : $loop->the_post();
                                                    get_template_part('templates/exibe_produto');
                                                endwhile; 
                                                wp_reset_postdata();

                                            } else {
                                                echo "Nenhum produto cadastrado nessa categoria.";
                                            }

                                            //echo $html;
                                            $big = 999999999;
                                            $p = array(
                                                'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                                                'format' => '?paged=%#%',
                                                'current' => max( 1, get_query_var('paged') ),
                                                'total' => $loop->max_num_pages
                                            );

                                            echo '<div class="navigation">'.paginate_links($p).'</div>';
                                                //previous_posts_link( 'Anterior posts &raquo;' , $loop->max_num_pages );
                                                //next_posts_link('Próximo &raquo;', $loop->max_num_pages ); 
                                            /*
                                            if ( $paged == $loop->max_num_pages ) 
                                            {
                                                echo $html.$caixas_pdfs;
                                            }
                                            else
                                            {
                                                echo $html;
                                            }*/

                                                                       

                                            wp_reset_query();

                                            ?>



                                        </div>
                                    </div>

                                    <?php /*<div class="see_more">
                                        <strong>CLIQUE AQUI</strong> E VEJA MAIS PRODUTOS
                                    </div>*/ ?>

                                </div>
                            </div>
                        </div>
                    </div><!-- .entry-content -->
                </div><!-- #post-<?php the_ID(); ?> -->                  
 
            </div><!-- #content -->

        </div><!-- #container -->

        <?php //get_template_part( 'depoimentos', 'template' ); ?>

        <?php //edit_post_link( __( 'Edit', 'your-theme' ), '<span class="edit-link">', '</span>' ) ?>

        


        <script src="<?php echo get_bloginfo('template_url')."/assets/js/jquery.mousewheel.js"; ?>"></script>

        <script type="text/javascript" id="sourcecode">

            var paged = 1; 

            /*$(function()
            {
                var id = "<?php echo $id_rule; ?>";

                ajaxProds(id, paged, "new");

                $('.see_more').click(function(){
                    paged ++;
                    $('.loading').show();
                    ajaxProds(id, paged, "plus");
                });
                
            });*/

            var collapsed = true;

            function abreSubMenu()
            {
                if(collapsed)
                {
                    $( "#submenu-produtos" ).animate({
                        height: "+=210px"
                    }, 600);

                    collapsed = false;
                }
                else
                {
                    $( "#submenu-produtos" ).animate({
                        height: "-=210px"
                    }, 600);

                    collapsed = true;
                }
            }

            function ajaxProds(id, paged, type)
            {
                var url = "<?php echo get_bloginfo('template_url') ?>" + "/assets/inc/filtra_produtos.php";

                $.ajax({
                    type       : "POST",
                    data       : { id_term : id, paged: paged },
                    dataType   : "html",
                    url        : url,
                    success    : function(data){
                        if(data != "")
                        {
                            if(type == "plus")
                            {
                                $('.scroll-pane').hide();
                                $('.scroll-pane').append(data);
                                $('.scroll-pane').fadeIn(500, function(){ $('.loading').hide(); });
                            }
                            else
                            {
                                $('.scroll-pane').html(data);
                                $('.loading').hide();
                                $('.loading').css({'position':'absolute', 'left':'0px', 'bottom':'63px'});
                            }

                            limpaSubmenu();

                            $("#"+id).addClass('active');

                            $('.see_more').css("display", "block");

                            verificaFinal();

                            $('.bt-solicitar-orcamento').attr("onclick", "_gaq.push(['_trackEvent', 'menu', 'click', 'ORÇAMENTO'])");
                        }
                    },
                    error     : function(jqXHR, textStatus, errorThrown) {
                        alert(jqXHR + " :: " + textStatus + " :: " + errorThrown);
                    }
                });
            }

            function limpaSubmenu(){
                $('#submenu-produtos ul li').each(function(){
                    $(this).removeClass('active');
                });
            }

            function verificaFinal()
            {
                if($('body').has('.box-pdfs-categorias').length)
                {
                    $('.see_more').hide();
                }
            }
        </script>
 
<?php get_footer(); ?>