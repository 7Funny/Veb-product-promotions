<?php include("header.php"); 
$result = mysqli_query($connection, "SELECT * FROM products WHERE products.id_user=0");
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
                                <img src="<?= $row['picture'] ?>" alt="food">
                            </div>

                            <!-- Blog Content -->
                            <div class="blog-content">
                                Type: <?= $row['type'] ?><br>
                                <?= $row['description'] ?><br>
                                Price: <?= $row['price'] ?><br>
                                <?php 
                                $today = date("Y-m-d");
                                $expire = $row['todata'];
                                $today_time = strtotime($today);
                                $expire_time = strtotime($expire);
                                if($row['promo_points']!=0 and $expire_time > $today_time) { ?>
                                points: <?= $row['promo_points'] ?><br>
                                <?php } if (!empty($_SESSION['user']['login']) and empty($_SESSION['user']['admin'])){ ?>
                                    <a href="food_buy.php?id=<?=$row['id'] ?>">BUY/</a>
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