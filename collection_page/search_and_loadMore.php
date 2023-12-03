<?php
session_start();
include '../config/db.php';

if (isset($_POST['searchTerm']) && isset($_POST['limit']) && isset($_POST['offset'])) {
    $searchTerm = $_POST['searchTerm'];
    $limit = $_POST['limit'];
    $offset = $_POST['offset'];

    $query = "SELECT * FROM resumes WHERE user_id={$_SESSION['user_id']} AND title LIKE '%$searchTerm%' LIMIT $offset, $limit";
    $resumes = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($resumes)) :
        ?>
        <tr>
            <td> <a href="http://localhost/cv_viewer_page/cv_viewer.php?cv_id=<?php echo $row['id']; ?>"> <?php echo $row['title']; ?> </td>
            <td> <?php echo $row['update_at']; ?> </td>
        </tr>
    <?php
    endwhile;
}
?>
