<?php include("header.php");
$id=(int)$_GET["id"];

$result = mysqli_query($connection, "SELECT * FROM prize WHERE id = '$id'");
if ($result == false)
{
    echo "Сообщение ошибки:\n";
    echo mysqli_connect_error();
}
$row = mysqli_fetch_assoc($result)
?>
<pre>
    <form class="form" action="updateprize.php?id=<?= $id ?>" method="POST">
        <h2> Изменение приза </h2>
        <div> Заголовок: <?= $row['name'] ?><br>
            <textarea class="place" type="text" name="name" placeholder="введите название"></textarea>
        </div>
        <div> Описание
            <textarea class="place" type="text" name="description" placeholder="введите название"></textarea>
        </div>
        <div> Цена
            <textarea class="full place" type="text" name="price" placeholder="введите текст"></textarea>
        </div>
        <button class="button" type="submit"> Изменить </button>
    </form>

    <form class="form" enctype="multipart/form-data" action="updatePhotoprize.php?id=<?= $id ?>" method="POST">
        <div> Фотография: 
        <img src="<?= $row['picture'] ?>" alt="<?= $row['preview'] ?>" class="photoEdit"> <br>
            <input class="place" name="picture" type="file" />
            <input class="button" type="submit" value="Изменить фотографию" />
        </div>
    </form>
</pre>
 <?php  include("footer.php"); ?>

