<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator Settings</title>
    <style>
        body{
            background-color: antiquewhite;
        }
        button{
            height: 80px;
            width: 185px;
            border-width: 0px;
            box-shadow: 2px 2px 5px gray;
            border-radius: 20px;
            margin: 20px;
            margin-top: 240px;
            justify-content: center;
            background-color:#F5E8DD;
            font-size: 17px;
            text-shadow: 0px 0.5px gray;
            
        }
        div{
            margin-left: 500px;
        }
        button:hover{
            background-color:#FFE4C9;
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
            margin-left: 750px;
            color: rgb(69, 37, 16);
        }
        a:hover{
            text-decoration:underline;
        }
    </style>
</head>
<body>
    <img class="img" src="images/image2.png" alt="text">
    <div class="logo">
        <h3 id="questhive"><span>Q</span>uesthive</h3>
        <h4 class="head">Learn to lead</h4>
        <div class="game">
            <a  href="admin_page.php" >Back</a>
        </div>
    </div> 
    <div>
        <button onclick="window.location.href='admin_page.php'">Save Changes</button>
        <button id="logoutButton">Logout</button>
    </div>
    
    <script>
        document.getElementById("logoutButton").addEventListener("click", function(event) {
          event.preventDefault();

        var confirmation = confirm("Are you sure you want to log out?");

        if (confirmation) {
          window.location.href = 'logout.php';
        }
        });


    </script>
</body>
</html>