<?php include("header.php");

$id=(int)$_GET["id"];
$id_user = $_SESSION['user']['id'];

$check_user = mysqli_query($connection, "SELECT points, money FROM `users` WHERE users.id=$id_user");
if ($check_user == false)
{
    echo "Сообщение ошибки:\n";
    echo mysqli_connect_error();
}
$user = mysqli_fetch_assoc($check_user);

$products = mysqli_query($connection, "SELECT price, promo_points, id_user FROM `products` WHERE products.id=$id");
if ($products == false)
{
    echo "Сообщение ошибки:\n";
    echo mysqli_connect_error();
}
$product = mysqli_fetch_assoc($products);

if ($user['money']<$product['price']){
    ?><p class="post-title">У вас недостаточно денег!</p><?php
    exit(1);
}else
{
    if($stmt=$connection->prepare("UPDATE `products` SET id_user=? WHERE products.id=$id"))
    {
        /* связываем параметры с метками */
        $stmt->bind_param("s",$id_user);
        $stmt->execute();
    } else 
    {
        ?><div class="sms"><p> <b>Ошибка запроса добавления id_user<b> <p></div><?php
        exit (1);
    }

    if($stm=$connection->prepare("UPDATE `users` SET points=?, money=? WHERE users.id=$id_user"))
    {
        $points=$user['points'] + $product['promo_points'];
        $money=$user['money'] - $product['price'];
        /* связываем параметры с метками */
        $stm->bind_param("ss",$points, $money);
        $stm->execute();
    } else 
    {
        ?><div class="sms"><p> <b>Ошибка запроса оплаты<b> <p></div><?php
        exit (1);
    }
}

header('Location: prize_order.php');
 include("footer.php"); ?>





