<?php include("header.php"); 
$result = mysqli_query($connection, "SELECT * FROM contacts ORDER BY id");
if ($result == false)
{
    echo "Сообщение ошибки:\n";
    echo mysqli_connect_error();
}
?>
    <!-- ##### Contact Area Start ##### -->
    <section class="contact-area">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-12 col-lg-8">
                    <div class="contact-content mb-100">

                        <!-- Single Contact Info -->
                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                            <div class="single-contact-info ">
                                <img src="<?= $row['picture'] ?>" alt="<?= $row['nickname'] ?>" class="photo">
                                <h3><?= $row['nickname'] ?></h3>
                                <!-- Contact Social Info -->
                                <div class="contact-social-info">  
                                    <a href="<?= $row['Facebook'] ?>" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    <a href="<?= $row['Twitter'] ?>" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                </div>
                                <p><b>Дата рождения: </b><?= $row['birthday'] ?><br>
                                <b>Место рождения: </b> <?= $row['birthplace'] ?></p>
                                <p><?= $row['info'] ?></p>    
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Contact Area End ##### -->

    <?php include("footer.php"); ?>