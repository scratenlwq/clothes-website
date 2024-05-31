<?php

    include_once "../config/dbconnect.php";
    
    $c_id=$_POST['record'];
    $query="DELETE FROM category where category_id='$c_id'";

    $data=mysqli_query($conn,$query);

    if($data){
        echo"Kategori silindi!";
    }
    else{
        echo"Bir Hata Oluştu!";
    }
    
?>