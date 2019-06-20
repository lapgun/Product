<?php
$severName = 'mysql:hoot = localhost;dbname=Products';
$userName = 'root';
$passWord = '123456@Abc';
$conn = new PDO($severName, $userName, $passWord);
$id = $_GET['id'];
$sql = "DELETE  FROM `products` WHERE id = $id";
$statement = $conn->prepare($sql);
$statement->execute();

header("location:index.php");


?>