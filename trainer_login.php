

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trainer Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="static/project.css">
    <style>
        body{
            background-image: url("images/login.png");
        }
        a:hover{
            text-decoration: underline;
        }
    </style>
</head>
<body>
    
    <div class="img"> <img src="images/image2.png" alt="text"></div>
    <a href="login.php" style="position: relative; z-index: 10;">Back</a>
    
    <div class="content"> 
        <h2 class="font"><span style="font-style: italic;" class="span">Q</span>uesthive</h2>
        <h3>Learn to lead</h3> 
    </div>
    <center>
        <div class="login-container" id="signIn">
            <h1 style="font-size: 38px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;" class="form-title ">Trainer Login</h1>
            <form method="post" action="register.php">
              <div class="input-group">
                  <input type="email" name="email" id="email" placeholder="Email" required>
              </div>
              <div class="input-group">
                  <input type="password" name="password" id="password" placeholder="Password" required>
              </div>
              <input type="submit" class="login-btn" value="Login" name="signIn">
            </form>
        </div>
    </center>

</body>
</html>
<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    include 'connect.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

    $password = md5($password);

    $sql = "SELECT * FROM tusers WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $_SESSION['email'] = $row['email'];
        $_SESSION['firstName'] = $row['firstName'];
        $_SESSION['lastName'] = $row['lastName'];
        $_SESSION['login_time'] = date('h:i A');
        $_SESSION['logged_in'] = true;
        
        header("Location: trainer_page.php");
        exit();
    } else {
        echo "<p style='color: red;'>Not Found, Incorrect Email or Password</p>";
    }
}
?>
