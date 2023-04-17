<?php include("header.php"); 

$id=(int)$_GET["id"];

$result = mysqli_query($connection, "SELECT * FROM prize WHERE id = $id");
if ($result == false)
{
    echo "Сообщение ошибки:\n";
    echo mysqli_connect_error();
}

$row = mysqli_fetch_assoc($result)
?>

    <!-- ##### Post Details Area Start ##### -->
    <section class="post-news-area section-padding-100-0 mb-70">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Post Details Content Area -->
                <div class="col-12 col-lg-8">
                    <div class="post-details-content mb-100">
                        <span><h2><?= $row['name'] ?></h2></span>
                        <img class="mb-30" src="<?= $row['picture'] ?>" alt="<?= $row['description'] ?>">
                        <p>Price: <?= $row['price'] ?></p>
                        <p><?= $row['description'] ?></p>
                        <?php if (!empty($_SESSION['user']['login'])){ ?>
                            <a href="product_buy.php?id=<?=$row['id'] ?>">ORDER/</a>
                        <?php } ?> 
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Post Details Area End ##### -->

    <?php include("footer.php"); ?>