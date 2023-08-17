<!-- start header -->
<?php
include("./pages/views/HeaderView.php");
?>
<!-- end header -->

<?php
    if (isset($_GET['page'])) {
        $action = $_GET['page'];
    }else {
        $action = '';
    }

    if ($action == 'about') {
        include("./pages/views/AboutView.php");
    }
    elseif ($action == 'blog') {
        require_once './pages/controllers/BlogController.php';
        $blogController= new BlogController;
        $blogController -> getBlog($blogModel);
    }
    elseif ($action == 'article') {
        include("./controllers/ArticleController.php");
    }
    elseif ($action == 'contact') {
        include("./pages/controllers/ContactController.php");
        $contactController= new ContactController;
        $contactController -> contactAdd();
    }
    elseif ($action == 'cart') {
        include("./pages/views/CartView.php");
    }
    elseif ($action == 'products') {
        include("./pages/main/ProductMain.php");
    }
    elseif ($action == 'search'){
        include("./pages/main/SearchMain.php");
    }
    elseif ($action == 'product_detail'){
        include("./pages/main/ProductDetailMain.php");
    }
    elseif ($action == 'checkout'){
        include("./pages/main/CheckOutMain.php");
    }
    elseif ($action == 'thankiu'){
        include("./pages/main/ThanksMain.php");
    }
    elseif ($action == 'login'){
        include("./pages/main/LoginMain.php");
    }
    elseif ($action == 'register'){
        include("./pages/main/RegisterMain.php");
    }
    elseif ($action == 'my_account'){
        include("./pages/main/MyAccountMain.php");
    }
    elseif ($action == 'order_detail'){
        include("./pages/views/OrderDetailView.php");
    }
    elseif ($action == 'password_change'){
        include("./pages/views/PasswordChangeView.php");
    }
    else {
        include("./pages/main/HomeMain.php");
    }
?>

<!-- start footer -->
<?php
include("./pages/views/FooterView.php");
?>
<!-- end footer -->