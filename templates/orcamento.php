<?php 

	/*
		Template Name: Orçamento
	*/

	$modelo = $_GET['modelo'];
	$linha = $_GET['linha'];
    $text = $linha." - ".$modelo;

	get_header();

?>


<head>
<link type="text/css" href="<?php echo get_bloginfo('template_url')."/assets/css/tagit.css"; ?>" rel="stylesheet" media="all" />
<style type="text/css">
        
    html, body { height: 100%; margin: 0; padding: 0; }
    #map { height: 400px; }
    ul.tagit li.tagit-choice {
        -moz-border-radius: 6px;
        border-radius: 6px;
        -webkit-border-radius: 6px;
        border: 1px solid #127112;
        background: none;
        background-color: #127112;
        font-weight: normal;
    }

    ul.tagit li.tagit-choice .tagit-label:not(a), ul.tagit li.tagit-choice .tagit-close .text-icon {
        color: #fff;
    }

    ul.tagit li.tagit-choice .tagit-close {
        right: .4em;
    }

    ul.tagit li.tagit-choice .tagit-close .text-icon{
        display: block;
    }

    ul.tagit{
        border-color: #127112;
    }

    .tagit-new input{
        width: 100%;
        border: 1px solid #127112;
        color: #454545;
    }

    ul.tagit li.tagit-choice:hover, ul.tagit li.tagit-choice.remove {
        background-color: #159815;
        border-color: #159815;
    }

    .boxtelefones {
        text-align: center;
        margin: 30px 0;
    }

    .boxtelefones span.exibirtelefone {
        color: #127112;
        font-size: 16px;
        padding: 8px;
        background: #FFF;
        margin: 0 auto;
        text-align: center;
        display: table;
        cursor: pointer;
        transition: 0.2s;
        -webkit-transition: 0.2s;
        -moz-transition: 0.2s;
    }

    .boxtelefones span.exibirtelefone:hover {
        opacity: 0.9;
    }

    .boxtelefones .telefones {color: #FFF;}

</style>

</head>
        <div id="container">
            <div id="content">
 
<?php the_post(); ?>
 
                <div class="pages" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="row_verde">
                        <div class="container">
                        
                            <h1><?php echo types_render_field("titulo-pagina", array("output"=>"html"));  ?></h1>
                            <div class="boxtelefones">
                                <span class="exibirtelefone"><strong>Clique para exibir telefone</strong></span>
                                <h4 class="telefones">
                                    <?php echo types_render_field("telefone", array("output"=>"html"));  ?>
                                </h4>
                            </div>
                            <h5><?php echo types_render_field("sub-titulo", array("output"=>"html"));  ?></h5>
                            
                        </div>
                    </div>
                    
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

        <script src="<?php echo get_bloginfo('template_url')."/assets/js/jquery.flexslider-min.js" ?>"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="<?php echo get_bloginfo('template_url')."/assets/js/tag-it.min.js" ?>" type="text/javascript"></script>

        <?php //get_template_part( 'depoimentos', 'template' ); ?>

        <?php edit_post_link( __( 'Edit', 'your-theme' ), '<span class="edit-link">', '</span>' ) ?>

        <script type="text/javascript">

            var url = "<?php echo get_bloginfo('template_url'); ?>";

            var map;
            function initMap() 
            {
                var myLatLng = {lat: -23.4416801, lng: -46.3339707};

                map = new google.maps.Map(document.getElementById('map'), {
                    center: myLatLng,
                    zoom: 16
                });

                var marker = new google.maps.Marker({
                    position: myLatLng,
                    map: map
                });
            }

            var elt = $('input[name="interesse"]');

            elt.tagit({
                fieldName: "skills",
                availableTags: ["Manômetros", "Termômetros", "Maçaricos", "Reguladores de Pressão", "Conjunto de Solda"],
                autocomplete: {delay: 0, minLength: 2}
            });

            $(document).ready(function(){
                $('.tagit-new > input').attr("placeholder", "Linhas de produtos");
            });

        </script>

        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCXAJPem4X3nWUAEKP_MDbmzEkc6qBIPm8&callback=initMap"></script>

        <script type="text/javascript">
            //trocar telefones
            $(function(){

                $('.boxtelefones .telefones').hide();

                $('.exibirtelefone').click(function(){
                    $(this).hide();
                    $('.boxtelefones .telefones').show();
                })
            });

        </script>


		<script type="text/javascript">
			//coloca os valores no input
			$(function(){
				$('#linha-modelo').val('<?php echo $text ?>');
			});
		</script>


        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.min.js"></script>
        <script type="text/javascript">
            var SPMaskBehavior = function (val) {
              return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
            },
            spOptions = {
              onKeyPress: function(val, e, field, options) {
                  field.mask(SPMaskBehavior.apply({}, arguments), options);
                }
            };

            $('.telefone').mask(SPMaskBehavior, spOptions);
        </script>
		
<?php get_footer(); ?>