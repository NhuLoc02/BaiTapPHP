<?php
    if (isset($_GET['tab'])) {
        $tab = $_GET['tab'];
    }else {
        $tab = '';
    }
?>
<!-- start my account -->
<section class="my-account pd-section">
    <div class="container">
        <h3 class="h4 my-account__heading">Chào mừng bạn đến với trang tổng quan tài khoản</h3>
        <div class="my-account__container">
            <div class="row">
                <div class="col" style="--w-md: 3">
                    <ul class="my-account__menu">
                        <li class="my-account__item <?php if($tab == 'account_info') { echo 'active';} ?>">
                            <a href="index.php?page=my_account&tab=account_info" class="">Tài khoản</a>
                        </li>
                        <li class="my-account__item <?php if($tab == 'account_order') { echo 'active';} ?>">
                            <a href="index.php?page=my_account&tab=account_order" class="">Đơn hàng đang xử lý</a>
                        </li>
                        <li class="my-account__item <?php if($tab == 'account_history') { echo 'active';} ?>">
                            <a href="index.php?page=my_account&tab=account_history" class="">Lịch sử mua hàng</a>
                        </li>
                        <li class="my-account__item <?php if($tab == 'account_settings') { echo 'active';} ?>">
                            <a href="index.php?page=my_account&tab=account_settings" class="">Cài đặt tài khoản</a>
                        </li>
                        <li class="my-account__item">
                            <a href="index.php?logout=1" onclick="return confirm('Bạn có đăng xuất không?')" class="">Đăng xuất</a>
                        </li>
                    </ul>
                </div>
                <div class="col" style="--w-md: 9">
                    <?php
                        if ($tab == 'account_order') {
                            include('./pages/views/AccountOrderView.php');
                        }
                        elseif ($tab == 'account_history') {
                            include("./pages/views/AccountHistoryView.php");
                        }
                        elseif ($tab == 'account_settings') {
                            include("./pages/views/AccountSettingView.php");
                        }
                        else {
                            include("./pages/views/AccountInfoView.php");
                        }
                        
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end my account -->