<div class="product__banner p-relative">
    <div class="image__banner p-absolute">

    </div>
    <div class="p-absolute banner-overlay">

    </div>
    <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="product__title d-flex align-center justify-center">
                            <?php 
                            if (isset($_GET['category_id'])) {
                                foreach($category as $row) {
                            ?>
                                    <h2 class="h2"><?php echo $row['category_name'] ?></h2>
                                <?php
                                }
                            } else if (isset($_GET['brand_id'])) {
                                foreach($categories as $row) {
                                ?>
                                    <h2 class="h2"><?php echo $row['brand_name'] ?></h2>
                                <?php
                                }
                            } else {
                                ?>
                                <h2 class="h2">Sản phẩm của cửa hàng</h2>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>