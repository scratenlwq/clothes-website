<?php

    include_once "../config/dbconnect.php";
    
    $id=$_POST['record'];
    $query="DELETE FROM product_size_variation where variation_id='$id'";

    $data=mysqli_query($conn,$query);

    if($data){
        echo"Ürün Bedeni Silindi!";
    }
    else{
        echo"Bir Hata Oluştu!";
    }
    
?>