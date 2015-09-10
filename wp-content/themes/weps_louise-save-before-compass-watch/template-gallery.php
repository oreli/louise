<?php while(have_posts()) : the_post(); ?>

<h2 class="post-title"><?php the_title(); ?></h2>
<div class="post-content"><?php the_content(); ?></div>

<?php
/**
* Rajout de thumbnail
*/
$title = get_the_title();
if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
  the_post_thumbnail('', array(
    'alt' => $title,
    'title' => $title));
}
?>


<?php endwhile;