<?php include("header.php"); 

$id=(int)$_GET["id"];

$result = mysqli_query($connection, "SELECT * FROM news WHERE id = '$id'");
$res = mysqli_query($connection, "SELECT * FROM news ORDER BY d desc limit 5");
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
                        <span class="post-date"><?= $row['d'] ?></span>
                        <span><h2><?= $row['title'] ?></h2></span>
                        <img class="mb-30" src="<?= $row['picture'] ?>" alt="<?= $row['preview'] ?>">
                        <span><?= $row['full text'] ?></span>
                    </div>
                </div>

                <!-- Sidebar Widget -->
                <div class="col-12 col-sm-9 col-md-6 col-lg-4">
                    <div class="sidebar-area">
                    <!-- Latest News Widget -->
                    <div class="single-widget-area news-widget mb-30">
                        <h4>Latest News</h4>
                        <!-- Single News Area -->
                        <?php while ($r=mysqli_fetch_assoc($res)) { ?>
                            <div class="single-blog-post d-flex style-4 mb-30">
                                <!-- Blog Thumbnail -->
                                <div class="blog-thumbnail">
                                    <a href="new.php?id=<?=$r['id'] ?>"><img src="<?= $r['picture'] ?>" alt="<?= $r['preview'] ?>"></a>
                                </div>

                                <!-- Blog Content -->
                                <div class="blog-content">
                                    <span class="post-date"><?= $r['d'] ?></span>
                                    <a href="new.php?id=<?=$r['id'] ?>" class="post-title"><?= $r['title'] ?></a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Post Details Area End ##### -->

    <?php include("footer.php"); ?>