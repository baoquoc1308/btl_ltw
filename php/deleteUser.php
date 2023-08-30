<?php

if(isset($_POST['id'])){
    $id = $_POST['id'];
    $connect = new mysqli('localhost','root','','register');
    $sql = "delete from register where ma_sv =" .$id;
    mysqli_query($connect,$sql);
    $connect->close();
}