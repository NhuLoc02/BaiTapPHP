
<div class="row">
    <div class="col">
        <div class="header__list d-flex space-between align-center">
            <h3 class="card-title" style="margin: 0;">Danh thương hiệu</h3>
            <div class="action_group">
                <a href="?action=brand&query=brand_add_ahihi" class="button button-dark">Thêm thương hiệu</a>
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
                                <th>MaSP</th>
                                <th>Tên thương hiệu</th>
                            </tr>
                        </thead>
                        <tbody>
                        <form method="POST" action="cont.php">
                            <?php
                            $i = 0;
                            if (isset($brands)) { // Check if $brands variable is defined
                                foreach ($brands as $row) {
                                $i++;
                            ?>
                                <tr>
                                    <td>
                                        <a href="index.php?action=brand&query=brand_edit_ahihi&brand_id=<?php echo $row['brand_id'] ?>">
                                            <div class="icon-edit">
                                            <img class="w-100 h-100" src="images/icon-edit.png" alt="">
                                            </div>
                                        </a>
                                    </td>
                                    <td>
                                        <input type="checkbox" class="checkbox" onclick="testChecked();" id="<?php echo $row['brand_id'] ?>">
                                    </td>
                                    <td><?php echo $row['brand_id'] ?></td>
                                    <td><?php echo $row['brand_name'] ?></td>
                                </tr>
                            
                            <?php
                            }
                            }
                            else {
                                echo "No brands found."; // Display a message if $brands is not defined or empty
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
        <a href="#" class="button__control" id="brand_delete">Xóa</a>
    </div>
</div>
<script>
    var btnDelete = document.getElementById("brand_delete");
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
        btnDelete.href = "?action=brand&query=brand_delete&checked_ids=" + JSON.stringify(checkedIds);
    }
</script>