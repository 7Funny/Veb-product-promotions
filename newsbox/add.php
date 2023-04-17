<?php include("header.php"); 

$check_new = mysqli_query($connection, "SELECT * FROM `news` WHERE id");
$new = $check_new -> fetch_assoc();
$id=(int)$new['id'];

if (isset($_POST['title'])) 
{
    $title = $_POST['title'];
    if ($title == '') 
    {
        unset($title);
    }
}
if (isset($_POST['d'])) 
{
    $d=$_POST['d'];
    if ($d =='') 
    {
        unset($d);
    }
}
if (isset($_POST['preview'])) 
{
    $preview = $_POST['preview'];
    if ($preview == '') 
    {
        unset($preview);
    }
}
if (isset($_POST['full_text']))
{
    $full_text=$_POST['full_text'];
    if ($full_text =='') 
    {
        unset($full_text);
    }
}
if (isset($_POST['picture'])) 
{
    $picture='..\images/'.$_POST['picture'];
    if ($picture =='') 
    {
        unset($picture);
    }
}
if (empty($title) or empty($d) or empty($picture) or empty($preview) or empty($full_text)) 
{
    echo "Заполните все поля";
    exit (1);
}
else 
{

    if($stmt=$connection->prepare("INSERT into news (title,d,preview,`full text`,picture) VALUES (?,?,?,?,?)"))
    {
        /* связываем параметры с метками */
        $stmt->bind_param("sssss",$title, $d, $preview,$full_text,$picture);
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