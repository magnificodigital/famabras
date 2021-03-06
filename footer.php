<div class="row_verde row_newsletter">

        <div class="container">

            <div class="row">

                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">

                    <h4>Inscreva-se no newsletter</h4>

                    <h5 style="text-align: left">Cadastre-se e receba periodicamente em seu e-mail todas as novidades da Famabras.</h5>

                </div>

                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 box-form-news">

                    <?php echo do_shortcode('[contact-form-7 id="331" title="Newsletter"]'); ?>

                </div>

            </div>

        </div>

    </div>



</div><!-- #main -->



<footer>

    <div class="container">

        <div class="row">

            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 logo-footer">

                <img src="<?php echo get_bloginfo('template_url')."/assets/images/logo_farmabras-copy.jpg"; ?>" alt="<?php echo get_bloginfo('name') ?>" />

                <div class="redes-sociais">

                    <ul>

                        <?php

                            $url_facebook = get_option('facebook_icon');

                            $url_linkedin = get_option('linkedin_icon');

                            $url_slideshare = get_option('slideshare_icon');

                        ?>



                        <?php

                            if(!empty($url_facebook)):

                        ?>

                        <li><a href="<?php echo $url_facebook; ?>" target="_blank" class="bt-facebook anima-background"></a></li>

                        <?php

                            endif;

                        ?>

                        <?php

                            if(!empty($url_linkedin)):

                        ?>

                        <li><a href="<?php echo $url_linkedin; ?>" target="_blank" class="bt-linkedin anima-background"></a></li>

                        <?php

                            endif;

                        ?>

                        <?php

                            if(!empty($url_slideshare)):

                        ?>

                        <li><a href="<?php echo $url_slideshare; ?>" target="_blank" class="bt-slideshare anima-background"></a></li>

                        <?php

                            endif;

                        ?>

                    </ul>

                </div>

            </div>

            <div class="col-lg-6 col-lg-offset-1 col-md-6 col-md-offset-1 col-sm-6 col-sm-offset-1 col-xs-12">

                <p>A Famabras é uma empresa de capital 100% nacional, atuando na fabricação de Instrumentos para monitoramento e controle nas áreas de pressão, temperatura e equipamentos destinados a processos de aquecimento, soldagem, corte e controle de gases comprimidos, e ainda possui laboratório de pressão acreditado CGCRE para emissão de certificados de calibração.</p>



                <p>© 1965 - 2017 Famabras Indústria de Instrumentos de Medição Ltda.</p>

            </div>

            <div class="col-lg-2 col-lg-offset-1 col-md-2 col-md-offset-1 col-sm-3 col-xs-12">

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><img src="<?php echo get_bloginfo('template_url')."/assets/images/inmetro.jpg"; ?>" alt="Inmetro" /></div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 logo-sgs"><img src="<?php echo get_bloginfo('template_url')."/assets/images/SGS.jpg"; ?>" alt="SGS" /></div>

            </div>

            <div class="col-xs-12">
                <center>
                    <a href="http://magnificodigital.com" target="_blank" class="createdmagnifico gray"></a>
                </center>
            </div>

        </div>

    </div>

</footer>



<!-- News Enviada -->



<div class="box-news-enviada">

    <div class="img_enviado_news">

        <img src="<?php echo get_bloginfo('template_url')."/assets/images/news_enviada.jpg"; ?>" alt="Aviso news">

    </div>

</div>



<!-- News Enviada -->



    <?php wp_footer(); ?>

  

    <!-- Include all compiled plugins (below), or include individual files as needed -->

    <script src="<?php echo get_bloginfo('template_url')."/assets/js/bootstrap.min.js"; ?>"></script>



    <script type="text/javascript">

        function enviouNews(){

            $('.box-news-enviada').show('fast');

        }



        $('.box-news-enviada').click(function(){

            $(this).hide();

        });



        var flag_open = false;

        var largura = $('.box-search').width();



        $('.icon-search').click(function(event) {

            if(flag_open)

            {

                $('.box-search').animate({

                    width: largura

                }, 600, function(){
                    $(this).find('input').focus();
                });



                flag_open = false;



            }

            else

            {

                $('.box-search').animate({

                    width: "424px"

                }, 600);



                flag_open = true;

            }

            

        });

    </script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.6.3/jquery.flexslider.min.js"></script>
    <script type="text/javascript">
        jQuery(window).load(function() {
          jQuery('.depoimento_slider').flexslider({
            directionNav:false,
            animation: "slide",
            animationLoop: true,
            itemWidth: 1200,
            itemMargin: 30,
            minItems: 1,
            maxItems: 3
          });
        });
</script>

<script type="text/javascript">
        jQuery(window).load(function() {
          jQuery('.blogslider').flexslider({
            animation: "slide",
            animationLoop: true,
            directionNav: false,
            itemWidth: 500,
            itemMargin: 130,
            minItems: 1,
            maxItems: 6
          });
        });

        function vaiProduto(id)
        {
            jQuery('#id_prod').val(id);

            jQuery('#form_prod').submit();
        }
</script>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.9&appId=624845964385137";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

</body>
</html>