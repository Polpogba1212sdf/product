<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8" />
  <title>Создание продукта</title>
</head>
<body>
<form method="post">
  <label>Название товара</label>
  <input type="text" name="productName">
  <br />
  <br />
  <label>Изображение товара</label>
  <input type="url" name="img">
  <br />
  <br />
  <label>Средняя цена</label>
  <input type="text" name="middlePrice">
  <br />
  <br />
  <label>Имя добавившего товар</label>
  <input type="text" name="nameAddedUser">
  <br />
  <br />
  <input type="submit" value="Создать новый товар" />
</form>
<br />
<form action="/">
  <input type="submit" value="На главную" />
</form>
</body>
</html>

<?php
$servername = "localhost";
$database = "product";
$username = "root";
$password = "q111222333";

$productName = $_POST["productName"];
$img = $_POST['img'];
$middlePrice = $_POST['middlePrice'];
$createdAt = date("Y-m-d H:i:s");;
$nameAddedUser = $_POST['nameAddedUser'];

$sql = "mysql:host=$servername;dbname=$database;";
$dsn_Options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

try {
    $my_Db_Connection = new PDO($sql, $username, $password, $dsn_Options);

} catch (PDOException $error) {
    echo 'Connection error: ' . $error->getMessage();
}

$my_Insert_Statement = $my_Db_Connection->prepare(
    "INSERT INTO product (product_name, img, middle_price, created_at, name_added_user) VALUES (:productName, :img, :middlePrice, :createdAt, :nameAddedUser)"
);

$my_Insert_Statement->bindParam(':productName', $productName);
$my_Insert_Statement->bindParam(':img', $img);
$my_Insert_Statement->bindParam(':middlePrice', $middlePrice);
$my_Insert_Statement->bindParam(':createdAt', $createdAt);
$my_Insert_Statement->bindParam(':nameAddedUser', $nameAddedUser);

if ($my_Insert_Statement->execute()) {
    echo "New record created successfully";
} else {
    echo "Unable to create record";
}

header("Location: http://product/createProduct.php");
exit;
