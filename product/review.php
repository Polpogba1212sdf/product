<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8" />
  <title>Создание продукта</title>
</head>
<body>
<form method="post" action="review.php?id=<?php echo $_GET['id'];?>">
  <label>Имя добавившего</label>
  <input type="text" name="nameAddedUser2">
  <br/>
  <br/>
  <label>Оценка</label>
  <select name="mark">
      <?php for ($i=1; $i<11; $i++) {?>
        <option><?php echo $i;?></option>
      <?php }?>
  </select>
  <br/>
  <br/>
  <label>Комментарий</label>
  <input type="text" name="comment">
  <br/>
  <br/>
  <input type="submit" value="Создать новый отзыв" />
</form>
<br/>
<form action="/">
  <input type="submit" value="На главную" />
</form>



<h1><?php
    $servername = "localhost";
    $database = "product";
    $username = "root";
    $password = "q111222333";
    $productId = $_GET['id'];
    $sql = "mysql:host=$servername;dbname=$database;";
    $dsn_Options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

    try {
        $my_Db_Connection = new PDO($sql, $username, $password, $dsn_Options);

    } catch (PDOException $error) {
        echo 'Connection error: ' . $error->getMessage();
    }

    $productNameData = $my_Db_Connection->prepare("SELECT product_name, img from product where id=:productId");
    $productNameData->bindParam(':productId', $productId);
    $productNameData->execute();
    $productName = $productNameData->fetchAll();

    echo $productName[0]['product_name']?></h1>
<img src="<?=$productName[0]['img']?>">



<h1><?php $avgMarkData = $my_Db_Connection->prepare("SELECT avg(mark) as avgMark from review where product_id=:productId");
    $avgMarkData->bindParam(':productId', $productId);
    $avgMarkData->execute();
    $avgMark = $avgMarkData->fetchAll();

    echo $avgMark[0]['avgMark']?></h1>
<table border="1">
  <caption>Таблица отзывов</caption>
  <tr>
    <th>Имя оставившего отзыв</th>
    <th>Оценка</th>
    <th>Комментарий</th>
    <th>Дата добавления</th>
  </tr>
    <?php
    $allReviews = $my_Db_Connection->prepare("SELECT * from review where product_id=:productId");
    $allReviews->bindParam(':productId', $productId);
    $allReviews->execute();
    $result = $allReviews->fetchAll();
    if (count($result)) {

        foreach($result as $row) {?>
          <tr>
            <td><?php echo($row['name_added_user']);?></td>
            <td><?php echo($row['mark']);?></td>
            <td><?php echo($row['comment']);?></td>
            <td><?php echo($row['created_at']);?></td>
          </tr>
            <?php
        }
    } else {
        echo "Нет отзывов";
    }
    ?>
</table>
</body>
</html>


<?php
$servername = "localhost";
$database = "product";
$username = "root";
$password = "q111222333";

$nameAddedUser = $_POST['nameAddedUser2'];
$mark = $_POST["mark"];
$comment = $_POST['comment'];
$createdAt = date("Y-m-d H:i:s");
$productId = $_GET['id'];


$sql = "mysql:host=$servername;dbname=$database;";
$dsn_Options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

try {
$my_Db_Connection = new PDO($sql, $username, $password, $dsn_Options);

} catch (PDOException $error) {
echo 'Connection error: ' . $error->getMessage();
}


$my_Insert_Statement = $my_Db_Connection->prepare("INSERT INTO review (name_added_user, mark, comment, created_at, product_id) VALUES (:nameAddedUser, :mark, :comment, :createdAt, :productId)");

$my_Insert_Statement->bindParam(':nameAddedUser', $nameAddedUser);
$my_Insert_Statement->bindParam(':mark', $mark);
$my_Insert_Statement->bindParam(':comment', $comment);
$my_Insert_Statement->bindParam(':createdAt', $createdAt);
$my_Insert_Statement->bindParam(':productId', $productId);



if ($my_Insert_Statement->execute()) {

} else {
echo "Unable to create record";
}

header("Location: http://product/review.php?id=$productId");
exit;
?>
