<?php include("header.php"); 
$id_user = $_SESSION['user']['id'];
$result = mysqli_query($connection, "SELECT * FROM prize WHERE prize.id_order_user=$id_user");
if ($result == false)
{
    echo "Сообщение ошибки:\n";
    echo mysqli_connect_error();
}
$products = mysqli_query($connection, "SELECT * FROM products WHERE products.id_user=$id_user");
if ($products == false)
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
                                <img src="<?= $row['picture'] ?>" alt="<?= $row['description'] ?>">
                            </div>

                            <!-- Blog Content -->
                            <div class="blog-content">
                                <p class="post-title"><?= $row['name'] ?></p>
                            </div>

                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="top-news-area section-padding-100">
        <div class="container">
            <div class="row">
                <?php while ($row = mysqli_fetch_assoc($products)) { ?>
                    <!-- Single News Area -->
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="single-blog-post style-2 mb-5">
                            
                            <!-- Blog Thumbnail -->
                            <div class="blog-thumbnail">
                                <img src="<?= $row['picture'] ?>" alt="<?= $row['description'] ?>">
                            </div>

                            <!-- Blog Content -->
                            <div class="blog-content">
                                <p class="post-title"><?= $row['name'] ?></p>
                            </div>

                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- ##### Top News Area End ##### -->

    <?php include("footer.php"); ?>