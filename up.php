<?php
include('config.php');
if(isset($_POST['updata'])){
    $ID = $_POST['id'];
    $NAME = mysqli_real_escape_string($con, $_POST['name']); 
    $PRICE = mysqli_real_escape_string($con, $_POST['price']); 

    
    if(isset($_FILES['image'])){
        $IMAGE = $_FILES['image'];
        $image_location = $_FILES['image']['tmp_name'];
        $image_name = $_FILES['image']['name'];
        $image_up = "images/" . $image_name;  

        
        $updata = "UPDATE product SET name = '$NAME' , price = '$PRICE' , image = '$image_up' WHERE id = $ID";
        if(mysqli_query($con, $updata)){
            
            if(move_uploaded_file($image_location, $image_up)){
                echo "<script>alert('تم تحديث المنتج بنجاح')</script>";
            } else {
                echo "<script>alert('حدث مشكلة في رفع الصورة')</script>";
            }
        } else {
            echo "<script>alert('حدثت مشكلة أثناء إضافة المنتج إلى قاعدة البيانات')</script>";
        }
    } else {
        echo "<script>alert('من فضلك اختر صورة للمنتج')</script>";
    }
    header('location: index.php');
}
?>
