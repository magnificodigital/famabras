<?php get_header(); ?>
<?php $busca = $_GET['s']; ?>
<div id="container">
    <div id="content">
    	<div class="pages" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	    	<div class="row_verde">
		        <div class="container">
		            <h1>Busca de Produtos</h1>
		            <h5>Termo buscado: <?php echo $busca; ?></h5>
		        </div>
		    </div>

		    <div class="entry-content">
                <div class="container"> 
                    <div class="row">
                        

                            <?php if (have_posts()) : 

                            	echo "<ul>";

                            	while(have_posts()) : the_post(); ?>

                            	
                        		<li class="col-xs-12">
                        			
                        			<?php get_template_part('templates/exibe_produto'); ?>
                        		</li>
					    		

					    	<?php endwhile; ?>
					    	<?php echo "</ul>"; ?>
					    	<?php else: 

					    		//se não achar nenhum modelo específico, ele busca a categoria

					    	/*

					    		if ($busca != "") {


									//Tirar acentos e caracteres especiais
									//Graças ao eterno pai, tem uma função do wp que faz isso
									$busca = sanitize_title($busca);

									//Vê se é plural
									$final = substr($busca, -1);

					    			if ($final == "s") {
					    				if ($busca != "manometros" && $busca != "termometros" && $busca != "macaricos") {
					    					//echo $busca;
					    					$busca = substr($busca, 0,-1);
					    				}
					    			}
						    		
						    
						    		$cats = get_terms('linha-produto',array('hide_empty' => false));

						    		$string = $busca;
									$pattern = '/[ -]+/';
									$replacement = '${1}-$3';

									$term = preg_replace($pattern, $replacement, $busca);

						    		foreach ($cats as $cat) {

						    			$termo = "/".$cat->slug."/i";

						    			if ($term == $cat->slug || $term == $cat->name) {
						    				
											global $post;
											$slug = $cat->slug;

											$posts = array(
											    'post-type' => 'produto',
											    //'paged'=>$paged,
											    //'posts_per_page'=>10,
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

											$loop = new WP_Query( $posts );
											if($loop->have_posts()) {
												while ( $loop->have_posts() ) : $loop->the_post();
													get_template_part('templates/exibe_produto');
											    endwhile; 
											    wp_reset_postdata();
											} 
						    			}
						    		}

					    		}
					    		
					    	?>

					    	*/

					
					    	echo "Nenhum resultado encontrado para: ".$busca;
					    	endif; ?>


                    </div>
                </div>
            </div>

    	</div>
    </div>
</div>
<?php get_footer(); ?>