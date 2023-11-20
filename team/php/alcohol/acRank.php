<?php
include "../connect/connect.php";
include "../connect/session.php";

//술 정보 가져오기 (좋아요+댓글) 많은 아이템을 조회순으로 보여줌
$acTopList = "SELECT *, (acLike + acComment) AS like_comment_total
              FROM drinkList
              ORDER BY like_comment_total DESC, acView DESC
              LIMIT 10;";
$acRank = $connect->query($acTopList);
?>


<div class="ranking_list boxStyle roundCorner shaDow">
    <h4>이번주 인기 주류 <span>TOP10</span></h4>
    <div class="alcohol_list">
        <div class="swiper">
            <div class="swiper-wrapper">

                <?php // 결과를 배열로 저장
                $acData = [];
                while ($acTop10 = $acRank->fetch_array(MYSQLI_ASSOC)) {
                    $acData[] = $acTop10;
                }

                // 반복문을 사용하여 결과 출력
                $rank = 1;
                foreach ($acData as $acTop10) {
                    ?>
                    <div class="swiper-slide">
                        <?php if ($rank <= 3) { ?>
                            <span class="rankedIn">
                                <?= $rank ?>
                            </span>
                        <?php } else { ?>
                            <span>
                                <?= $rank ?>
                            </span>
                        <?php } ?>

                        <a id="<?= $acTop10['acId'] ?>" href="../alcohol/alcohol_page.php?acId=<?= $acTop10['acId'] ?>">
                            <img src="<?= $acTop10['acImgPath'] ?>" alt="<?= $acTop10['acName'] ?>">
                            <div class="title_hover">
                                <p>
                                    <?= $acTop10['acName'] ?>
                                </p>
                                <span>
                                    <?= $acTop10['acCompany'] ?>
                                </span>
                            </div>
                        </a>
                    </div>
                    <?php
                    $rank++;
                }
                ?>

            </div>
        </div>
    </div>
</div>