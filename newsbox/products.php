<?php include("header.php"); 
$result = mysqli_query($connection, "SELECT * FROM prize WHERE prize.id_order_user=0");
if ($result == false)
{
    echo "Сообщение ошибки:\n";
    echo mysqli_connect_error();
}
?>
    <!-- ##### Top News Area Start ##### -->
    <div class="top-news-area section-padding-100">
        <div class="container">
            <div class="row">
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <!-- Single News Area -->
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="single-blog-post style-2 mb-5">
                            <!-- Blog Thumbnail -->
                            <div class="blog-thumbnail">
                                <a href="product.php?id=<?=$row['id'] ?>"><img src="<?= $row['picture'] ?>" alt="<?= $row['description'] ?>"></a>
                            </div>

                            <!-- Blog Content -->
                            <div class="blog-content">
                                <a href="product.php?id=<?=$row['id'] ?>" class="post-title"><?= $row['name'] ?></a><br>
                                Price: <?= $row['price'] ?><br>
                                <?php if (!empty($_SESSION['user']['login']) and empty($_SESSION['user']['admin'])){ ?>
                                    <a href="prize_buy.php?id=<?=$row['id'] ?>">BUY/</a>
                                <?php } ?> 
                                <?php if (!empty($_SESSION['user']['login']) and !empty($_SESSION['user']['admin'])) { ?> 
                                    <a href="prize_edit.php?id=<?=$row['id'] ?>">CHANGE/</a>
                                    <a href="prize_delete.php?id=<?=$row['id'] ?>">DELETE/</a>
                                <?php } ?> 
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- ##### Top News Area End ##### -->

<?php include("footer.php"); ?>