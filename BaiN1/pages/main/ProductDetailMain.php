<!-- start product detail -->
<?php
include("./pages/views/ProductDetailView.php");

?>
<!-- end product detail -->
<?php
if (isset($_SESSION['account_id'])) {
?>
    <!-- start product filtering -->
    <?php
    include("./pages/views/ProductFilteringView.php");
    ?>
    <!-- end product filtering -->
<?php
} else {
?>
    <!-- start product list -->
    <?php
    include("./pages/views/ProductRelateView.php");
    ?>
    <!-- end product list -->
<?php
}
?>