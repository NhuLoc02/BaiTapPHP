<div class="row" style="margin-bottom: 10px;">
    <div class="col d-flex" style="justify-content: space-between; align-items: flex-end;">
        <h3>
            Chi tiết đơn hàng
        </h3>
        <a href="index.php?action=order&query=order_list" class="btn btn-outline-dark btn-fw">
            <i class="mdi mdi-reply"></i>
            Quay lại
        </a>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="card-content">
                    <div class="checkout">
                        <div class="row">
                            <div class="col col-lg-7">
                            <?php
                            foreach ($getByIds as $row) {
                            ?>
                                <div class="checkout__title d-flex align-center space-between"><span>Mã đơn hàng: <?php echo $row['order_code'] ?></span> <span>Thời gian: <?php $row['order_date'] ?></span></div>
                                <?php
                                    } 
                                    ?>
                                <div class="checkout__infomation">
                                    <?php
                                    $total;
                                    foreach ($orderDetails as $account) {

                                        $total = $account['total_amount'];
                                    ?>
                                        <div class="info__item d-flex">
                                            <label class="info__title" for="">Tên khách hàng:</label>
                                            <input type="text" class="info__input flex-1" name="delivery_name" value="<?php echo $account['delivery_name'] ?>" readonly></input>
                                        </div>
                                        <div class="info__item d-flex">
                                            <label class="info__title" for="">Địa chỉ:</label>
                                            <input type="text" class="info__input flex-1" name="delivery_address" value="<?php echo $account['delivery_address'] ?>" readonly></input>
                                        </div>
                                        <div class="info__item d-flex">
                                            <label class="info__title" for="">Số điện thoại:</label>
                                            <input type="text" class="info__input flex-1" name="delivery_phone" value="<?php echo $account['delivery_phone'] ?>" readonly></input>
                                        </div>
                                        <div class="info__item d-flex">
                                            <label class="info__title" for="">Ghi chú:</label>
                                            <input type="text" class="info__input flex-1" name="delivery_note" value="<?php echo $account['delivery_note'] ?>" readonly></input>
                                        </div>
                                        <div class="info__item d-flex">
                                            <label for="" class="info__title" for="order_type">Phương thức:</label>
                                            <input type="text" class="info__input flex-1" name="order_type" value="<?php format_order_type($account['order_type']) ?>"></input>
                                        </div>
                                    <?php
                                    } 
                                    ?>
                                </div>
                            </div>
                            <div class="col col-lg-5">
                                <div class="checkout__cart">
                                    <div class="checkout__items">
                                        <?php
                                       
                                         foreach ($productDetails as $cart_item) {
                
                                        ?>
                                            <div class="checkout__item d-flex align-center">
                                                <div class="checkout__image p-relative">
                                                    <div class="product-quantity align-center d-flex justify-center p-absolute"><span class="quantity-number"><?php echo $cart_item['product_quantity'] ?></span></div>
                                                    <img class="w-100 d-block object-fit-cover ratio-1" src="modules/product/uploads/<?php echo $cart_item['product_image'] ?>" alt="">
                                                </div>
                                                <div class="checkout__name flex-1">
                                                    <h3 class="checkout__name"><?php echo $cart_item['product_name'] ?></h3>
                                                </div>
                                                <div class="checkout__price"><?php echo (number_format($cart_item['product_price'] - ($cart_item['product_price'] / 100 * $cart_item['product_sale']))) . ' ₫' ?></div>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <table class="w-100 mg-t-20">
                                        <tr class="table-row">
                                            <td class="h6 table-col">Giảm giá</td>
                                            <td class="h6 table-col text-right"> 0₫</td>
                                        </tr>
                                        <tr class="table-row">
                                            <td class="h6 table-col">Phí vận chuyển</td>
                                            <td class="h6 table-col text-right">Miễn phí</td>
                                        </tr>
                                    </table>
                                    <div class="checkout__bottom d-flex align-center space-between">
                                        <h4 class="checkout__total">Tổng tiền:</h4>
                                        <span class="checkout__total"><?php echo number_format((float) $total) . '₫' ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex algin-center space-between">
                            <?php
                            foreach ($getByIds as $row) {
                            ?>
                                <div class="order__detail--action">
                                    <?php 
                                    if ($row['order_status'] <= 2) {
                                    ?>
                                    <a href="?action=order&query=order_confirm&checked_ids=<?php echo $row['order_code']?>" class="btn btn-outline-dark btn-fw">Duyệt đơn</a>
                                    <?php
                                    } else {
                                    ?>
                                    <a href="?action=order&query=order_rollback&checked_ids=<?php echo $row['order_code'] ?>" class="btn btn-outline-dark btn-fw">Trả hàng</a>
                                    <?php
                                    }
                                    ?>
                                    <a href="?action=order&query=order_print&checked_ids=<?php echo $row['order_code'] ?>" target="_blank" class="btn btn-outline-dark btn-fw mg-l-16">In Hóa Đơn</a>
                                </div>

                                <div class="order_status">Tình trạng đơn: <span class="col-span"><?php format_order_status($row['order_status']); ?></span></div>
                            <?php
                            }
                            ?>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function showSuccessToast() {
        toast({
            title: "Success",
            message: "Cập nhật thành công",
            type: "success",
            duration: 0,
        });
    }
    function showInfoToast() {
        toast({
            title: "Info",
            message: "Tính năng tạm thời đang phát triển",
            type: "info",
            duration: 0,
        });
    }
    function showErrorToast() {
        toast({
            title: "Error",
            message: "Không thể thực thi yêu cầu",
            type: "error",
            duration: 0,
        });
    }
</script>

<?php
if (isset($_GET['message']) && $_GET['message'] == 'success') {
    echo '<script>';
    echo 'showSuccessToast();';
    echo '</script>';
} elseif (isset($_GET['message']) && $_GET['message'] == 'info') {
    echo '<script>';
    echo 'showInfoToast();';
    echo '</script>';
}
?>

<script>
    window.history.pushState(null, "", "index.php?action=order&query=order_detail_online&order_code=" + "<?php echo $order_code ?>");
</script>