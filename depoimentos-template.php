<div class="row_verde verde_claro">
    <div class="container">
        <div class="flexslider depoimento_slider slider_quadros_empresa">
            <ul class="slides">
        <?php
            $args2 = array(
                'post_type' => 'depo',
                'posts_per_page' => 3
            );

            $query = new WP_Query($args2);

            if(!$query->have_posts())
            {
                echo "Nenhum depoimento cadastrado.";
            }
            else
            {
                while ( $query->have_posts() ) : $query->the_post();
        ?>
            <li>
            <div class="box_depoimento">
                <div class="nome_depoimento">
                    <?php echo types_render_field("nome-depoimento", array("output"=>"raw")); ?><br/>
                    <span class="cargo">“<?php echo types_render_field("cargo", array("output"=>"raw")); ?>”</span>
                </div>
                <div class="txt_depoimento">
                    <?php echo get_the_content(); ?>
                </div>
            </div>
            </li>
        <?php
            endwhile;
        }
        ?>
         </ul>
        </div>
    </div>
</div>

