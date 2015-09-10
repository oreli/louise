
<div id="ariane">
<p>PàO . Pauline Souchaud  : <?php // Breadcrumb navigation
 if (is_page() && !is_front_page() || is_single() || is_category()) {

 echo '<a title="Accueil - NOM DU SITE" rel="nofollow" href="http://VOTRE_SITE.com/">Accueil </a>';

 if (is_page()) {
 $ancestors = get_post_ancestors($post);

 if ($ancestors) {
 $ancestors = array_reverse($ancestors);

 foreach ($ancestors as $crumb) {
 echo '> <a href="'.get_permalink($crumb).'">'.get_the_title($crumb).'</a>';
 }
 }
 }

 if (is_single()) {
 $category = get_the_category();
 echo '> <a href="'.get_category_link($category[0]->cat_ID).'">'.$category[0]->cat_name.'</a>';
 }

 if (is_category()) {
 $category = get_the_category();
 echo '> '.$category[0]->cat_name.'';
 }

 // Current page
 if (is_page() || is_single()) {
 echo ' > '.get_the_title().'';
 }

 } elseif (is_front_page()) {
 // Front page

 echo '<a title="Accueil - NOM DU SITE" rel="nofollow" href="http://VOTRE_SITE.com/">Accueil > </a>';

 }
?></p></div>