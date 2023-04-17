<?php include("header.php");

$check_new = mysqli_query($connection, "SELECT * FROM `prize` WHERE id");
$new = $check_new -> fetch_assoc();
$id=(int)$_GET["id"];

if (isset($_POST['name'])) 
{
    $name = $_POST['name'];
    if ($name == '') 
    {
        unset($name);
    }
}
if (isset($_POST['description'])) 
{
    $description = $_POST['description'];
    if ($description == '') 
    {
        unset($description);
    }
}
if (isset($_POST['price']))
{
    $price=$_POST['price'];
    if ($price =='') 
    {
        unset($price);
    }
}

if (empty($name) or empty($description) or empty($price)) 
{
    echo "Заполните все поля";
    exit (1);
}
else 
{
    if($stmt=$connection->prepare("UPDATE `prize` SET `name`=?, `description`=?, `price`=? WHERE prize.id=?"))
    {
        /* связываем параметры с метками */
        $stmt->bind_param("ssss",$name, $description, $price, $id);
        $stmt->execute();
        ?><div class="sms"><p> <b>Успешно Изменено! <b><p></div><?php
    } else 
    {
        ?><div class="sms"><p> <b>Ошибка запроса<b> <p></div><?php
        exit (1);
    }  
}
header('Location: index.php');
 include("footer.php"); ?>





