<?php include("header.php"); 
$result = mysqli_query($connection, "SELECT * FROM `news` ORDER BY d");
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
                                <a href="new.php?id=<?=$row['id'] ?>"><img src="<?= $row['picture'] ?>" alt="<?= $row['preview'] ?>"></a>
                            </div>

                            <!-- Blog Content -->
                            <div class="blog-content">
                                <span class="post-date"><?= $row['d'] ?></span>
                                <a href="new.php?id=<?=$row['id'] ?>" class="post-title"><?= $row['title'] ?></a>
                                <?php if (!empty($_SESSION['user']['login']) and $_SESSION['user']['admin'] == 1){ ?>
                                    <a href="new_edit.php?id=<?=$row['id'] ?>">EDIT /</a>
                                    <a href="new_delete.php?id=<?=$row['id'] ?>">DELETE NEW</a>
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