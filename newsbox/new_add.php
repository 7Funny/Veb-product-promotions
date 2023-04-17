<?php include("header.php");?>

<pre>
<form class="form" action="add.php?id=<?='$id'?>" method="POST">
    <h2> Добавление новости </h2>
    <div> Заголовок 
        <textarea class="place" type="text" name="title" placeholder="введите название"></textarea>
    </div>
    <div> Дата публикации/создания
        <input class="place" type="date" name="d">
    </div>
    <div> Анонс 
        <textarea class="place" type="text" name="preview" placeholder="введите название"></textarea>
    </div>
    <div> Картинка (по умолчанию ввeдите: "new.jpg") 
        <input class="place" type="text" name="picture" placeholder="введите название картинки">
    </div>
    <div> Полный текст 
        <textarea class="full place" type="text" name="full_text" placeholder="введите текст"></textarea>
    </div>
    <button class="button" type="submit"> Добавить </button>
</form>
</pre>
<?php include("footer.php"); ?>