<?php
$jsonFilePath = 'json/curricula.json';
$curricula = file_exists($jsonFilePath) ? json_decode(file_get_contents($jsonFilePath), true) : [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Curricula</title>
    <style>
        body{
            background-color: antiquewhite;
        }
        p{
            font-size: 1.1rem;
        }
        h1{
            font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
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
            <a class="f0" href="employee_page.php" >Back</a>
        </div>
    </div> 
    <h1>Uploaded Curricula</h1>
    <?php if (!empty($curricula)) : ?>
        <ul>
            <?php foreach ($curricula as $index => $curriculum) : ?>
                <li>
                    <p><strong>Course Name:</strong> <?php echo htmlspecialchars($curriculum['course_name']); ?><br></p>
                    <p><strong>Description:</strong> <?php echo htmlspecialchars($curriculum['course_desc']); ?><br></p>
                    <p><strong>File:</strong> <a href="curricula/<?php echo htmlspecialchars($curriculum['file']); ?>" target="_blank"><?php echo htmlspecialchars($curriculum['file']); ?></a><br></p>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else : ?>
        <p>No curricula uploaded yet.</p>
    <?php endif; ?>
</body>
</html>
