<?php include("header.php");?>

<pre>
<form class="form" action="addprize.php?id=<?='$id'?>" method="POST">
    <h2> Добавление приза </h2>
    <div> Заголовок 
        <textarea class="place" type="text" name="name" placeholder="введите название"></textarea>
    </div>
    <div> Описание 
        <textarea class="place" type="text" name="description" placeholder="введите название"></textarea>
    </div>
    <div> Картинка (по умолчанию ввeдите: "new.jpg")
        <input class="place" type="text" name="picture" placeholder="введите название картинки">
    </div>
    <div> Стоимость 
        <textarea class="place" type="text" name="price" placeholder="введите текст"></textarea>
    </div>
    <button class="button" type="submit"> Добавить </button>
</form>
</pre>
<?php include("footer.php"); ?>