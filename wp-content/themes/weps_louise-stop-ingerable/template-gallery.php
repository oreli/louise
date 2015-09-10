<?php
/*
Template Name: template gallerie
*/
?>
 

 



           
                         
            <?php
                $loop = new WP_Query(array('post_type' => 'project', 'tagportfolio' => 'toile', 'posts_per_page' => -1));
                $count =0;
            ?>
        
            <div  style="clear : both;" id="portfolio-wrapper">  

  
                <ul id="portfolio-list"class="portfolioContainer">
             
                <?php if ( $loop ) :
                      
                    while ( $loop->have_posts() ) : $loop->the_post(); ?>
                     
                        <?php
                        $terms = get_the_terms( $post->ID, 'tagportfolio' );
                                 
                        if ( $terms && ! is_wp_error( $terms ) ) :
                            $links = array();
 
                            foreach ( $terms as $term )
                            {
                                $links[] = $term->name;
                            }
                            $links = str_replace(' ', '-', $links);
                            $tax = join( " ", $links );    
                        else : 
                            $tax = ''; 
                        endif;
                        ?>
                         
 <?php $infos = get_post_custom_values('_url'); ?>

<!-- Retrouve l'URL de l'image originale associée au thumbnail -->
<?php
  $image_id = get_post_thumbnail_id();
  $image_url = wp_get_attachment_image_src($image_id,'large');
  $image_url = $image_url[0];
  $name = $term->name;
?>


<li  class="imgWrap portfolio-item 
<?php echo strtolower($tax); ?> all">
<?php the_post_thumbnail( 'matiere-sticky',  "data-adaptive-background=1"); ?>
<div class="portfolio-desc" >

<?php 
echo '<a  rel="';
echo $name.'" title="';
print strtoupper($term->name).' / ';
echo '&laquo;';
echo ucfirst(the_title());
echo '&raquo; ';
echo ucfirst(get_the_content());

echo '" class="fancybox port-titre" href="';
echo $image_url.'">';
echo the_title();
echo '</a>';
?>



 <p class="port-cat">xx<?php print $term->name; ?></p>
<p class="excerpt"><?php echo get_the_content(); ?></p>

</div>



<div style="display:none;" id="portfolio<?php the_ID(); ?>"><?php the_post_thumbnail( full); ?></div>
                  
 <!-- the plugin will scan your HTML for all images with the 'data-adaptive-background'
attribute and apply it's dominant color to the image's parent element's background -->



</li>




                         
                    <?php endwhile; else: ?>
                      
                    <li class="error-not-found">Sorry, no portfolio entries for while.</li>
                         
                <?php endif; ?>
             
 
                </ul>
 
                <div class="clearboth"></div>
             
            </div> <!-- end #portfolio-wrapper-->
                 
