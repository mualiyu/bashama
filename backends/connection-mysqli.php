<?php
include "config.php";

$conn = mysqli_connect($host, $user, $pwd, $database) or die();

if(!$conn){
    echo "not";
    //header("location:../404.php");
    
}

?>