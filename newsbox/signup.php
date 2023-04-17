<?php include("header.php");

    $full_name = filter_var(trim($_POST['full_name']));
    $login = filter_var(trim($_POST['login']));
    $password = filter_var(trim($_POST['password']));
    $password_confirm =filter_var(trim($_POST['password_confirm']));

    if ($password === $password_confirm) {

    $password = md5($password."icdsicdscncn");
    mysqli_query($connection, "INSERT INTO `users` (`full_name`, `login`,`password`) VALUES ('$full_name', '$login','$password')");
    echo "Регистрация прошла успешно!";

    header('Location: register.php');
    }
    else 
    {
        echo "Пароли не совпадают";
        header('Location: register.php');
    }
?>
