<?php include("header.php");?>

    <div class="req-ath">
        <div>
            <pre>
                <!-- Форма регистрации промо-кода  -->
                <form class ="form-req" action="signinpromocode.php" method="post">
                    <label class="name_form"><b>Форма регистрации промо-кода</b></label>
                    <label>Промо-код</label>
                    <input class="place" type="text" name="promocode" placeholder="Введите промо-код">
                    <button  class="button" type="submit"> Регистрировать промо-код </button>
                </form>
            </pre>
        </div>
    </div>
<?php include("footer.php"); ?>
    