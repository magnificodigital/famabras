<?php

require_once('../../../../../wp-load.php');

$id = $_POST['id_term'];
$paged  = $_POST['page'];

/*---------------------------------------------------------
----------------PDF CATS-----------------------------------
---------------------------------------------------------*/
$caixas_pdfs = '<div class="box-pdfs-categorias">';

$conceitos = get_field('conceitos_e_definições', 'linha-produto_' . $id);
$recomendacoes = get_field('recomendações_de_uso', 'linha-produto_' . $id);
$conversao = get_field('conversão_de_unidades', 'linha-produto_' . $id);
$tabela = get_field('tabela_compatibilidade_materiais', 'linha-produto_' . $id);
$tabela_de_escalas = get_field('tabela_de_escalas', 'linha-produto_' . $id);
$acessorios = get_field('acessorios', 'linha-produto_' . $id);
$conversão_de_temperaturas = get_field('conversão_de_temperaturas', 'linha-produto_' . $id);


if(isset($conceitos) && !empty($conceitos))
{
    $caixas_pdfs .=  '<a href="'.$conceitos.'" target="_blank"><div class="box-pdf-cat"><p>CONCEITOS E DEFINIÇÕES</p></div></a>';
}

if(isset($recomendacoes) && !empty($recomendacoes))
{
    $caixas_pdfs .=  '<a href="'.$recomendacoes.'" target="_blank"><div class="box-pdf-cat"><p style="width: 170px;">RECOMENDAÇÕES DE USO E INSTALAÇÕES</p></div></a>';
}

if(isset($conversao) && !empty($conversao))
{
    $caixas_pdfs .=  '<a href="'.$conversao.'" target="_blank"><div class="box-pdf-cat"><p style="width: 210px;">CONVERSÃO DE UNIDADES DE PRESSÃO</p></div></a>';
}

if(isset($tabela) && !empty($tabela))
{
    $caixas_pdfs .=  '<a href="'.$tabela.'" target="_blank"><div class="box-pdf-cat"><p style="width: 210px;">TABELA COMPATIBILIDADE DE MATERIAIS</p></div></a>';
}

if(isset($tabela_de_escalas) && !empty($tabela_de_escalas))
{
    $caixas_pdfs .=  '<a href="'.$tabela_de_escalas.'" target="_blank"><div class="box-pdf-cat"><p style="width: 210px;">TABELA DE  ESCALAS</p></div></a>';
}

if(isset($acessorios) && !empty($acessorios))
{
    $caixas_pdfs .=  '<a href="'.$acessorios.'" target="_blank"><div class="box-pdf-cat"><p style="width: 210px;">ACESSÓRIOS</p></div></a>';
}

if(isset($conversão_de_temperaturas) && !empty($conversão_de_temperaturas))
{
    $caixas_pdfs .=  '<a href="'.$conversão_de_temperaturas.'" target="_blank"><div class="box-pdf-cat"><p style="width: 210px;">CONVERSÃO DE TEMPERATURAS</p></div></a>';
}

$caixas_pdfs .= '</div>';

/*---------------------------------------------------------
-----------------------------------------------------------
---------------------------------------------------------*/


$args = array(
    'post-type' => 'produto',
    'pages' => $paged,
    'posts_per_page' => 10,
    'orderby' => 'date',
    'order'   => 'ASC',
    'tax_query' => array(
        array(
            'taxonomy' => 'linha-produto',
            'field' => 'id',
            'terms' => $id
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
                            $html .= '<a href="'.$link_pdf.'" target="_blank">
                                        <img src="'.get_bloginfo('template_url').'/assets/images/icon_pdf.jpg" border="0" />
                                      </a>
                                      <a href="http://www.famabras.com.br/fale-conosco/" class="bt-solicitar-orcamento">
                                        Solicitar orçamento
                                      </a>';
                        }
   
                            
        $html .=' </div>';

                        
        $html .= '
                        </div>
                    </div>
                </div>';
    endwhile; 
}
else
{
    $html = "Nenhum produto cadastrado nessa categoria.";
}

echo $html.$caixas_pdfs;

wp_reset_query();

?>
