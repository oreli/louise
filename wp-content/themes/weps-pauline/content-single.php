<?php
/**
 * @package weps Pauline
 */
?>
<?php include "ariane.php" ;?>
<article style=""id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


<header class="entry-header alone">
<span class="titre">
<span class="sscat"><?php $cat = get_the_category(); $cat = $cat[1]; echo $cat->cat_name; ?></span> 
<?php the_title( sprintf( '<h1 class="entry-title">/ ', esc_url( get_permalink() ) ), '</h1>' ); ?>	
<div class="date" style="z-index:1000000;">
le <?php  print get_the_date();  ?> par Pauline Souchaud 
<span style="text-transform : uppercase">(PàO)</span></div>
</span>

<?php  echo get_the_post_thumbnail($thumbnail->ID, 'actu-sticky'); ?>

</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'weps-pauline' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
