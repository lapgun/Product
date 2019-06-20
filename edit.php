<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="POST">
    id:
    <div><input type="text" name="id"></div>
    name:
    <div><input type="text" name="name"></div>
    address:
    <div><input type="text" name="address"></div>

    <a>
        <button>Edit</button>
    </a>
</form>


<?php
$severName = 'mysql:hoot = localhost;dbname=Products';
$userName = 'root';
$passWord = '123456@Abc';
$conn = new PDO($severName, $userName, $passWord);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $sql = "UPDATE `products` SET `name`='$name',`address`='$address' WHERE id = $id";
    $statement = $conn->prepare($sql);
x
    $statement->execute();
//    $sql1 = 'SELECT * FROM products';
//    $products = $conn->query($sql1)->fetchAll();
    header("location:index.php");
}
//header("location: mysql.php");
?>


</body>
</html>