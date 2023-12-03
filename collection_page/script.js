$(document).ready(function() {
    var limit = 5; // Số sản phẩm được tải thêm mỗi lần
    var offset = limit; // Bắt đầu từ vị trí đầu tiên
    var searchTerm = ''; // Biến theo dõi giá trị tìm kiếm
    // Code AJAX để tìm kiếm theo title và load thêm
    function loadResults() {
        $.ajax({
            type: "POST",
            url: "search_and_loadMore.php",
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
            url: "search_and_loadMore.php",
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
