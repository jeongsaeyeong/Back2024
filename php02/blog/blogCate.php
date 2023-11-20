<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    if(isset($_GET['category'])){
        $category = $_GET['category'];
    } else {
        Header("Location: blog.php");
    }

    $categorySql = "SELECT * FROM blog WHERE blogDelete = 1 AND blogCategory = '$category' ORDER BY blogId DESC";
    $categoryResult = $connect->query($categorySql);
    $categoryInfo = $categoryResult->fetch_array(MYSQLI_ASSOC);
    $categoryCount = $categoryResult->num_rows;
    
?> 

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP 블로그 만들기</title>

    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body class="gray">

    <?php include "../include/skip.php" ?>
    <!-- skip -->

    <?php include "../include/header.php" ?>
    <!-- header -->

    <main id="main" role="main">
        <div class="intro__inner blogStyle bmStyle container ">
            <div class="blog_intro__img">
                <img srcset="../assets/img/Baroque_3.jpg 1x,
                ../assets/img/Baroque_3@2.jpg 2x,
                ../assets/img/Baroque_3@3.jpg 3x" alt="">
            </div>
            <div class="intro__text">
                <h3><?=$category?></h3>
                <p>전시회, 박람회, 서적 등 직접 본 미술들에 대한 <?=$category?>를 전달합니다.</p>
            </div>
        </div>

        <div class="blog__layout container">
            <div class="blog__contents">
                <setcion class="blog__wrap card__wrap">
                    <div class="card__inner column3">
<?php foreach($categoryResult  as $blog){ ?>
    <div class="card">
        <figure class="card__img">
            <a href="blogView.php?blogId=<?=$blog['blogId']?>">
                <img src="../assets/blog/<?=$blog['blogImgFile']?>" alt="<?=$blog['blogTitle']?>">
            </a>
        </figure>
        <div class="card__text">
            <h3>
                <a href="blogView.php?blogId=<?=$blog['blogId']?>">
                    <?=$blog['blogTitle']?>
                </a>
            </h3>
            <p>
                <?=substr($blog['blogContents'], 0, 100)?>
            </p>
        </div>
    </div>
<?php } ?>
                    </div>
                </setcion>
            </div>
            <div class="blog__aside">
                
                <?php include "blogad.php" ?><br>
                <!-- blog__ad -->

                <?php include "blogIntro.php" ?><br>
                <!-- blogIntro -->

                <?php include "blogCategory.php" ?><br>
                <!-- blogCategory -->

                <?php include "blogPopular.php" ?><br>
                <!-- blogPopular -->

                <?php include "blogComment.php" ?>
                <!-- blogComment -->

            </div>
        </div>
    </main>
    <!-- main -->

    <?php include "../include/footer.php" ?>
    <!-- footer -->
</body>
</html>