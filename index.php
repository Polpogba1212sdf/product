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
$sort_list = array(
    'productName_asc'  => '`product_name`',
    'productName_desc' => '`product_name` DESC',
    'createdAt_asc'   => '`created_at`',
    'createdAt_desc'  => '`created_at` DESC',
    'nameAddedUser_asc'   => '`name_added_user`',
    'nameAddedUser_desc'  => '`name_added_user` DESC'
);


$sort = @$_GET['sort'];
if (array_key_exists($sort, $sort_list)) {
    $sort_sql = $sort_list[$sort];
} else {
    $sort_sql = reset($sort_list);
}
$data = $my_Db_Connection->prepare("SELECT * FROM product ORDER BY {$sort_sql}");


$data->execute();
$result = $data->fetchAll();


function sort_link_bar($title, $a, $b) {
    $sort = @$_GET['sort'];

    if ($sort == $a) {
        return '<a class="active" href="?sort=' . $b . '">' . $title . ' <i>↑</i></a>';
    } elseif ($sort == $b) {
        return '<a class="active" href="?sort=' . $a . '">' . $title . ' <i>↓</i></a>';
    } else {
        return '<a href="?sort=' . $a . '">' . $title . '</a>';
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8" />
    <title>Товары</title>
</head>
<body>
<div class="sort-bar">
  <div class="sort-bar-title">Сортировать по:</div>
  <div class="sort-bar-list">
      <?php echo sort_link_bar('Название товара', 'productName_asc', 'productName_desc'); ?>
      <?php echo sort_link_bar('Дата добавления', 'createdAt_asc', 'createdAt_desc'); ?>
      <?php echo sort_link_bar('Имя добавившего товар', 'nameAddedUser_asc', 'nameAddedUser_desc'); ?>
  </div>
</div>
<table border="1">
    <caption>Таблица товаров</caption>
    <tr>
        <th>Название товара</th>
        <th>Маленькое изображение</th>
        <th>Дата добавления</th>
        <th>Имя добавившего товар</th>
        <th>Количество отзывов</th>
        <th>Добавить отзыв</th>
    </tr>
    <?php
    if (count($result)) {

        foreach($result as $row) {?>
            <tr>
              <td><?php echo($row['product_name']);?></td>
              <td><img width="189" src="<?php echo($row['img']);?>"</td>
              <td><?php echo($row['created_at']);?></td>
              <td><?php echo($row['name_added_user']);?></td>
              <td><?php
                  $countReviewsData = $my_Db_Connection->prepare("SELECT count(*) as countReviews FROM review where product_id=:productId");
                  $countReviewsData->bindParam(':productId', $row['id']);
                  $countReviewsData->execute();
                  $countReviews = $countReviewsData->fetchAll();
                  echo $countReviews[0]['countReviews'];
                  ?></td>
              <td><a href="review.php?id=<?php echo $row['id']?>">Добавить отзыв</a></td>
            </tr>
            <?php
        }
    } else {
        echo "Нет записей для вывода";
    }
    ?>
</table>
<br/>
<a href="createProduct.php">Создать новый товар</a>
</body>
</html>

