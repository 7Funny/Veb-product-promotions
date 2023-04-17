<?php include("header.php");?>

<pre>
<form class="form" action="addpromo.php?id=<?='$id'?>" method="POST">
    <h2> Добавление акции </h2>
    <div> Тип продуктов 
        <textarea class="place" type="text" name="type" placeholder="введите название"></textarea>
    </div>
    <div> Описание
    <textarea class="place" type="text" name="description" placeholder="введите название"></textarea>
    </div>
    <div> Дата начала акции
        <input class="place" type="date" name="fromdata">
    </div>
    <div> Дата окончания акции 
        <input class="place" type="date" name="todata">
    </div>
    <button class="button" type="submit"> Добавить </button>
</form>
</pre>
<?php include("footer.php"); ?>