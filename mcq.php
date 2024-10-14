<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MCQ Generator</title>
    <!-- <link rel="stylesheet" href="multiplecq.css"> -->

    <style>
        body{
            background-color: antiquewhite;
            color: #442c14;
        
        }

        #form1
        {
            position: absolute;
            margin-left: 500px;
            margin-top: 80px;
        }
        h1{
            font-size: 40px;
        }
        label{
                font-size: 25px;
        }
        input{
            height: 50px;
            width: 245px;
            margin: 10px;
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

        #difficulty{
            width: 250px;
            height: 50px;
            padding: 10px;
            margin: 8px 0px;
            margin-bottom: 20px;
            margin-left: 130px;
            font-size: 18px;
        }
        option{
            font-size: 20px;
        }
        #topic{
            margin-left: 170px;
            font-size: 18px;
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
        #num_questions{
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
    <h1>Generate MCQ Questions</h1>
    <form action="mcq_result.php" method="POST">
        <label for="num_questions">Number of Questions:</label>
        <input type="number" id="num_questions" name="num_questions" required>
        <br>
        <label for="topic">Topic:</label>
        <input type="text" id="topic" name="topic" required>
        <br>
        <label for="difficulty">Difficulty:</label>
        <select id="difficulty" name="difficulty" required>
            <option value="easy">Easy</option>
            <option value="medium">Medium</option>
            <option value="hard">Hard</option>
        </select>
        <br>
        <button type="submit" id="submit">Generate</button>
    </form></div>
</body>
</html>