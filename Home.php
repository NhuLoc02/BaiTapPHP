
      
<div class="row">
    <div class="col-lg-3 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="card-content">
                    <h3 class="box-title">Sản Phẩm</h3>
                    <span class="box-number color-t-yellow"><?php echo $data['productCount'] ?></span>
                    <div class="box-number-new">
                        <p>Sản phẩm đang bán</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="card-content">
                    <h3 class="box-title">Số đơn hàng mới</h3>
                    <span class="box-number color-t-blue"><?php echo $data['orderCount'] ?></span>
                    <div class="box-number-new">
                        <p>Đơn hàng trong ngày</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="card-content">
                    <h3 class="box-title">Số khách hàng mới</h3>
                    <span class="box-number color-t-red"><?php echo $data['customerCount'] ?></span>
                    <div class="box-number-new">
                        <p>khách hàng của tháng</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="card-content">
                    <h3 class="box-title">Doanh thu hôm nay</h3>
                    <span class="box-number text-success"><?php echo number_format($data['sales']) ?>đ</span>
                    <div class="box-number-new">
                        <p>Thống kê ngày hôm nay</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="card-content">
                    <div id="donutchart"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="card-content">
                    <h4>Thống kê doanh số</h4>
                    <div id="homechart" style="height: 300px;"></div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {

        thongke();


        var donut = new Morris.Donut({
            element: 'donutchart',
            data: [{
                    label: "Đơn hàng tại quầy",
                    value: <?php echo $data['orderLive'] ?>
                },
                {
                    label: "Đơn hàng online",
                    value: <?php echo $data['orderOnline'] ?>
                },
                {
                    label: "Đơn hàng hủy",
                    value: <?php echo $data['orderCancel'] ?>
                }
            ]
        });

        var char = new Morris.Line({

            element: 'homechart',

            xkey: 'date',

            ykeys: ['date', 'order', 'sales', 'quantity'],

            labels: ['Ngày', 'Đơn hàng', 'Doanh thu', 'Số lượng']
        });

        function thongke() {
            var thoigian = '365ngay';
            $.ajax({
                url: "controllers/MetricController.php",
                method: "POST",
                dataType: "JSON",
                data: {
                    thoigian: thoigian
                },
                success: function(data) {
                    char.setData(data);
                }
            })
        }
    });
</script>
