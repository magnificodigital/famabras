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
                                        <!--<div class="loading" style="display:block"><img src="<?php echo get_bloginfo('template_url')."/assets/images/loading.gif"; ?>" /></div>-->
                                        <div class="scroll-pane">
                                          
<?php                                            

global $post;
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

if($loop->have_posts())
{
   while ( $loop->have_posts() ) : $loop->the_post();
$modelo = types_render_field("modelo", array("output"=>"raw"));
        $diametro = types_render_field("diametro", array("output"=>"raw"));
        $caixa = types_render_field("caixa", array("output"=>"raw"));
        $internos = types_render_field("internos", array("output"=>"raw"));
        $visor = types_render_field("visor", array("output"=>"raw"));
        $exatidao = types_render_field("exatidao", array("output"=>"raw"));
        $haste = types_render_field("haste", array("output"=>"raw"));
        $liquido = types_render_field("liquido-de-enchimento", array("output"=>"raw"));
        $capilar = types_render_field("capilar", array("output"=>"raw"));
        $pressao_estatica_maxima = types_render_field("pressao-estatica-maxima", array("output"=>"raw")); 
        $conexao_entrada = types_render_field("conexao-de-entrada", array("output"=>"raw"));
        $conexao_saida = types_render_field("conexao-de-saida", array("output"=>"raw"));
        $pressao_max_entrada = types_render_field("pressao-max-de-entrada", array("output"=>"raw"));
        $pressao_max_saida = types_render_field("pressao-max-de-saida", array("output"=>"raw"));
        $vazao_maxima = types_render_field("vazao-maxima", array("output"=>"raw"));
        $fluido_trabalho = types_render_field("fluido-de-trabalho", array("output"=>"raw"));
        $manometro_entrada = types_render_field("manometro-de-entrada", array("output"=>"raw"));
        $manometro_saida = types_render_field("manometro-de-saida", array("output"=>"raw"));
        $manometro = types_render_field("manometro", array("output"=>"raw"));
        $manometro_1_estagio = types_render_field("manometro-1-estagio", array("output"=>"raw"));
        $manometro_2_estagio = types_render_field("manometro-2-estagio", array("output"=>"raw"));
        $conexao_saida_regulador_1 = types_render_field("conexao-de-saida-regulador-1", array("output"=>"raw"));
        $conexao_saida_regulador_2 = types_render_field("conexao-de-saida-regulador-2", array("output"=>"raw"));
        $manometro_saida_reguladores_1_2 = types_render_field("manometro-de-saida-reguladores-1-e-2", array("output"=>"raw"));
        $opcoes_escala = types_render_field("opcoes-de-escala", array("output"=>"raw"));
        $conexao_entrada_oxigenio = types_render_field("conexao-de-entrada-para-oxigenio", array("output"=>"raw"));
        $conexao_saida_acetileno = types_render_field("conexao-de-saida-para-acetileno", array("output"=>"raw"));
        $gas = types_render_field("gas", array("output"=>"raw")); 
        $extensoes = types_render_field("extensoes", array("output"=>"raw"));
        $canos = types_render_field("canos", array("output"=>"raw"));
        $bicos_corte = types_render_field("bicos-de-corte", array("output"=>"raw"));

        $observacoes = types_render_field("observacoes", array("output"=>"raw"));

        $link_pdf = types_render_field("link-pdf", array("output"=>"raw"));


        $html .= '<div class="box-produto">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="img-linha-prod">
                                '.get_the_post_thumbnail().'
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 desc-produto">';

                        if(isset($modelo) && !empty($modelo))
                        {
                            $html .= '<p>Modelo: '.$modelo.'</p>';
                        }

                        if(isset($diametro) && !empty($diametro))
                        {
                            $html .= '<p>Diâmetro: '.$diametro.'</p>';
                        }

                        if(isset($caixa) && !empty($caixa))
                        {
                            $html .= '<p>Caixa: '.$caixa.'</p>';
                        }

                        if(isset($haste) && !empty($haste))
                        {
                            $html .= '<p>Haste: '.$haste.'</p>';
                        }

                        if(isset($liquido) && !empty($liquido))
                        {
                            $html .= '<p>Líquido de Enchimento: '.$liquido.'</p>';
                        }

                        if(isset($capilar) && !empty($capilar))
                        {
                            $html .= '<p>Capilar: '.$capilar.'</p>';
                        } 

                        if(isset($pressao_estatica_maxima) && !empty($pressao_estatica_maxima))
                        {
                            $html .= '<p>Pressão Estática Máx. : '.$pressao_estatica_maxima.'</p>';
                        }  

                        if(isset($pressao_max_entrada) && !empty($pressao_max_entrada))
                        {
                            $html .= '<p>Pressão Máx. de Entrada: '.$pressao_max_entrada.'</p>';
                        }

                        if(isset($pressao_max_saida) && !empty($pressao_max_saida))
                        {
                            $html .= '<p>Pressão Máx. de Saída: '.$pressao_max_saida.'</p>';
                        } 

                        if(isset($vazao_maxima) && !empty($vazao_maxima))
                        {
                            $html .= '<p>Vazão Máxima: '.$vazao_maxima.'</p>';
                        } 

                        if(isset($fluido_trabalho) && !empty($fluido_trabalho))
                        {
                            $html .= '<p>Fluido de Trabalho: '.$fluido_trabalho.'</p>';
                        }

                        if(isset($conexao_entrada) && !empty($conexao_entrada))
                        {
                            $html .= '<p>Conexão de Entrada: '.$conexao_entrada.'</p>';
                        } 

                        if(isset($conexao_saida) && !empty($conexao_saida))
                        {
                            $html .= '<p>Conexão de Saída: '.$conexao_saida.'</p>';
                        } 

                        if(isset($conexao_saida_regulador_1) && !empty($conexao_saida_regulador_1))
                        {
                            $html .= '<p>Conexão de Saída Regulador 1: '.$conexao_saida_regulador_1.'</p>';
                        }

                        if(isset($conexao_saida_regulador_2) && !empty($conexao_saida_regulador_2))
                        {
                            $html .= '<p>Conexão de Saída Regulador 2: '.$conexao_saida_regulador_2.'</p>';
                        }

                        if(isset($manometro_entrada) && !empty($manometro_entrada))
                        {
                            $html .= '<p>Manômetro de Entrada: '.$manometro_entrada.'</p>';
                        } 

                        if(isset($manometro_saida) && !empty($manometro_saida))
                        {
                            $html .= '<p>Manômetro de Saída: '.$manometro_saida.'</p>';
                        } 

                        if(isset($manometro_saida_reguladores_1_2) && !empty($manometro_saida_reguladores_1_2))
                        {
                            $html .= '<p>Manômetro de Saída Reguladores 1 e 2: '.$manometro_saida_reguladores_1_2.'</p>';
                        }

                        if(isset($manometro) && !empty($manometro))
                        {
                            $html .= '<p>Manômetro: '.$manometro.'</p>';
                        } 

                        if(isset($manometro_1_estagio) && !empty($manometro_1_estagio))
                        {
                            $html .= '<p>Manômetro 1º Estágio: '.$manometro_1_estagio.'</p>';
                        } 

                        if(isset($manometro_2_estagio) && !empty($manometro_2_estagio))
                        {
                            $html .= '<p>Manômetro 2º Estágio: '.$manometro_2_estagio.'</p>';
                        } 

                        if(isset($opcoes_escala) && !empty($opcoes_escala))
                        {
                            $html .= '<p>Opções de Escala: '.$opcoes_escala.'</p>';
                        }

                        if(isset($internos) && !empty($internos))
                        {
                            $html .= '<p>Internos: '.$internos.'</p>';
                        }

                        if(isset($visor) && !empty($visor))
                        {
                            $html .= '<p>Visor: '.$visor.'</p>';
                        }

                        if(isset($exatidao) && !empty($exatidao))
                        {
                            $html .= '<p>Exatidão: '.$exatidao.'</p>';
                        } 

                        if(isset($conexao_entrada_oxigenio) && !empty($conexao_entrada_oxigenio))
                        {
                            $html .= '<p>Conexão de Entrada para Oxigênio: '.$conexao_entrada_oxigenio.'</p>';
                        } 

                        if(isset($conexao_saida_acetileno) && !empty($conexao_saida_acetileno))
                        {
                            $html .= '<p>Conexão de Saída para Acetileno: '.$conexao_saida_acetileno.'</p>';
                        }

                        if(isset($gas) && !empty($gas))
                        {
                            $html .= '<p>Gás: '.$gas.'</p>';
                        }

                        if(isset($canos) && !empty($canos))
                        {
                            $html .= '<p>Canos: '.$canos.'</p>';
                        }

                        if(isset($extensoes) && !empty($extensoes))
                        {
                            $html .= '<p>Extensões: '.$extensoes.'</p>';
                        } 

                        if(isset($bicos_corte) && !empty($bicos_corte))
                        {
                            $html .= '<p>Bicos de Corte: '.$bicos_corte.'</p>';
                        }

                        if(isset($observacoes) && !empty($observacoes))
                        {
                            $html .= '<p>Observações: <p>'.$observacoes.'</p></p>';
                        }

                        if(isset($link_pdf) && !empty($link_pdf))
                        {
                            $html .= '<form action="'.get_bloginfo('url').'/orcamento/" method="POST">


                                      <input type="hidden" name="modelo" value="'.$modelo.'" />
                                      <input type="hidden" name="linha" value="'.$titulo.'" />
                                      <input type="submit" value="Solicitar Orçamento" class="bt-solicitar-orcamento" />

                                      
                                      </form>
                                      <a href="'.$link_pdf.'" target="_blank">
                                        <img src="'.get_bloginfo('template_url').'/assets/images/icon_pdf.jpg" border="0" />
                                      </a>

                                      '
                                      ;
                        }

                        /*
                        <a href="" class="bt-solicitar-orcamento">
                                        Solicitar orçamento
                                      </a>*/
   

                            
        //$html .=' </div>';

                        
        $html .= '
                        </div>
                    </div>
                </div>';
    endwhile; 
    wp_reset_postdata();

}
else
{
    $html = "Nenhum produto cadastrado nessa categoria.";
}

    echo $html;
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