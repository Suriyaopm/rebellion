<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Remove</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="static/project1.css">
    <style>
        #signup{
            display: inline-block;
            position: absolute;
            top:100px
        }
        .logo{
            display: flex;
            justify-content: left;
            color: rgb(69, 37, 16);
            margin-left: 45px;
            margin-top: 0px;
            position: relative;
        }
        .img{
            width: 45px;
            height: auto;
            margin-top: 0px;
            padding: 0px;
            margin-right: 8px;
            position: absolute;
        }
        span{
            font-size: 44px;
        }
        h3{
            font-size: 28px;
            
        }
        #questhive{
            position: absolute;
            margin-top: 0px;
            color: rgb(69, 37, 16); 
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }
        .head{
            position: relative;
        }
        h4{
            font-size: 16px;
            font-weight: bolder;
            float: left;
            margin-left: 40px;
            margin-top:45px;
        }
        a{
            float: right;
            padding-top:18px;
            margin-right: 20px;
            color: #1e1b18;
            position: relative ;
            text-decoration:none;
            font-size: 22px;
            font-weight: bold;
            margin-left: 1250px;
            color: rgb(69, 37, 16);
        }
        a:hover{
            text-decoration:underline;
        }
        span{
            font-family: 'Times New Roman', Times, serif;
        }
        
    </style>

</head>
<body>
    <img class="img" src="images/image2.png" alt="text">
    <div class="logo">
        <h3 id="questhive"><span>Q</span>uesthive</h3>
        <h4 class="head">Learn to lead</h4>
        <div class="game">
            <a class="f0" href="admin_UM.php" >Back</a>
        </div>
    </div> 
    <div class="container" id="signup">
      <h1 class="form-title">Employee Remove</h1>
      <form method="post" action="e_remote.php">
        <div class="input-group">
           
           <input type="text" name="fName" id="fName" placeholder="First Name" required>
           
        </div>
        <div class="input-group">
           
            <input type="text" name="lName" id="lName" placeholder="Last Name" required>
           
        </div>
        <div class="input-group">
           
            <input type="email" name="email" id="email" placeholder="Email" required>
            
        </div>
        <div class="input-group">
            
            <input type="password" name="password" id="password" placeholder="Password" required>
           
        </div>
       <input type="submit" class="btn" value="Remove Employee" name="signUp">
      </form>
    </div>
</body>
</html>