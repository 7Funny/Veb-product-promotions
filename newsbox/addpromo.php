<?php include("header.php"); 

$check_new = mysqli_query($connection, "SELECT * FROM `promotion`");
$new = $check_new -> fetch_assoc();

if (isset($_POST['type'])) 
{
    $type = $_POST['type'];
    if ($type == '') 
    {
        unset($type);
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
if (isset($_POST['fromdata']))
{
    $fromdata=$_POST['fromdata'];
    if ($fromdata =='') 
    {
        unset($fromdata);
    }
}
if (isset($_POST['todata'])) 
{
    $todata=$_POST['todata'];
    if ($todata =='') 
    {
        unset($todata);
    }
}
if (empty($type) or empty($description) or empty($fromdata) or empty($todata)) 
{
    echo "Заполните все поля";
    exit (1);
}
else 
{

    if($stmt=$connection->prepare("INSERT into `promotion` (type,description,fromdata,todata) VALUES (?,?,?,?)"))
    {
        /* связываем параметры с метками */
        $stmt->bind_param("ssss", $type,$description, $fromdata,$todata);
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
        exit(0);
    }
}

header('Location: index.php');
include("footer.php");