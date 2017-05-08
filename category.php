<?php get_header(); ?>
 
        <div id="container">
            <div id="content">
 
                <?php the_post(); ?>          

				<?php rewind_posts(); ?>

				<?php global $wp_query; ?>
				
				<div class="pages">
					<div class="row_verde">
	                    <div class="container">
	                        <h1>BLOG</h1>
	                        <h5><?php _e( 'Categoria:', 'hbd-theme' ) ?> <span><?php single_cat_title() ?></span></span></h5>
	                    </div>
	                </div>
                </div>  

                <div class="entry-content">
						<div class="container">
							<div class="row">
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">

				<?php while ( have_posts() ) : the_post(); 
						$image_vitrine = types_render_field("imagem-da-vitrine", array("output"=>"raw"));
				?>
								<div class="post-blog">
									<div class="col-lg-1 col-md-1 col-sm-1 hidden-xs"></div>
									 <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
						                <div class="pages" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

						                    <h3 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( __('Permalink to %s', 'hbd-theme'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
											
											<div class="img-vitrine-blog">
		                                        <img src="<?php echo $image_vitrine; ?>">
		                                    </div>

						                    <!--<div class="entry-meta">
						                        <span class="meta-prep meta-prep-author"><?php //_e('By ', 'hbd-theme'); ?></span>
						                        <span class="author vcard"><a class="url fn n" href="<?php //echo get_author_link( false, $authordata->ID, $authordata->user_nicename ); ?>" title="<?php //printf( __( 'View all posts by %s', 'hbd-theme' ), $authordata->display_name ); ?>"><?php the_author(); ?></a></span>
						                        <span class="meta-sep"> | </span>
						                        <span class="meta-prep meta-prep-entry-date"><?php //_e('Published ', 'hbd-theme'); ?></span>
						                        <span class="entry-date"><abbr class="published" title="<?php //the_time('Y-m-d\TH:i:sO') ?>"><?php //the_time( get_option( 'date_format' ) ); ?></abbr></span>
						                        <?php //edit_post_link( __( 'Edit', 'hbd-theme' ), "<span class=\"meta-sep\">|</span>\n\t\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t" ) ?>
						                    </div>-->

						                    <div class="entry-summary">
												<?php the_excerpt(); ?>
						                    </div><!-- .entry-summary -->

						                    <!--<div class="entry-utility">
						                        <?php //if ( $cats_meow = cats_meow(', ') ) : // Returns categories other than the one queried ?>
												                        <span class="cat-links"><?php //printf( __( 'Also posted in %s', 'hbd-theme' ), $cats_meow ) ?></span>
												                        <span class="meta-sep"> | </span>
												<?php //endif ?>
						                        <span class="meta-sep"> | </span>
						                        <?php //the_tags( '<span class="tag-links"><span class="entry-utility-prep entry-utility-prep-tag-links">' . __('Tagged ', 'hbd-theme' ) . '</span>', ", ", "</span>\n\t\t\t\t\t\t<span class=\"meta-sep\">|</span>\n" ) ?>
						                        <span class="comments-link"><?php //comments_popup_link( __( 'Leave a comment', 'hbd-theme' ), __( '1 Comment', 'hbd-theme' ), __( '% Comments', 'hbd-theme' ) ) ?></span>
						                        <?php// edit_post_link( __( 'Edit', 'hbd-theme' ), "<span class=\"meta-sep\">|</span>\n\t\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t\n" ) ?>
						                    </div>-->
						                </div><!-- #post-<?php the_ID(); ?> -->

						                <a href="<?php the_permalink(); ?>" class="bt-saiba-mais">Saiba mais</a>
					                </div>
					                <div class="col-lg-1 col-md-1 col-sm-1 hidden-xs"></div>
				                </div>

				<?php endwhile; ?>
								</div>

								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 sidebar">
	                                <?php get_sidebar(); ?>
	                            </div>
							</div>
						</div>
					</div><!-- .entry-utility -->         

				<?php global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>
				                <div id="nav-below" class="navigation">
				                    <div class="nav-previous"><?php next_posts_link(__( '<span class="meta-nav">&laquo;</span> Older posts', 'hbd-theme' )) ?></div>
				                    <div class="nav-next"><?php previous_posts_link(__( 'Newer posts <span class="meta-nav">&raquo;</span>', 'hbd-theme' )) ?></div>
				                </div><!-- #nav-below -->
				<?php } ?>                 
 
            </div><!-- #content -->
        </div><!-- #container -->
<?php get_footer(); ?>