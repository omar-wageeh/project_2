<?php
include('config.php');
if(isset($_GET['id'])){
    $ID = mysqli_real_escape_string($con, $_GET['id']); 
    
     
    $deleteQuery = "DELETE FROM product WHERE id = $ID";
    if(mysqli_query($con, $deleteQuery)){
        echo "<script>alert('تم حذف المنتج بنجاح')</script>";
    } else {
        echo "<script>alert('حدثت مشكلة أثناء حذف المنتج')</script>";
    }
    
     
    header('location: products.php');

}
?>
