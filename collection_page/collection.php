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
        <title>CV collection</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="undefined" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="undefined" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="../component/navbar.css">
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="script.js"></script>
        <link rel="icon" type="image/png" href="../asset/logo.png"/>
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
                    <col span="1" style="width: 70%;">
                    <col span="1" style="width: 30%;">
                </colgroup>
                <thead>
                    <tr>
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
                        <td> <a href="http://localhost/cv_viewer_page/cv_viewer.php?cv_id=<?php echo $row['id']; ?>"> <?php echo $row['title']; ?> </td>
                        <td> <?php echo $row['update_at']; ?> </td>
                    </tr> 
                    
                    <?php endwhile; ?>
                </tbody>
            </table>
            <button type="button" class="btn btn-primary" id="loadMoreBtn">Show more</button>
        </div>
    </body>
</html>