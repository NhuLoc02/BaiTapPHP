<div class="main-panel">
    <div class="content-wrapper">
        <?php
        if (isset($_GET['action']) && $_GET['query']) {
            $action = $_GET['action'];
            $query = $_GET['query'];

        } else {
            $action = '';
            $query = '';
        }
        if ($action == 'dashboard' && $query == 'dashboard') {
            include("./modules/dashboard.php");
        }
        elseif ($action == 'order' && $query == 'order_list') {
            include("./modules/order/lietke.php");
        }
        elseif ($action == 'order' && $query == 'order_live') {
            include("./modules/order/donhangtructiep.php");
        }
        elseif ($action == 'order' && $query == 'order_payment') {
            include("./modules/order/lichsuthanhtoan.php");
        }
        elseif ($action == 'order' && $query == 'order_add') {
            include("./modules/order/them.php");
        }
        elseif ($action == 'order' && $query == 'order_add') {
            include("./modules/order/them.php");
        }
        elseif ($action == 'order' && $query == 'order_search') {
            include("./modules/order/timkiem.php");
        }
        elseif($action =='order' && $query == 'order_detail') {
            include("./modules/order/chitiet.php");
        }
        elseif($action =='order' && $query == 'order_detail_online') {
            include("./modules/order/chitiet_online.php");
        }
        elseif($action =='category' && $query == 'category_add') {
            include("./modules/category/them.php");
        }
        elseif($action =='category' && $query == 'category_list') {
            include("./modules/category/lietke.php");
        }
        elseif($action =='category' && $query == 'category_edit') {
            include("./modules/category/sua.php");
        } 
        elseif($action =='collection' && $query == 'collection_add') {
            include("./modules/collection/them.php");
        }
        elseif($action =='collection' && $query == 'collection_list') {
            include("./modules/collection/lietke.php");
        }
        elseif($action =='collection' && $query == 'collection_edit') {
            include("./modules/collection/sua.php");
        } 
        elseif($action =='product' && $query == 'product_add') {
            include("./modules/product/them.php");
        }
        elseif($action =='product' && $query == 'product_list') {
            include("./controllers/ProductController.php");
            $productController = new ProductController();
            $productController->productList($productModel);

        }
        elseif($action =='product' && $query == 'product_edit') {
            include("./modules/product/sua.php");
        }
        elseif($action =='product' && $query == 'product_search') {
            include("./modules/product/timkiem.php");
        }
        elseif($action =='product' && $query == 'product_inventory') {
            include("./modules/product/tonkho.php");
        }
        elseif($action =='account' && $query == 'my_account') {
            include("./modules/account/my_account.php");
        }
        elseif($action =='account' && $query == 'password_change') {
            include("./modules/account/password_change.php");
        }
        elseif($action =='account' && $query == 'account_list') {
            include("./modules/account/lietke.php");
        }
        elseif($action =='account' && $query == 'account_edit') {
         
        }
        elseif ($action == 'article' && $query == 'article_add') {
            require_once 'views/ArticleAddView.php';
            
        } 
        elseif ($action == 'article' && $query == 'article_add2') {
        require_once 'controllers/ArticleController.php';
            $articleController = new ArticleController();
            // Call the addArticle method on the created object
            $articleController->addArticle(); }
        elseif($action =='article' && $query == 'article_list') {
            include("./controllers/ArticleController.php");
        }
        elseif ($action == 'article' && $query == 'article_delete') {
            require_once 'controllers/ArticleController.php';
            $articleController = new ArticleController();
            $checkedIds = !empty($_GET['checked_ids']) ? json_decode($_GET['checked_ids']) : [];
            foreach ($checkedIds as $articleId) {
                $articleController->deleteArticle($articleId);
            }
        }
        elseif($action =='article' && $query == 'article_edit') {
            require_once 'controllers/ArticleController.php';
            $articleController = new ArticleController(); 
        // Gọi phương thức addArticle từ đối tượng đã tạo
            $articleController->editArticle();
        } 
        elseif($action =='brand' && $query == 'brand_list') {
            include("./controllers/BrandController.php");
            $brandController = new BrandController();
            $brandController->brandList($brandModel);
        }
        elseif($action =='brand' && $query == 'brand_add_ahihi') {
            require_once ("./controllers/BrandController.php");
            $brandController = new BrandController();
            $brandController->addBrand($brandId, $brandId, '', $brandModel);
        }
        elseif($action =='brand' && $query == 'brand_edit_ahihi') {
            
            require_once ("./controllers/BrandController.php");
            $brandController = new BrandController();
            $brandController->editBrand($brandId, '', $brandModel);
        }
        elseif($action =='customer' && $query == 'customer_list') {
            include("./modules/customer/lietke.php");
        }
        elseif($action =='inventory' && $query == 'inventory_list') {
            include("./modules/inventory/lietke.php");
        }
        elseif($action =='inventory' && $query == 'inventory_add') {
            include("./modules/inventory/them.php");
        }
        elseif($action =='inventory' && $query == 'inventory_detail') {
            include("./modules/inventory/chitiet.php");
        }
        elseif($action =='dashboard' && $query == 'dashboard') {
            include("./modules/dashboard.php");
        } 
        elseif($action =='settings' && $query == 'settings') {
            include("./modules/settings/main.php");
        }
        else {
            include("./modules/home.php");
        } 
        ?>
    </div>
</div>
