<head>

<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
 <link rel="stylesheet" type="text/css" href="wp-content/themes/weps-pauline/special/actu/css/style_common.css" />
        <link rel="stylesheet" type="text/css" href="wp-content/themes/weps-pauline/special/actu/css/style3.css" />

<script src="http://code.jquery.com/jquery-latest.js" type="text/javascript"></script>
<!-- Add fancyBox main JS and CSS files -->
<script type="text/javascript" src="wp-content/themes/weps-pauline/special/fancy/jquery.fancybox.pack.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="wp-content/themes/weps-pauline/special/fancy/jquery.fancybox.css?v=2.1.5" media="screen" />

 
  
 <script type="text/javascript" src="wp-content/themes/weps-pauline/special/jquery.adaptive-backgrounds.js"></script>
    
<script src="wp-content/themes/weps-pauline/special/filtrable/jquery.isotope.js" type="text/javascript"></script> 
<link rel="stylesheet" type="text/css" href="wp-content/themes/weps-pauline/special/way/component.css" />
<script src="wp-content/themes/weps-pauline/special/way/modernizr.custom.js"></script>
<?php wp_head(); ?>



<script type="text/javascript">

 
// JQ
$(document).ready( function() {

//ajouter class au menu
$( "li.menu-item a" ).addClass( "apropos" );

  //adaptativeBG
   var defaults      = {
    selector:             '[data-adaptive-background="1"]',
    parent:               null,
    normalizeTextColor:   false,
    normalizedTextColors:  {
      light:      "#fff",
      dark:       "#000"
    },
    lumaClasses:  {
      light:      "ab-light",
      dark:       "ab-dark"
    }
  };

  //adaptativeBG
  $.adaptiveBackground.run(defaults);
  
  //fancybox
  $(".fancybox").fancybox({

    showNavArrows        : false,
    padding : 0
  });
  $(".apropos").fancybox({
     beforeShow: function(){
 // $(".fancybox-skin").css("backgroundColor","transparent");
 //$( "div.fancybox-skin" ).addClass( "fancybox-skin-pao" );
 $( "div.fancybox-skin" ).removeClass( "fancybox-skin" ).addClass( "fancybox-skin-pao" );

 },
     helpers: { 
        title: null
    },
titleShow : true,


    openEffect  : 'fade',
    closeEffect : 'fade'
  });

  //filtrable
  var $container = $('.portfolioContainer');
      $container.isotope({
          filter: '*',
          animationOptions: {
              duration: 750,
              easing: 'linear',
              queue: false
          }
      });
   
      $('.portfolioFilter a').click(function(){
          $('.portfolioFilter .current').removeClass('current');
          $(this).addClass('current');
   
          var selector = $(this).attr('data-filter');
          $container.isotope({
              filter: selector,
              animationOptions: {
                  duration: 750,
                  easing: 'linear',
                  queue: false
              }
           });
           return false;
      }); 

      

});// fin JQ

</script>


</head>