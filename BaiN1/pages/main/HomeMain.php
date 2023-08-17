<!-- start banner -->
<?php
include("./pages/views/BannerView.php");

?>
<!-- end banner -->

<!-- start collage -->
<?php
require_once('./pages/controllers/CollageController.php');
$collagecontroller = new CollageController();
$collagecontroller->collage($collageModel);
?>
<!-- end collage -->

<!-- start product list -->
<?php
include("./pages/views/ProductlistView.php");
?>
<!-- end product list -->

<?php
include("./pages/views/NewsView.php");
?>