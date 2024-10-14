<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Automated Question Builder Application - Login</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
    <style> 
    
        body{
            background-image: url("images/login.png"); 
        }
    
        
        .login-container {           
            padding: 20px;
            border-radius: 10px;            
            text-align: center;
            width: 450px;
            color: rgb(71, 71, 71);
            font-size: larger;
            justify-content: center;
            align-items: center;            
        }
        
        h2 {
            margin-bottom: 20px;
            color:#410808;
            font-size: 32px;
        }
        .role-btn {
            display: block;
            width: 100%;
            padding: 10px;
            margin: 20px 0;
            font-size: 16px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
            
        }
        .role-btn:hover {
            background-color: #936538;
        }
        .admin {
            background-color: #D3BBA1;
            color: rgb(73, 51, 13);
            font-size: 1.5pc;
            border-bottom:  rgb(99, 99, 99) 2px solid;
            border-right:  rgb(99, 99, 99) 2px solid;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            height: 50px;
            font-family: 'Poppins',sans-serif;
        }
        .trainer {
            background-color: #D3BBA1;
            color: rgb(73, 51, 13);
            font-size: 1.5pc;
            border-bottom:  rgb(99, 99, 99) 2px solid;
            border-right:  rgb(99, 99, 99) 2px solid;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            height: 50px;
            font-family: 'Poppins',sans-serif;
        }
        .employee {
            background-color: #D3BBA1;
            color: rgb(73, 51, 13);
            font-size: 1.5pc;
            border-bottom:  rgb(99, 99, 99) 2px solid;
            border-right:  rgb(99, 99, 99) 2px solid;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            height: 50px;
            font-family: 'Poppins',sans-serif;
        }
        #questhive{
            position: relative;
            margin: 0 ;
            color: #442c14;
        }
        body{
            background-repeat: no-repeat;
            background-attachment:local;   
            background-size: 100% 100%;
            height: 720px;
        }
        img{
            width: 60px;
            height: 70px;
        }

        #image
        {
        
            position: absolute;
            margin-left: 10px;
            margin-top: 5px;
        }

        .logo {
            display: flex;
            align-items: center;
            position: relative;
        
        }

        .logo .img {
            margin-left:10px;
            margin-top:10px;
            margin-right: 10px; 
        }

        .logo h3 {
            margin: 10 0 10 20px; 
        }

        .logo .game {
            position: absolute;
            top: 0;
            right: 0;
            margin: 30px;
        
        }
        span{
            font-size: 44px;
        }

        h4{
            font-size: 16px;
            font-weight: bolder;
            float: left;
            position:absolute;
            margin-top:70px;
            margin-left:140px;
            
        }

        #logout
        {
            color: #442c14;
            text-decoration: none;
            font-size: 20px;
        }

        #logout:hover
        {
            text-decoration:underline;
            color: #442c14;
        }

    </style>  
</head>
<body>
    <div class="logo">
        <img class="img" src="images/image2.png" alt="text">
        <h3 id="questhive"><span>Q</span>uesthive</h3>
        <h4 class="head">Learn to lead</h4> 
        <div class="game">
        <a  id="logout" href="index.html" >Back</a>
        </div>
    </div>
  
   
<center>
<div class="login-container" style="margin-top: 100px; align-items: center;">
    <h2 style="padding-bottom: 5px;">Login as</h2>
    
    <button class="role-btn admin" onclick="window.location.href='admin_login.php'">Administrator</button>
    <button class="role-btn trainer" onclick="window.location.href='trainer_login.php'">Trainer</button>
    <button class="role-btn employee" onclick="window.location.href='employee_login.php'">Employee</button>
</div>
</center>
</body>
</html>