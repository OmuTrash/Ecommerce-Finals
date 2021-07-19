
 <?php
 ob_start();
    // include header.php file
    include("header.php");
?>

  <?php
  /* banner area */
 include ("NewTemplate/_banner-area.php");
  /* banner area */

  /* top-sale section */
 include_once('NewTemplate/_top-sale.php');
  /* top-sale section */

  /* special-price section */
 include_once('NewTemplate/_special-price.php');
  /* special-price area */   

  /* banner-ads section */
 include_once('NewTemplate/_banner.php');
  /* banner-ads section */

  /* new-arrivals section */
 include_once('NewTemplate/_new-arrivals.php');
  /* new-arrivals section */

  /* blogs section */
 include_once('NewTemplate/_blogs.php');
  /* blogs section */
  ?>
  
     <?php
    // include footer.php file*/
 include_once('footer.php');
    ?>

