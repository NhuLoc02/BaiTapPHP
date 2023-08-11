<?php
require_once './controllers/BrandController.php';
$mysqli = new mysqli("localhost", "root", "", "test");

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}
$sql_edit_brand = "SELECT * FROM brand WHERE brand_id = '$_GET[brand_id]' LIMIT 1";
$query_edit_brand = mysqli_query($mysqli, $sql_edit_brand);
?>
<div class="row"><body>
    <!-- Add the necessary page content -->
    <div class="row" style="margin-bottom: 10px;">
        <div class="col d-flex" style="justify-content: space-between; align-items: flex-end;">
            <h3>
                Sửa thương hiệu
            </h3>
            <a href="index.php?action=brand&query=brand_list" class="btn btn-outline-dark btn-fw">
                <i class="mdi mdi-reply"></i>
                Quay lại
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="card-content">
                    <?php
             
                    while ($item = mysqli_fetch_array($query_edit_brand)) {
                    ?>
                        <form method="POST" action="models/BrandModel.php?brand_id=<?php echo $brandId; ?>" enctype="multipart/form-data">

                            <div class="input-item form-group">
                                <label for="title" class="d-block">Tên thương hiệu</label>
                                <input type="text" name="brand_name" class="form-control" value="<?php echo $item['brand_name']; ?>" placeholder="collection name">
                            </div>
                                <button type="submit" name="brand_edit" class="btn btn-primary btn-icon-text">
                                <i class="ti-file btn-icon-prepend"></i>
                                 Sửa
                                </button>
                        </form>
                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
