<?php
session_start();
include("connect.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee DashBoard</title>

</head>
<body>
      <p>
        Hello  <?php
        if(isset($_SESSION['email'])){
        $email=$_SESSION['email'];
        $query=mysqli_query($conn, "SELECT tusers.* FROM `tusers` WHERE tusers.email='$email'");
        while($row=mysqli_fetch_array($query)){
            echo $row['firstName'].' '.$row['lastName'];
        }
        }
        ?>
      </p>
      <a href="logout.php" id="logoutButton">Logout</a>
      <a href="trainer_feedback.php"><button type="button">FeedBack</button></a>
      
      
      <script>
        document.getElementById("logoutButton").addEventListener("click", function(event) {
          event.preventDefault();  // Prevents the default action (which is to navigate to the logout page)

          // Show a confirmation dialog
        var confirmation = confirm("Are you sure you want to log out?");

        // If the user confirms, proceed with the logout
        if (confirmation) {
          window.location.href = this.href;  // Navigate to the logout page
        }
        });

      </script>
      
</body>
</html>