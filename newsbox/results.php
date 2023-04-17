<?php include("header.php"); 
$users = mysqli_query($connection, "SELECT points, full_name FROM `users`");
if ($users == false)
{
    echo "Сообщение ошибки:\n";
    echo mysqli_connect_error();
}
?>
<table class="results"">
    <tr>
        <td width="30%">Полное имя пользователя</td>
        <td width="20%">Баллы</td>
    </tr>
</table>
  <?php
$price = 0;
while ($us_points = $users -> fetch_assoc()) {
  $price += $us_points['points'];
  ?>
<table class="results"">
    <tr>
        <td width="30%"><?=$us_points['full_name']?></td>
        <td width="20%"><?=$us_points['points']?></td>
    </tr>
</table>
  <?php
}
?>
<div class="results">
<hr>Общее количество баллов у пользователей: <?=$price?><hr>
</div>
<?php


$prize = mysqli_query($connection, "SELECT price, name, id_order_user FROM `prize`");
if ($prize == false)
{
    echo "Сообщение ошибки:\n";
    echo mysqli_connect_error();
}

?>
<table class="results"">
    <tr>
        <td width="30%">Название приза</td>
        <td width="10%">Стоимость</td>
        <td width="10%">Заказан</td>
    </tr>
</table>
<?php
$price2 = 0;
$price_yes = 0;
$price_no = 0;
while ($pr_points = $prize -> fetch_assoc()) {
  if ($pr_points['id_order_user']!=0){
    $price_yes += $pr_points['price'];
    ?>
<table class="results"">
    <tr>
        <td width="30%"><?=$pr_points['name']?></td>
        <td width="10%"><?=$pr_points['price']?></td>
        <td width="10%">ДА</td>
    </tr>
</table>
  <?php
  }else{
    $price_no += $pr_points['price'];
    ?>
    <table class="results"">
    <tr>
        <td width="30%"><?=$pr_points['name']?></td>
        <td width="10%"><?=$pr_points['price']?></td>
        <td width="10%">нет</td>
    </tr>
</table>
  <?php
  }
}
$price2 += $price_yes + $price_no;
?>
<div class="results">
<hr>Общее количество баллов за призы: <?=$price2?>
<br>Заказанные призы: <?=$price_yes?>
<br>Незаказанные призы: <?=$price_no?><hr>
</div>
<?php
 include("footer.php"); ?>