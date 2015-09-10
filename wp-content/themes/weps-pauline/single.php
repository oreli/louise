<?php
/**
 * The template for displaying all single posts.
 *
 * @package weps Pauline
 */

get_header(); ?>
<!-- SINGLE  -->
	<div id="secondary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>
<header class="page-header">
<h1 class="page-title"><?php $cat = get_the_category(); $cat = $cat[0]; echo $cat->cat_name; ?></h1>



<span class="sscat article"><?php //$cat = get_the_category(); $cat = $cat[1]; echo $cat->cat_name; ?></span> 


	</header><!-- .page-header -->

		<?php weps_pauline_post_nav(); ?>	
			<?php get_template_part( 'content', 'single' ); ?>

	<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			?>
		
		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>