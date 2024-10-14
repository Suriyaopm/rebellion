<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin User Management</title>
    <link rel="stylesheet" href="static/user.css">
    <style>
        .align{
            border-width: 0px;
            box-shadow: 3px 3px 7px gray;
        }
    </style>
    
</head>
<body>

    
    <div class="logo">
        <img class="img" src="images/image2.png" alt="text">
        <h3 id="questhive"><span>Q</span>uesthive</h3>
        <h4 class="head">Learn to lead</h4> 
        <div class="game">
        <a  id="logout" href="admin_page.php" >Back</a>
    </div>
    </div>  
    <div class="container">
      <div class="left ">
        <div class="align "><a href="t_register.php" class="button">Add Trainer</a></div>
        <div class="align "> <a href="e_register.php" class="button">Add Employee</a></div>
        <div class="align"> <a href="trainer_user_list.php" class="button">Trainer List</a></div> 
    </div>
    <div class="right">
        <div class="align "> <a href="t_remove.php" class="button">Remove Trainer</a></div>
        <div class="align"><a href="e_remove.php" class="button">Remove Employee</a></div> 
        <div class="align"> <a href="employee_user_list.php" class="button">Employee List</a></div> 
    </div>
    </div>
</body>
</html>