<?php
include './fonts/google_fonts.php';
session_start();  

if (!isset($_SESSION['error_message'])) {
    $_SESSION['error_message'] = "";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if ($email == 'dap@wmsu.com' && $password == '123456') {
            $_SESSION['user'] = 'student'; // Set session variable for STUDENTS
            header("Location: student_view/homePage.php");
            exit();
        } else if ($email == 'faculty@wmsu.com' && $password == '123456') {
            $_SESSION['user'] = 'faculty'; // Set session variable for GUIDANCE/ADVISER
            header("Location: faculty_view/faculty.php"); 
            exit();
        } else if ($email == 'prof@wmsu.com' && $password == '123456') {
            $_SESSION['user'] = 'prof'; // Set session variable for PROFESSORS
            header("Location: professors_view/professors.php"); 
            exit();
        } else if ($email == 'admin@wmsu.com' && $password == '123456') {
            $_SESSION['user'] = 'admin'; // Set session variable for ADMIN
            header("Location: admin_view/admin.php"); 
            exit();
        } else {
            $_SESSION['error_message'] = "Login failed. Invalid email or password.";
        }
    } else {
        $_SESSION['error_message'] = "Please enter both email and password.";
    }

    header("Location: login.php"); 
    exit();
}
?>

<?php 
includeGoogleFont([
    'Josefin Sans:ital,wght@0,100..700;1,100..700', 
    'Poppins:wght@400;600'
]); 
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>Login</title>
    <link rel="stylesheet" href="loginStyle.css">
</head>

<body>

    <div class="container">
        <div class="logo">
          <img src="../images/Nexuse.svg" alt="WMSU Logo" class="cat">
        </div>
        <h1>Nexuse.</h1>        
        <?php if (!empty($_SESSION['error_message'])): ?>
            <p style="color:red;"><?= $_SESSION['error_message'] ?></p>
            <?php $_SESSION['error_message'] = ""; ?>
        <?php endif; ?>

        <form action="login.php" method="post">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password">
            </div>
            <button type="submit" id="continue_button">Continue</button>
        </form>

        <div class="links">
            <a href="register.php" id="create_account">Create Account</a>
            <a href="forgot_password/forgotPassword.php" id="forgot_password">Forget Password</a>
        </div>
    </div>

</body>
</html>
