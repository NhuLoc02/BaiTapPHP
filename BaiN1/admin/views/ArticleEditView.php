<div class="row" style="margin-bottom: 10px;">
    <div class="col d-flex" style="justify-content: space-between; align-items: flex-end;">
        <h3>
            Sửa bài viết
        </h3>
        <a href="index.php?action=article&query=article_list" class="btn btn-outline-dark btn-fw">
            <i class="mdi mdi-reply"></i>
            Quay lại
        </a>
    </div>
</div>

<form method="POST" action="" enctype="multipart/form-data">
    <!-- Article editing form -->
    <div class="row">
            <div class="col-lg-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="input-item form-group">
                            <label for="author" class="d-block">Tên tác giả</label>
                            <input id=author type="text" name="article_author" class="d-block form-control" value="<?php echo $data['article_author'] ?>" placeholder="">
                        </div>
                        <div class="input-item form-group">
                            <label for="title" class="d-block">Tiêu đề bài viết</label>
                            <input type="text" name="article_title" class="d-block form-control" value="<?php echo $data['article_title'] ?>" placeholder="">
                        </div>
                        <div class="input-item form-group">
                            <label for="title" class="d-block">Nội dung tóm tắt</label>
                            <textarea name="article_summary"><?php echo $data['article_summary'] ?></textarea>
                        </div>
                        <div class="input-item form-group">
                            <label for="title" class="d-block">Nội dung chính bài viết</label>
                            <textarea name="article_content"><?php echo $data['article_content'] ?></textarea>
                        </div>
                        <div class="input-item form-group">
                                <label for="title" class="d-block">Tình trạng</label>
                                <select name="article_status" id="article_status" class="form-control">
                                    <option value="1" <?php if ($data['article_status'] == 1) {
                                                            echo "selected";
                                                        } ?>>Xuất bản</option>
                                    <option value="0" <?php if ($data['article_status'] == 0) {
                                                            echo "selected";
                                                        } ?>>Bản nháp</option>
                                </select>
                            </div>

                        <button type="submit" name="article_edit" class="btn btn-primary btn-icon-text mg-t-16">
                            <i class="ti-file btn-icon-prepend"></i>
                            Sửa
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="over-flow-hidden">
                            <div class="main-pane-top">
                            </div>
                            </div>
                            <div class="input-item form-group">
                                <label for="image" class="">Image</label>
                                <img src="modules/blog/uploads/<?php echo $data['article_image'] ?>" class="article__image w-100 h-100" style="width: 100px; height: 100px;" alt="image">
                                <input type="file" name="article_image" value="<?php echo $data['article_image'] ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</form>



<div class="dialog__control">
    <div class="control__box">
        <a href="#" class="button__control" id="btnAccept">Duyệt</a>
        <a href="#" class="button__control btn__wanning" id="btnDelete">Xóa</a>
    </div>
</div>

<script>

    CKEDITOR.replace('article_summary');
    CKEDITOR.replace('article_content');
    
    var btnAccept = document.getElementById("btnAccept");
    var btnDelete = document.getElementById("btnDelete");
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
        var checkedComment = [];
        for (var i = 0; i < checkeds.length; i++) {
            checkedComment.push(checkeds[i].id);
        }
        btnAccept.href = "&article_id=<?php echo $_GET['article_id'] ?>&acceptcomment=1&data="+ JSON.stringify(checkedComment);
        btnDelete.href = "&article_id=<?php echo $_GET['article_id'] ?>&deletecomment=1&data="+ JSON.stringify(checkedComment);
    }
    // JavaScript code for handle page interactions
</script>