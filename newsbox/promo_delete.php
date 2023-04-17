<?php include("header.php");

$id =(int)$_GET['id'];
echo $id;

$link= mysqli_query($connection,"DELETE from `promotion` WHERE `id`='$id'");

if ($link == false)
{
    echo "Сообщение ошибки:\n";
    echo mysqli_connect_error();
}
header("Location: index.php");
?>