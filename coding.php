<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coding Questions Generator</title>
    <style>
        body{
            background-color: antiquewhite;
            color: #442c14;
   
        }
        #form1
        {
            position: absolute;
            margin-left: 500px;
            margin-top: 40px;
        }


        h1{
            font-size: 40px;
        }
        label{
                font-size: 25px;
        }


        input{
            height: 50px;
            width: 200px;
            margin: 10px;
        }

        #easy{
            margin-left: 45px;
            font-size: 18px;
        }

        #submit
        {
            background-color: #442c14;
            font-size: 20px;
            color: antiquewhite;
            padding: 10px;
            border-radius: 5px;
            margin-left: 180px;
            margin-top: 25px;
            width: 150px;
        }

        #submit:hover{
            opacity: 80%;
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
            color:#442c14;
            font-size: 20px;
        text-decoration: none;
        }

        #logout:hover
        {
            text-decoration:underline;
            color: #442c14;
        }
        #medium{
            font-size: 18px;
        }
        #difficult{
            font-size: 18px;
        }
    </style>
</head>
<body>


    <div class="logo">
        <img class="img" src="images/image2.png" alt="text">
        <h3 id="questhive"><span>Q</span>uesthive</h3>
        <h4 class="head">Learn to lead</h4> 
        <div class="game">
        <a  id="logout" href="generate.php" >Back</a>
        </div>
    </div>
<div id="form1">
    <h1>Generate Coding Questions</h1>
    <form id="question-form" action="coding_result.php" method="post">
        <label for="easy">Number of Easy Questions:</label>
        <input type="number" id="easy" name="easy" min="0" required><br><br>

        <label for="medium">Number of Medium Questions:</label>
        <input type="number" id="medium" name="medium" min="0" required><br><br>

        <label for="difficult">Number of Difficult Questions:</label>
        <input type="number" id="difficult" name="difficult" min="0" required><br><br>

        <button type="submit" id="submit">Generate</button>
    </form></div>
</body>
</html>