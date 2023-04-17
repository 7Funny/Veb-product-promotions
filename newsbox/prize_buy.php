<?php include("header.php");

$id=(int)$_GET["id"];
$id_user = $_SESSION['user']['id'];

$check_user = mysqli_query($connection, "SELECT points FROM `users` WHERE users.id=$id_user");
if ($check_user == false)
{
    echo "Сообщение ошибки:\n";
    echo mysqli_connect_error();
}
$user = mysqli_fetch_assoc($check_user);

$check_prize = mysqli_query($connection, "SELECT price FROM `prize` WHERE prize.id=$id");
if ($check_prize == false)
{
    echo "Сообщение ошибки:\n";
    echo mysqli_connect_error();
}
$prize = mysqli_fetch_assoc($check_prize);

if ($user['points']<$prize['price']){
    ?><p class="post-title">У вас недостаточно денег!</p><?php
    exit(1);
}else
{
    if($stmt=$connection->prepare("UPDATE `prize` SET `id_order_user`=? WHERE prize.id=?"))
    {
        /* связываем параметры с метками */
        $stmt->bind_param("ss",$id_user,$id);
        $stmt->execute();
    } else 
    {
        ?><div class="sms"><p> <b>Ошибка запроса добавления id_user<b> <p></div><?php
        exit (1);
    }

    if($stm=$connection->prepare("UPDATE `users` SET `points`=? WHERE users.id=?"))
    {
        $points=$user['points'] - $prize['price'];
        /* связываем параметры с метками */
        $stm->bind_param("ss",$points, $id_user);
        $stm->execute();
    } else 
    {
        ?><div class="sms"><p> <b>Ошибка запроса оплаты<b> <p></div><?php
        exit (1);
    }
}

header('Location: prize_order.php');
 include("footer.php"); ?>





