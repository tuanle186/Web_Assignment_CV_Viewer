<?php
session_start();

if (!$_SESSION['is_signed_in']) {
    header("Location: ../login_page/login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="undefined" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="undefined" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="../component/navbar.css">
    </head>
    <body> 
        <?php
        include "../component/navbar.php";
        include '../config/db.php';
        $resumes = mysqli_query($conn, "SELECT * FROM resumes WHERE user_id={$_SESSION['user_id']}");
        ?>

        <div class="container d-flex flex-column align-items-center" id="resumeContainer">
            <table class="table border-5 rounded-3 overflow-hidden">
                <colgroup>
                    <col span="1" style="width: 5%;">
                    <col span="1" style="width: 70%;">
                    <col span="1" style="width: 25%;">
                </colgroup>
                <thead>
                    <tr>
                        <th scope="col">
                            <p class="text-primary mb-2">#</p>
                        </th>
                        <th scope="col">
                            <p class="text-primary mb-2">CV Title</p>
                        </th>
                        <th scope="col">
                            <p class="text-primary mb-2">Last Modified</p>
                        </th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0" id="resumeTableBody">
                    <?php
                    $limit = 5;
                    $query = "SELECT * FROM resumes WHERE user_id={$_SESSION['user_id']} LIMIT $limit";
                    $resumes = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_assoc($resumes)) :
                    ?>
                    <tr>
                        <td> <?php echo $row['id']; ?> </td>
                        <td> <?php echo $row['title']; ?> </td>
                        <td> <?php echo $row['update_at']; ?> </td>
                    </tr> <?php endwhile; ?>
                </tbody>
            </table>
            <button type="button" class="btn btn-primary" id="loadMoreBtn">Show more</button>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script>
            $(document).ready(function() {
                var limit = 5; // Số sản phẩm được tải thêm mỗi lần
                var offset = limit; // Bắt đầu từ vị trí đầu tiên
                var searchTerm = ''; // Biến theo dõi giá trị tìm kiếm
                // Code AJAX để tìm kiếm theo title và load thêm
                function loadResults() {
                    $.ajax({
                        type: "POST",
                        url: "load_more.php",
                        data: {
                            searchTerm: searchTerm,
                            limit: limit,
                            offset: offset
                        },
                        success: function(response) {
                            $("#resumeTableBody").append(response);
                            offset += limit;
                            toggleShowMoreButton(); // Cập nhật trạng thái nút "Show more"
                        }
                    });
                }
                // Code AJAX để tìm kiếm theo title
                $("#searchForm").submit(function(e) {
                    e.preventDefault();
                    searchTerm = $("#searchInput").val();
                    offset = 0; // Reset lại offset khi tìm kiếm mới và bắt đầu từ vị trí đầu tiên
                    $.ajax({
                        type: "POST",
                        url: "search.php",
                        data: {
                            searchTerm: searchTerm,
                            limit: limit,
                            offset: offset
                        },
                        success: function(response) {
                            $("#resumeTableBody").html(response);
                            offset += limit;
                            toggleShowMoreButton(); // Cập nhật trạng thái nút "Show more"
                        }
                    });
                });
                // Code AJAX để tải thêm sản phẩm khi không có tìm kiếm
                $("#loadMoreBtn").click(function() {
                    loadResults();
                });
                // Hàm cập nhật trạng thái nút "Show more" dựa trên offset và trạng thái tìm kiếm
                function toggleShowMoreButton() {
                    var totalResults = $("#resumeTableBody tr").length; // Đếm số lượng kết quả hiện tại
                    if (offset <= totalResults) {
                        $("#loadMoreBtn").show();
                    } else {
                        $("#loadMoreBtn").hide();
                    }
                }
            });
        </script>
        </div>
        <!--<script src="addTable.js" defer></script>-->
    </body>
</html>