<div class="row">
    <div class="col">
        <div class="header__list d-flex space-between align-center">
            <h3 class="card-title" style="margin: 0;">Danh sách sản phẩm</h3>
            <div class="action_group">
                <a href="?action=brand&query=brand_add" class="button button-dark">Thêm sản phẩm</a>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="main-pane-top d-flex justify-center align-center">
                    <div class="input__search p-relative">
                        <form class="search-form" action="#">
                            <i class="icon-search p-absolute"></i>
                            <input type="search" class="form-control" placeholder="Search Here" title="Search here">
                        </form>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover table-action">
                        <thead>
                            <tr>
                                <th></th>
                                <th>
                                    <input type="checkbox" id="checkAll">
                                </th>
                                <th>Mã sản phẩm</th>
                                <th>Tên sản phẩm</th>
                                <th>Tên thương hiệu</th>
                                <th>Tên loại sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Giá nhập</th>
                                <th>Giá bán</th>
                                <th>Giá sale</th>
                                <th>Mô tả</th>
                                <th>Tình trạng</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($products as $row) {
                                $i++;
                            ?>
                                <tr>
                                    <td>
                                        <a href="?action=product&query=product_edit&product_id=<?php echo $row['product_id'] ?>">
                                            <div class="icon-edit">
                                                <img="w-100 h-100" src="images/icon-edit.png" alt="">
                                            </div>
                                        </a>
                                    </td>
                                    <td>
                                        <input type="checkbox" class="checkbox" onclick="testChecked();" id="<?php echo $row['product_name'] ?>">
                                    </td>
                                    <td><?php echo $row['product_id'] ?></td>
                                    <td><?php echo $row['product_name'] ?></td>
                                    <td><?php echo $row['brand_name'] ?></td>
                                    <td><?php echo $row['category_name'] ?></td>
                                    <td><?php echo $row['product_quantity'] ?></td>
                                    <td><?php echo $row['product_price_import'] ?></td>
                                    <td><?php echo $row['product_price'] ?></td>
                                    <td><?php echo $row['product_sale'] ?></td>
                                    <td><?php echo $row['product_description'] ?></td>
                                    <td><?php echo $row['product_status'] ?></td>
                                </tr>
                            <?php
                            }
 ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="dialog__control">
    <div class="control__box">
        <a href="#" class="button__control" id="product_delete">Xóa</a>
    </div>
</div>
<script>
    var btnDelete = document.getElementById("product_delete");
    var checkAll = document.getElementById("checkAll");
    var checkboxes = document.getElementsByClassName("checkbox");
    var dialogControl = document.querySelector('.dialog__control');
    // Thêm sự kiện click cho checkbox checkAll
    checkAll.addEventListener("click", function() {
        // Nếu checkbox checkAll được chọn
        if (checkAll.checked) {
            // Đặt thuộc tính "checked" cho tất cả các checkbox còn lại
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = true;
            }
        } else {
            // Bỏ thuộc tính "checked" cho tất cả các checkbox còn lại
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = false;
            }
        }
        testChecked();
        getCheckedCheckboxes();
    });

    console.log(checkboxes[0]);

    function testChecked() {
        var count = 0;
        for (let i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].checked) {
                count++;
                console.log(count);
            }
        }
        if (count > 0) {
            dialogControl.classList.add('active');
        } else {
            dialogControl.classList.remove('active');
            checkAll.checked = false;
        }
    }

    function getCheckedCheckboxes() {
        var checkeds = document.querySelectorAll('.checkbox:checked');
        var checkedIds = [];
        for (var i = 0; i < checkeds.length; i++) {
            checkedIds.push(checkeds[i].id);
        }
        btnDelete.href = "modules/blog/xuly.php?data="+ JSON.stringify(checkedIds);
    }
</script>
