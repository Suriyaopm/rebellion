<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Questions</title>
    <style>
        body{
            background-color: antiquewhite;
        }
        
        .button-container{
            position: absolute;
            top: 265px;
            left: 407px;
            display: inline-block;
        }
        .bt1{
            height: 60px;
            width: 200px;
            border-radius: 5px;
            margin: 25px;
            border-width: 0px;
            box-shadow: 2px 2px 5px gray;
            font-size: 17px;
            text-shadow: 0.5px 0.5px gray;
            color: #442c14;
            background-color: bisque;
            
        }
        .bt1:hover{
            background-color: burlywood;
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
        .f0{
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
        .f0:hover{
            text-decoration: underline;
        }

    </style>
</head>
<body>
    <img class="img" src="images/image2.png" alt="text">
    <div class="logo">
        <h3 id="questhive"><span>Q</span>uesthive</h3>
        <h4 class="head">Learn to lead</h4>
        <div class="game">
            <a class="f0" href="trainer_page.php" >Back</a>
        </div>
    </div> 
    <div class="button-container">
        <button onclick="window.location.href = 'paragraph.php'" class="bt1">Paragraph</button>
        <button onclick="window.location.href = 'coding.php'" class="bt1">Coding</button>
        <button onclick="window.location.href = 'mcq.php'" class="bt1">MCQs</button>
    </div>
    
</body>
</html>