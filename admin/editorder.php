<?php
$id = base64_decode($_GET['id']);

if(isset($_GET['id'])){
    $status="1";
    $query = "UPDATE orders SET delivery_status = '".$status."' WHERE id = '".$id."'";
    if(mysqli_query($db_con,$query)){
        header("location:index.php?page=orders&edit=success");
    }else{
        header("location:index.php?page=orders&edit=error");
    }
}

?>