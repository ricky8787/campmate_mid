<?php
require_once("../db_connect.php");

// if (!isset($_POST["username"])) {
//     echo "請從正常管道進入";
//     exit;
// }

$id=$_POST["id"];
$username=$_POST["username"];
// $photo=$_POST["photo"];
// echo $photo;
// var_dump($_FILES);

if($_FILES["file"]["error"]==0){
    if(move_uploaded_file($_FILES["file"]["tmp_name"], "../upload/".$_FILES["file"]["name"])){
        echo "upload success";
    }else{
        echo "upload failed";
    }
}

$photo=$_FILES["file"]["tmp_name"];
$password=$_POST["password"];
$id_number=$_POST["id_number"];
$birth_date=$_POST["birth_date"];
$phone=$_POST["phone"];
$email=$_POST["email"];
exit;




$sql="UPDATE users SET username='$username', password='$password', id_number='$id_number', birth_date='$birth_date', phone='$phone', email='$email' WHERE id=$id";

// echo $sql;

if ($conn->query($sql) === TRUE) {
    echo "更新成功";
} else {
    echo "更新資料錯誤: " . $conn->error;
}
header("location: user-edit.php?id=$id");

$conn->close();
