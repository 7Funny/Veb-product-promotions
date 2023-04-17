<?php include("header.php");?>

    <div class="req-ath">
            <!-- Форма регистрации -->
        <div>
            <pre>
                <form class ="form-req" action="signup.php" method="post">
                    <label class="name_form"><b>Форма регистрации</b></label>
                    <label>ФИО</label>
                    <input class="place" type="text" name="full_name" placeholder="Введите свое полное имя">
                    <label>Логин</label>
                    <input class="place" type="text" name="login" placeholder="Введите свой логин">
                    <label>Пароль</label>
                    <input class="place" type="password" name="password" placeholder="Введите пароль">
                    <label>Подтверждение пароля</label>
                    <input class="place" type="password" name="password_confirm" placeholder="Подтвердите пароль">
                    <button  class="button" type="submit"> Зарегистрироваться </button>
                </form>
            </pre>
        </div>
        <div>
            <pre>
                <!-- Форма авторизации -->
                <form class ="form-req" action="signin.php" method="post">
                    <label class="name_form"><b>Форма авторизации</b></label>
                    <label>Логин</label>
                    <input class="place" type="text" name="login" placeholder="Введите свой логин">
                    <label>Пароль</label>
                    <input class="place" type="password" name="password" placeholder="Введите пароль">
                    <button  class="button type="submit"> Войти </button>
                </form>
            </pre>
        </div>
    </div>
<?php include("footer.php"); ?>
    