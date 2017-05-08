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
 
                <div class="pages page-produtos" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="row_verde">
                        <div class="container">
                            <h1><?php echo types_render_field("titulo-pagina", array("output"=>"raw"));  ?> - <span style="font-size:24px; font-weight: 400;"><?php echo types_render_field("sub-titulo", array("output"=>"raw"));  ?></span></h1>

                            <a href="<?php get_bloginfo('url') ?>/linha-de-produtos/" class="back_bt pull-right">VOLTAR</a>
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
                    <div class="entry-content" style="padding-top: 0">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="listagem-produtos">
                                        <div class="loading" style="display:block"><img src="<?php echo get_bloginfo('template_url')."/assets/images/loading.gif"; ?>" /></div>
                                        <div class="scroll-pane">
                                            
                                        </div>
                                    </div>
                                    <div class="see_more">
                                        <strong>CLIQUE AQUI</strong> E VEJA MAIS PRODUTOS
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- .entry-content -->
                </div><!-- #post-<?php the_ID(); ?> -->                  
 
            </div><!-- #content -->
        </div><!-- #container -->

        <?php //get_template_part( 'depoimentos', 'template' ); ?>

        <?php edit_post_link( __( 'Edit', 'your-theme' ), '<span class="edit-link">', '</span>' ) ?>

        <script src="<?php echo get_bloginfo('template_url')."/assets/js/jquery.mousewheel.js"; ?>"></script>

        <script type="text/javascript" id="sourcecode">

            var paged = 1; 

            $(function()
            {
                var id = "<?php echo $id_rule; ?>";

                ajaxProds(id, paged, "new");

                $('.see_more').click(function(){
                    paged ++;
                    $('.loading').show();
                    ajaxProds(id, paged, "plus");
                });
                
            });

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