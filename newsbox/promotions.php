<?php include("header.php"); 
$result = mysqli_query($connection, "SELECT * FROM promotion");
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
                    <div>
                        <div >
                            <!-- Blog Content -->
                            <div class="blog-content">
                                <h3 class="post-title"><?= $row['type'] ?></h3>
                                <span class="post-date">ОТ <?= $row['fromdata'] ?></span>
                                <span class="post-date">ДО <?= $row['todata'] ?></span><br>
                                <span><?= $row['description'] ?></span><br>
                                <?php if (!empty($_SESSION['user']['login']) and $_SESSION['user']['admin'] == 1){ ?>
                                    <a href="promo_delete.php?id=<?=$row['id'] ?>">DELETE/</a>
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