<?php include("header.php"); 

$check_new = mysqli_query($connection, "SELECT * FROM `prize`");
if ($check_new == false)
{
    echo "Сообщение ошибки:\n";
    echo mysqli_connect_error();
}

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
    $description=$_POST['description'];
    if ($description =='') 
    {
        unset($description);
    }
}
if (isset($_POST['picture'])) 
{
    $picture='..\images/prize/'.$_POST['picture'];
    if ($picture =='') 
    {
        unset($picture);
    }
}
if (isset($_POST['price'])) 
{
    $price = $_POST['price'];
    if ($price == '') 
    {
        unset($price);
    }
}

if (empty($name) or empty($description) or empty($picture) or empty($price)) 
{
    echo "Заполните все поля";
    exit (1);
}
else 
{

    if($stmt=$connection->prepare("INSERT into prize (name,description,picture,price) VALUES (?,?,?,?)"))
    {
        /* связываем параметры с метками */
        $stmt->bind_param("ssss",$name, $description, $picture,$price);
        /* запускаем запрос */
        $stmt->execute();
        ?>
        <div class="sms">
            <p> <b>Успешно Добавлено!<b> <p>
        </div>
        <?php
        exit(0);
    }
    else 
    {
        ?>
        <div class="sms">
            <p> <b>Ошибка запроса<b> <p>
        </div>
        <?php
    }
}

header('Location: index.php');
include("footer.php");