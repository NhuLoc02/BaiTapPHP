<div class="row">
    <div class="col">
        <div class="header__list d-flex space-between align-center">
            <h3 class="card-title" style="margin: 0;">Danh sách khách hàng</h3>
            <div class="action_group">
                <a href="modules/customer/export.php" class="button button-dark">Export</a>
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
                                <th>Tên khách hàng</th>
                                <th>Giới tính</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                             $i = 0;
                             foreach ($customers as $row) {
                                 $i++;
                            ?>
                                <tr>
                                    <td>
                                        
                                    </td>
                                    <td>
                                        <input type="checkbox" class="checkbox" onclick="testChecked(); getCheckedCheckboxes();" id="<?php echo $row['customer_id'] ?>">
                                    </td>
                                    <td><?php echo $row['customer_name'] ?></td>
                                    <td><?php echo format_gender($row['customer_gender']) ?></td>
                                    <td><?php echo $row['customer_email'] ?></td>
                                    <td><?php echo $row['customer_phone'] ?></td>
                                    <td><?php echo $row['customer_address'] ?></td>
                                </tr>
                            <?php
                            }
                            ?>

                        </tbody>
                    </table>

                </div>

<?php
function format_gender($customer_gender) {
    if ($customer_gender == 0) {
        return 'Không xác định';
    } elseif ($customer_gender == 1) {
        return 'Nam';
    } elseif ($customer_gender == 2) {
        return 'Nữ';
    } else {
        return 'Không xác định';
    }
} ?>                
</div>
<div class="dialog__control">
    <div class="control__box">
    <a href="#" class="button__control btn__wanning" id="customer_delete" onclick="return confirm('Bạn có thực sự muốn xóa thông tin khách hàng này không?')">Xóa</a>
        
    </div>
</div>
<script>
    var btnDelete = document.getElementById("customer_delete");
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
        btnDelete.href = "?action=customer&query=customer_delete&checked_ids=" + JSON.stringify(checkedIds);
    }
</script>

<!-- <script>
    function showSuccessToast() {
        toast({
            title: "Success",
            message: "Cập nhật thành công",
            type: "success",
            duration: 0,
        });
    }
    function showErrorToast() {
        toast({
            title: "Error",
            message: "Bạn không có quyền xóa thông tin này",
            type: "error",
            duration: 0,
        });
    }
</script> -->