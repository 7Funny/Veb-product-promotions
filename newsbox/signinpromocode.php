<?php include("header.php");

$promocode = ($_POST['promocode']);
$id_user = $_SESSION['user']['id'];

$check_promo = mysqli_query($connection, "SELECT * FROM `promocode` WHERE `promocode` = '$promocode'");
if ($check_promo == false)
{
    echo "Сообщение ошибки:\n";
    echo mysqli_connect_error();
}
$code = $check_promo -> fetch_assoc();
$id_code = $code['id'];
$check_user = mysqli_query($connection, "SELECT * FROM `users` WHERE users.id='$id_user'");
if ($check_user == false)
{
    echo "Сообщение ошибки:\n";
    echo mysqli_connect_error();
}
$us_points = $check_user -> fetch_assoc();

if (count($code) != 0 && $id_user != 0) 
{
    if($stmt=$connection->prepare("UPDATE `promocode` SET `id_user`=? WHERE promocode.id=$id_code"))
    {
        $stmt->bind_param("s",$id_user);
        $stmt->execute();
        ?><div class="sms"><p> <b>Успешно установки id! <b><p></div><?php
    } else 
    {
        ?><div class="sms"><p> <b>Ошибка установки id<b> <p></div><?php
        exit (1);
    }
    if($stmt=$connection->prepare("UPDATE `users` SET `points`=? WHERE users.id=$id_user"))
    {
        $points = $us_points['points'] + $code['points'];
        $stmt->bind_param("s",$points);
        $stmt->execute();
        ?><div class="sms"><p> <b>Успешно получены баллы! <b><p></div><?php
    } else 
    {
        ?><div class="sms"><p> <b>Ошибка запроса получения баллов<b> <p></div><?php
        exit (1);
    } 

    echo "Промокод зарегистрирован";
    header('Location: profile.php');
} else {
    echo "Промокод занят/неправильный промокод";
    header('Location: promotion_register.php');
}
