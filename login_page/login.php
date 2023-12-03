<?php
session_start();

if (isset($_SESSION["is_signed_in"]) && $_SESSION["is_signed_in"] === TRUE) {
    header('Location: ../collection_page/collection.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
    <link rel="icon" type="image/png" href="../asset/logo.png"/>
</head>
<body>
    <div class="container-fluid h-100">
        <div class="row h-100 vertical-center">
            <div class="col-md-9 h-100 vertical-center">
                <div class="col-md-3 mb-auto mt-2">
                    <a href="http://localhost/login_page/login.php">
                        <img id="logo" src="../Asset/logo.png" alt="Logo" class="img-fluid">
                    </a>
                </div>
                <div class="col-md-6">
                    <h2 id="login_title" class="text-center pb-4">Login to your account</h2>
                    <form id="login_form" action="login_processing.php" method="post" class="px-5 text-center <?php if(isset($_GET['wrong_pwd']) || isset($_GET['user_not_found']))  echo'was-validated'?>"" novalidate>
                        <div class="mb-4 mt-3 mx-auto w-75">
                            <input id="email" type="email" class="form-control" id="email" placeholder="Email" name="email" required value="<?php echo isset($_SESSION["email"]) ? $_SESSION["email"] : "" ?>">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="mb-4 mt-3 mx-auto w-75">
                            <input id="pswd" type="password" class="form-control" id="pwd" placeholder="Password" name="pswd" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div id="login_failed" class="containter mb-4">
                            <?php
                            if (isset($_GET['wrong_pwd'])) {
                                echo "Try again, wrong password.";
                            }
                            if (isset($_GET['user_not_found'])) {
                                echo "Try again, email not found.";
                            }
                            ?>
                        </div>    
                        <button id="login_button" type="submit" class="btn w-50 rounded-5 mb-5">Sign in</button>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
            <div id="new_here"class="col-md-3 h-100 vertical-center hero-image">
                <div class="col-md text-center">
                    <h2 class="pb-4">New Here?</h2>
                    <p class="pb-4">Sign up and <br> create your own CV <br> with ease!</p>
                    <button id="signup_button" type="button" class="btn w-50 rounded-5">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>