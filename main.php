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
            include("./views/DashBoardView.php");
        }
        elseif($action =='order' && $query == 'order_list') {
            require_once './format/format.php';
            include("./controllers/OrderController.php");
            $orderController = new OrderController();
            $orderController->orderList($orderModel);
        }
        elseif ($action == 'order' && $query == 'order_payment') {
            require_once './format/format.php';
            include("./controllers/OrderController.php");
            $orderController = new OrderController();
            $orderController->orderHistory();
        }
        elseif ($action == 'order' && $query == 'order_search') {
            include("./modules/order/timkiem.php");


        }
         elseif($action =='order' && $query == 'order_detail') {
            require_once './format/format.php';
            require_once ("./controllers/OrderController.php");
            $orderController = new OrderController();
            $orderController->getOrderHisDetail();
        }
        elseif($action =='order' && $query == 'order_detail_online') {
            require_once './format/format.php';
            require_once ("./controllers/OrderController.php");
            $orderController = new OrderController();
            $orderController->getOrderDetail();
        }
        elseif($action =='order' && $query == 'order_confirm') {
            include("./controllers/OrderController.php");
            $orderController = new OrderController();
            $orderController->confirmOrder($orderModel);
        }
        elseif($action =='category' && $query == 'category_add') {
            require_once ("./controllers/CategoryController.php");
            $categoryController = new CategoryController();
            $categoryController->addCategory($categoryId, $categoryId, '', $categoryModel);
        }
        elseif($action =='category' && $query == 'category_list') {
            include("./controllers/CategoryController.php");
            $categoryController = new CategoryController();
            $categoryController->categoryList($categoryModel);
        }
        elseif($action =='category' && $query == 'category_edit') {
            require_once ("./controllers/CategoryController.php");
            $categoryController = new CategoryController();
            $categoryController->editCategory($categoryId, $categoryName, $categoryModel);
        }
        elseif ($action == 'category' && $query == 'category_delete') {
            require_once 'controllers/CategoryController.php';
            $categoryController = new CategoryController();
            $checkedIds = !empty($_GET['checked_ids']) ? json_decode($_GET['checked_ids']) : [];
            foreach ($checkedIds as $categoryId) {
                $categoryController->deleteCategory($categoryId);
            }
        }
        elseif($action =='product' && $query == 'product_add') {
            include("./controllers/ProductController.php");
            $productController = new ProductController();
            $productController->addProducts();
        
        }
        elseif($action =='product' && $query == 'product_list') {
            include("./controllers/ProductController.php");
            $productController = new ProductController();
            $productController->showProducts();
        }
        elseif($action =='product' && $query == 'product_edit') {
            include("./controllers/ProductController.php");
            $productController = new ProductController();
            $productController->editProduct($productModel);
        }
        elseif ($action == 'product' && $query == 'product_delete') {
            require_once 'controllers/ProductController.php';
            $productController = new ProductController();
            $checkedIds = !empty($_GET['checked_ids']) ? json_decode($_GET['checked_ids']) : [];
            foreach ($checkedIds as $product_id) {
                $productController->deleteProduct($product_id);
            }
        }
        elseif($action =='product' && $query == 'product_search') {
            include("./modules/product/timkiem.php");
        }
        elseif($action =='product' && $query == 'product_inventory') {
            include("./views/ProductTon.php");
        }
        elseif($action =='account' && $query == 'my_account') {
            include("./views/MyAccountView.php");
        }
        elseif($action =='account' && $query == 'password_change') {
            include("./modules/PasswordChange.php");
        }
        elseif($action =='account' && $query == 'account_list') {
            require_once('./controllers/AccController.php');
            $accController = new AccountController();
            $accController ->accList($accModel);
        }
        elseif($action =='account' && $query == 'account_edit') {
            require_once('./controllers/AccController.php');
            $accController = new AccountController();
            $accController ->accListId($account_id,'', $accModel);
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
            $articleController = new ArticleController();
            $articleController ->articleList($articleModel);
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
            include("./controllers/CustomerController.php");
        }
        elseif($action =='inventory' && $query == 'inventory_list') {
            include("./Views/InventoryView.php");
        }
        elseif($action =='settings' && $query == 'settings') {
            include("./public/setting.php");
        }
        else {
            include("./controllers/HomeController.php");
            $controller = new DashboardController($mysqli);
            $data = $controller->getDashboardData();
        } 
        ?>
    </div>
</div>
