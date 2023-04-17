<?php include("header.php");
$id=(int)$_GET["id"];

$result = mysqli_query($connection, "SELECT * FROM news WHERE id = '$id'");
if ($result == false)
{
    echo "Сообщение ошибки:\n";
    echo mysqli_connect_error();
}
$row = mysqli_fetch_assoc($result)
?>
<pre>
    <form class="form" action="update.php?id=<?= $id ?>" method="POST">
        <h2> Изменение новости </h2>
        <div> Заголовок: <?= $row['title'] ?><br>
            <textarea class="place" type="text" name="title" placeholder="введите название"></textarea>
        </div>
        <div> Дата публикации/создания: <?= $row['d'] ?><br>
            <input class="place" type="date" name="d">
        </div>
        <div> Анонс
            <textarea class="place" type="text" name="preview" placeholder="введите название"></textarea>
        </div>
        <div> Полный текст 
            <textarea class="full place" type="text" name="full_text" placeholder="введите текст"></textarea>
        </div>
        <button class="button" type="submit"> Изменить </button>
    </form>

    <form class="form" enctype="multipart/form-data" action="updatePhoto.php?id=<?= $id ?>" method="POST">
        <div> Фотография: 
        <img src="<?= $row['picture'] ?>" alt="<?= $row['preview'] ?>" class="photoEdit"> <br>
            <input class="place" name="picture" type="file" />
            <input class="button" type="submit" value="Изменить фотографию" />
        </div>
    </form>
</pre>
 <?php  include("footer.php"); ?>

