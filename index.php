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
<?php
$severName = 'mysql:hoot = localhost;dbname=Products';
$userName = 'root';
$passWord = '123456@Abc';
$conn = new PDO($severName, $userName, $passWord);

    $id = $_POST['id'];
    $name = $_POST['name'];
    $address = $_POST['address'];

    $sql = 'INSERT INTO `products`(`id`, `name`, `address`) VALUES (?,?,?)';

    $statement = $conn->prepare($sql);
    $statement->bindParam(1, $id);
    $statement->bindParam(2, $name);
    $statement->bindParam(3, $address);
    $statement->execute();
    $sql1 = 'SELECT * FROM products';
    $products = $conn->query($sql1)->fetchAll();

?>
<form method="POST">
    id:
    <div><input type="text" name="id" required></div>
    name:
    <div><input type="text" name="name" required></div>
    address:
    <div><input type="text" name="address" required></div>

    <div><input type="submit" value="add"></div>
</form>

<table>
    <tr>
        <th>View Products</th>
    </tr>
    <?php
    if (count($products) > 0): ?>
        <?php foreach ($products as $product) : ?>
            <tr>
                <td><?php echo $product['id'] ?></td>
                <td><?php echo $product['name'] ?></td>
                <td><?php echo $product['address'] ?></td>
                <td><a href="edit.php?page=edit&id=<?php echo $product['id'];?>"><button>Edit</button></a></td>
                <td><a href="delete.php?page=delete&id=<?php echo $product['id']?>"><button>Delete</button></a></td>

            </tr>
        <?php endforeach ?>
    <?php endif; ?>
</table>


</body>
</html>