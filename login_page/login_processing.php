<?php
session_start();
$servername = "localhost";
$username = "root";
$password = ""; // no password
$dbname = "cv_information";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email_input = test_input($_POST['email']);
    $password_input = test_input($_POST['pswd']);
    $sql = 'SELECT id, email, password FROM users WHERE email="' . $email_input . '"';
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $rows = $result->fetch_assoc();
        $_SESSION["email"] = $email_input;
        $_SESSION["is_signed_in"] = false;
        if (password_verify($password_input, $rows['password'])) {
            setcookie("email", $email_input, time() + (86400 * 30), "/");
            $_SESSION["is_signed_in"] = true;
            $_SESSION["user_id"] = $rows['id'];
            header("Location: ../collection_page/collection.php");
        } else {
            header("Location: http://localhost/login_page/login.php?wrong_pwd=1");
        }
    } else {
        session_unset();
        session_destroy();
        header("Location: http://localhost/login_page/login.php?user_not_found=1");
    }
}   
mysqli_close($conn);

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>