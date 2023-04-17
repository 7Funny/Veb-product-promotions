<?php include("header.php");

$login = filter_var(trim($_POST['login']));
$password = filter_var(trim($_POST['password']));
$password = md5($password."icdsicdscncn");

$check_user = mysqli_query($connection, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
$user = $check_user -> fetch_assoc();

if (count($user) != 0) 
{
    echo "Добро пожаловать";

    $_SESSION['user'] = [
        "admin" => $user['admin'],
        "full_name" => $user['full_name'],
        "login" => $user['login'],
        "password" => $user['password'],
        "avatar" => $user['avatar'],
        "id" => $user['id'],
        ];
    header('Location: index.php');
} else {
    echo "Не верный логин или пароль";
    header('Location: register.php');
}
header('Location: index.php');
