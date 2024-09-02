<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
    <div class="container">
        <a href="" class="button">System Monitoring</a>
        <a href="" class="button">Usage Statics</a>
        <a href="admin_issue.php" class="button">Issues</a>
        <a href="admin_UM.php" class="button">User Management</a>
        <a href="admin_report.php" class="button">Report</a>
        <a href="" class="button">Settings</a>
    </div>
    <a href="logout.php" id="logoutButton">Logout</a>
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