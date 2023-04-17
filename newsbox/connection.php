<?php 
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    session_start();
    $connection = mysqli_connect("localhost", "root","", "mysite");
    if ($connection == false)
    {
        echo "Не удалось подключиться к базе данных! <br>"; 
        echo mysqli_connect_error();
        exit();
    }
?>