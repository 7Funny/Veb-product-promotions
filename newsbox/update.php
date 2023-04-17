<?php include("header.php");

$check_new = mysqli_query($connection, "SELECT * FROM `news` WHERE id");
$new = $check_new -> fetch_assoc();
$id=(int)$_GET["id"];

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

if (empty($title) or empty($d) or empty($preview) or empty($full_text)) 
{
    echo "Заполните все поля";
    exit (1);
}
else 
{
    if($stmt=$connection->prepare("UPDATE `news` SET `title`=?, `d`=?, `preview`=?, `full text`=? WHERE news.id=?"))
    {
        /* связываем параметры с метками */
        $stmt->bind_param("sssss",$title, $d, $preview,$full_text, $id);
        $stmt->execute();
        ?><div class="sms"><p> <b>Успешно Изменено! <b><p></div><?php
    } else 
    {
        ?><div class="sms"><p> <b>Ошибка запроса<b> <p></div><?php
        exit (1);
    }  
}
header('Location: index.php');
<?php include("footer.php"); ?>





