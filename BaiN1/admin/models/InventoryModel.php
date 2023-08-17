<?php
session_start();
include('../config/config.php');
require ('../../carbon/autoload.php');

use Carbon\Carbon;
use Carbon\CarbonInterval;

if (isset($_GET['data'])) {
    $data = $_GET['data'];
    $inventory_ids = json_decode($data);
}

if (isset($_GET['delete']) && $_GET['delete'] == 1) {
    foreach ($inventory_ids as $id) {
        $sql_delete = "DELETE FROM inventory WHERE inventory_id = $id";
        mysqli_query($mysqli, $sql_delete);
    }
    header('Location:../../BaiN1/admin/index.php?action=inventory&query=inventory_list&message=success');
}
else {
    header('Location:../../BaiN1/admin/index.php?action=inventory&query=inventory_list&message=success');
}


// Xoa san pham khoi phieu nhap kho
if(isset($_SESSION['inventory']) && isset($_GET['delete'])) {
    $product_id = $_GET['delete'];
    foreach ($_SESSION['inventory'] as $inventory_item) {
        if ($inventory_item['product_id'] != $product_id) {
            $product[]= array('product_id'=>$inventory_item['product_id'], 'product_name'=>$inventory_item['product_name'],'product_quantity'=>$inventory_item['product_quantity'],'product_price_import'=>$inventory_item['product_price_import']);
        }
        $_SESSION['inventory'] = $product;
        header('Location:../../BaiN1/admin/index.php?action=inventory&query=inventory_list&message=success');
    }
}
// xoa tat ca
if(isset($_GET['deleteall'])&&$_GET['deleteall']==1){
    unset($_SESSION['inventory']);
    header('Location:../../BaiN1/admin/index.php?action=inventory&query=inventory_list&message=success');
}
// them sanpham vao phiếu nhập
if(isset($_POST['addtoinventory'])){
    // session_destroy();
    $product_id=$_POST['product_id'];
    $product_quantity=$_POST['product_quantity'];
    $product_price_import=$_POST['product_price_import'];
    $sql ="SELECT * FROM product WHERE product_id='".$product_id."' LIMIT 1";
    $query = mysqli_query($mysqli,$sql);
    $row = mysqli_fetch_array($query);
    if($row){
        $new_product=array(array('product_id'=>$product_id, 'product_name'=>$row['product_name'],'product_quantity'=>$product_quantity,'product_price_import'=>$product_price_import));
        
        //kiem tra session phiếu nhập ton tai
        if(isset($_SESSION['inventory'])){
            $found = false;
            foreach($_SESSION['inventory'] as $inventory_item){
                //neu du lieu trung
                if($inventory_item['product_id']==$product_id){
                    $product[]= array('product_id'=>$inventory_item['product_id'], 'product_name'=>$inventory_item['product_name'],'product_quantity'=>$inventory_item['product_quantity']+$_POST['product_quantity'],'product_price_import'=>$inventory_item['product_price_import']);
                    $found = true;
                }else{
                    //neu du lieu khong trung
                    $product[]= array('product_id'=>$inventory_item['product_id'], 'product_name'=>$inventory_item['product_name'],'product_quantity'=>$inventory_item['product_quantity'],'product_price_import'=>$inventory_item['product_price_import']);
                }
            }
            if($found == false){
                //lien ket du lieu new_product voi product
                $_SESSION['inventory']=array_merge($product,$new_product);
            }else{
                $_SESSION['inventory']=$product;
            }
        }else{
            $_SESSION['inventory'] = $new_product;
        }
    }
    header('Location: ' . $_SERVER['HTTP_REFERER'].'&message=success');
}

// them phieu nhap kho
