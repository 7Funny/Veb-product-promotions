<?php include("header.php");

$id_user = $_SESSION['user']['id'];
$result = mysqli_query($connection, "SELECT promocode, points FROM `promocode` WHERE id_user=$id_user");
if ($result == false)
{
    echo "Сообщение ошибки:\n";
    echo mysqli_connect_error();
}
$check_user = mysqli_query($connection, "SELECT points FROM `users` WHERE id=$id_user");
if ($check_user == false)
{
    echo "Сообщение ошибки:\n";
    echo mysqli_connect_error();
}
$points = mysqli_fetch_assoc($check_user)
?>
<div class="aside_main">
    <div class="aside">
        <img src="<?=$_SESSION['user']['avatar']?>" alt="<?= $_SESSION['user']['full_name'] ?>" class="photo">
        <p><?= $_SESSION['user']['full_name'] ?><p>
    </div>
    <div class="main">
        <ul>
        <li>Логин: <?= $_SESSION['user']['login'] ?></li>
        <li>Пароль: <?= $_SESSION['user']['password'] ?></li>
        <li>Баллы: <?= $points['points']?></li>
        <li>Промокод - баллы </li>
        </ul>
        <?php if(!empty($_SESSION['user']['login']) and empty($_SESSION['user']['admin'])) {
            while ($row = mysqli_fetch_assoc($result)){ ?>
                <li><?=$row['promocode']?> - <?=$row['points']?></li>
            <?php }
        } ?>
        
    </div>
</div>

<?php include("footer.php"); ?>
