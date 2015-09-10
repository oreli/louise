<?php
/**
 * @package weps Pauline
 */
?>

<!-- CONTENT -->




<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<!-- test -->




<div class="view view-third">
<?php  echo get_the_post_thumbnail($thumbnail->ID, 'actu'); ?>
    <div class="mask"></div>
    <div class="content">
        <div class="grostitre">

<span class="sscat"><?php $cat = get_the_category(); $cat = $cat[1]; echo $cat->cat_name; ?></span> 
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">/ ', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
		<div class="date"><?php  print get_the_date();  ?></div>

		

        </div>
      <?php print the_excerpt();?>

        <a href="<?php echo get_permalink(); ?>" class="info">Lire + </a>
   <span class="triangle"></span>
    </div>
</div>
 

<!-- fin test -->

</article><!-- #post-## -->

