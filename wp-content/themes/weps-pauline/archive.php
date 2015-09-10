<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package weps Pauline
 */

get_header(); ?>
<!-- ARCHIVE -->
	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>
		
			<header class="page-header">
				
				<?php
					// Show an optional term description.
					/*$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					endif;*/
				?>
			<!-- menu sous cat -->
			<?php
        if (is_category()) {
            global $wp_query;
            $category_id = $wp_query->query_vars['cat'];
                
            if ( get_category_children($category_id) != "" ) {
              // echo "<div id='menu-sous-cat'>";
              // echo "<div class='portfolioFilter'>";
                //echo "<ul>";
                 //echo "<li class='cat-item hach'>/</li>";
//wp_list_categories('hide_empty=0&orderby=id&show_count=0&title_li=&use_desc_for_title=1&child_of='.$category_id);

//                echo "<li class='cat-item'> - Tous voir - </li>";
  //              echo "</ul>";
              //     echo "</div>";
             //   echo "</div>";
            }
        }
     ?>

       <div id="menu-sous-cat">

       <h1 class="page-title">
					<?php
						if ( is_category() ) :
							single_cat_title();

						elseif ( is_tag() ) :
							single_tag_title();

						elseif ( is_author() ) :
							printf( __( 'Author: %s', 'weps-pauline' ), '<span class="vcard">' . get_the_author() . '</span>' );

						elseif ( is_day() ) :
							printf( __( 'Day: %s', 'weps-pauline' ), '<span>' . get_the_date() . '</span>' );

						elseif ( is_month() ) :
							printf( __( 'Month: %s', 'weps-pauline' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'weps-pauline' ) ) . '</span>' );

						elseif ( is_year() ) :
							printf( __( 'Year: %s', 'weps-pauline' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'weps-pauline' ) ) . '</span>' );

						elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
							_e( 'Asides', 'weps-pauline' );

						elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
							_e( 'Galleries', 'weps-pauline' );

						elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
							_e( 'Images', 'weps-pauline' );

						elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
							_e( 'Videos', 'weps-pauline' );

						elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
							_e( 'Quotes', 'weps-pauline' );

						elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
							_e( 'Links', 'weps-pauline' );

						elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
							_e( 'Statuses', 'weps-pauline' );

						elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
							_e( 'Audios', 'weps-pauline' );

						elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
							_e( 'Chats', 'weps-pauline' );

						else :
							_e( 'Archives', 'weps-pauline' );

						endif;
					?>
				</h1>
       <div class="portfolioFilter">
      
 <a href="#" data-filter=".category-coup-de-coeur"><?php echo get_cat_name(12);?></a> 
	<a href="#" data-filter=".category-atelier"><?php echo get_cat_name(11);?></a> 
	    <a href="#" data-filter="*" class="current"> - Tous voir -</a> 

</div></div>
			<!-- menu sous cat FIN -->
			</header><!-- .page-header -->


<div id="allactus">

<?php include "ariane.php" ;?>
<!-- à la une  -->


<?php
$recentPosts = new WP_Query();
$sticky = get_option('sticky_posts');
$args = array(
 'showposts' => 2,
 'post__in' => $sticky,
 'caller_get_posts' => 1,
 'orderby' => 'date',
 );
$recentPosts->query($args);
while ($recentPosts->have_posts()) : $recentPosts->the_post(); ?>
<article id="post-<?php the_ID(); ?>" class="sticky">

<div class="view sticky view-third">

  
   


	<div class="entry-content sticky">

	<?php  echo get_the_post_thumbnail($thumbnail->ID, 'actu-sticky'); ?>

	</div><!-- .entry-content -->
	    <div class="mask"></div>
	<header class="entry-header sticky">

		<div class="entry-meta" >
		
		<span class="sscat"><?php $cat = get_the_category(); $cat = $cat[1]; echo $cat->cat_name; ?></span> 
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">/ ', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
		<div class="date"><?php  print get_the_date(); //the_excerpt(); ?></div>
		<?php  the_excerpt();?>
		
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->
	        <a href="<?php echo get_permalink(); ?>" class="info">Lire + </a>
   <span class="triangle"></span>
	 </div><!-- view view -->
</article><!-- #post-## -->


<?php endwhile; ?>



<!-- fin à la une  -->
		<div class="portfolioContainer">		



			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				?>

			<?php endwhile; ?>
</div>
			<?php weps_pauline_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>
</div>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
