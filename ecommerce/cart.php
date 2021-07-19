<?php
ob_start();
    // include header.php file
    include('header.php');
?>

<?php

  /* include cart if not empty */
count($product->getData('cart')) ?  include('NewTemplate/_cart-template.php') : include('NewTemplate/notfound/_cart_notfound_.php');
/* include cart if not empty */

/* include wishlist if not empty */
count($product->getData('wishlist')) ?  include('NewTemplate/_wishlist.php') : include('NewTemplate/notfound/_wishlist_notfound_.php');
/* include wishlist if not empty */


  /* top-sale section */
  include('NewTemplate/_new-arrivals.php');
  /* top-sale section */

  ?>
 
<?php
    // include footer.php file*/
    include('footer.php');
    ?>