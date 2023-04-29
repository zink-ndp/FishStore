<?php
ob_start();
session_start();

?>


<?php 
	include "head.php"
	?>
<?php
$title ="Shop Cá Kiểng";
$name ="Shop Cá Kiểng";
?>
<?php 
	include "top.php"
?>
<?php 
// include "header.php"
?>
<?php 
include "navigation.php"
?>
<div id="page-content" class="single-page">
<div class="container">
<div class="row">
    <div class="col-lg-12">
    <ul class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li><a href="chitiethd.php">Chi Tiết Hóa Đơn</a></li>
    </ul>
    </div>
</div>
<div class="row">
    <div class="col-md-8 text-center" id="ff5">
        <?php
            if(isset($_GET["hd_id"])){
            $hdid = $_GET["hd_id"];
            $sql = "select hd.HD_ID as mahd, hd.HD_NGAYDAT as ngay, kh.KH_ID as makh, kh.KH_HOTEN as tenkh, kh.KH_SDT as sdtkh, kh.KH_DIACHI as dckh, nv.NV_ID as manv, nv.NV_HOTEN as tennv
                    from hoa_don hd
                    inner join khach_hang kh on kh.KH_ID = hd.KH_ID
                    inner join nhan_vien nv on nv.NV_ID = hd.NV_ID
                    where hd.HD_ID={$hdid};";
            $rs = $conn->query($sql);
            $row = mysqli_fetch_assoc($rs);
        ?>
        <div class="row">
            <div class="heading">
                <h1>Chi tiết hoá đơn</h1>
            </div>
            <div id="hdbody">
                <label for="example-text-input" class="panel-heading">Hóa Đơn worldFish</label>
            </div>
            <div>
                Mã đơn: <?php echo $row["mahd"]; ; $mahd = $row["mahd"]; ?> - Ngày đặt: <?php echo date('d/m/Y', strtotime($row["ngay"])) ?>
            </div>
            <div>
                <label for="example-text-input text-uppercase" class="panel-heading">Thông tin khách hàng</label>
                <div >
                    Tên khách hàng: <?php echo $row["tenkh"] ?>
                </div>
                <div>
                    SDT: <?php echo $row["sdtkh"] ?>
                </div>
                <div>
                    Địa chỉ: <?php echo $row["dckh"] ?>
                </div>
                <div>
                    <label for="example-text-input text-uppercase" class="panel-heading">Danh Sách Sản Phẩm</label>
                </div>
                <table class="table">
                    <thead class="col-12">
                    <th class="text-center">Tên sản phẩm</th>
                    <th class="text-center">Số Lượng</th>
                    <th class="text-center">Đơn Giá</th>
                    <th class="text-center">Thành Tiền</th>
                    </thead>
                    <tbody>
                    <?php
                        $sql = "select sp.SP_TEN as tensp, sp.SP_GIA as giasp , ct.SP_SOLUONG as slsp, (ct.SP_SOLUONG*sp.SP_GIA) as tongtien 
                                from chitiet_hd ct 
                                join hoa_don hd on hd.HD_ID = ct.HD_ID 
                                join san_pham sp on sp.SP_ID = ct.SP_ID 
                                where hd.HD_ID = {$row["mahd"]}; ";

                        $rs = $conn->query($sql);
                        $rs_all = $rs -> fetch_all(MYSQLI_ASSOC);
                        foreach($rs_all as $row){
                        ?>
                        <tr>
                            <td class="align-middle text-xs text-center">
                            <?php echo $row["tensp"] ?>
                            </td>
                            <td class="align-middle text-center">
                            <?php echo $row["slsp"] ?>
                            </td>
                            <td class="align-middle font-weight-bold text-success text-center">
                            <?php echo number_format($row["giasp"], 0) ?>
                            </td>
                            <td>
                            <?php echo number_format($row["tongtien"], 0) ?>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                        <tr>
                            <td colspan="4">
                            <hr style="height:1px;border-width:0;color:gray;background-color:gray">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-end">
                                <?php
                                    $sql = "select sum(ct.SP_SOLUONG*sp.SP_GIA) as tongtien 
                                        from chitiet_hd ct 
                                        join hoa_don hd on hd.HD_ID = ct.HD_ID 
                                        join san_pham sp on sp.SP_ID = ct.SP_ID 
                                        where hd.HD_ID = {$mahd}; ";
                                    $rs = $conn->query($sql);
                                    $row = mysqli_fetch_assoc($rs);
                                ?>
                                <h6>Tổng Tiền:</h6><?php echo number_format($row["tongtien"], 0)." đ" ?>
                            </td>
                        </tr>                
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php 
        } else {
        ?>
            <div class="card">
                <div class="card-header pb-0 p-3"></div>
                <div class="card-body p-3 pb-0">
                    <div class="row">
                        <div class="col-12 pt-4 pb-5 text-center">
                            <h5>Thông tin chi tiết sẽ xuất hiện ở đây</h5>
                        </div>
                    </div>
                </div>
        <?php
        }
        
        ?> 
            </div> 
        </div>
    </div>
</div>

<?php 
	include "footer.php"
?>
<?php ob_end_flush(); ?>
