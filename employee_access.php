<?php

$jsonDir = 'json';
$jsonFilePath = $jsonDir . '/topics.json';

$topics = file_exists($jsonFilePath) ? json_decode(file_get_contents($jsonFilePath), true) : [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uploaded Topics</title>
    <style>
        body{
            background-color: antiquewhite;
        }
        li{
            padding-top: 7px;
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
    <h1>Uploaded Topics</h1>
    <?php if (!empty($topics)) : ?>
        <ul>
            <?php foreach ($topics as $topic => $files) : ?>
                <li>
                    <strong>Topic:</strong> <?php echo htmlspecialchars($topic); ?>
                        <?php foreach ($files as $file) : ?>
                            <li>
                                <strong>File:</strong> <a href="uploads/<?php echo htmlspecialchars($file); ?>" target="_blank"><?php echo htmlspecialchars($file); ?></a>
                            </li>
                        <?php endforeach; ?>
                </li><br>
            <?php endforeach; ?>
        </ul>
    <?php else : ?>
        <p>No uploaded topics found.</p>
    <?php endif; ?>

</body>
</html>
