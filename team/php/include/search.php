<div class="search_box side_box roundCorner shaDow">
    <form action="../board/board_search.php" method="POST">
        <input type="text" name="side_search" placeholder="취중진담 통합 검색" id="side_search">
        <button type="submit" id="searchBtn"><i class="fa-solid fa-magnifying-glass"></i></button>
    </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<script>
    $("#searchBtn").click(function () {
        if ($("#side_search").val() == "") {
            alert("검색어를 입력해주세요!");
            $("#side_search").focus();
        }
    })
</script>