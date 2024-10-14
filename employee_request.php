<?php
$jsonDir = 'json';
$jsonFilePath = $jsonDir . '/requests.json';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_request'])) {
    $userName = $_POST['user_name'];
    $questionDetails = $_POST['question_details'];

    if (!is_dir($jsonDir)) {
        mkdir($jsonDir, 0755, true);
    }

    $requests = file_exists($jsonFilePath) ? json_decode(file_get_contents($jsonFilePath), true) : [];

    $requests[] = [
        'user_name' => $userName,
        'question_details' => $questionDetails
    ];

    file_put_contents($jsonFilePath, json_encode($requests));

    header('Location: employee_request.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request a Question Paper</title>
    <style>
        body{
            background-color: antiquewhite;
        }
        label{
            font-size: 1.1rem;
        }
        h1{
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }
        .f1{
            width: 200px;
            height: 30px;
        }
        .f2{
            height: 300px;
            width: 500px;
        }
        .f3{
            padding: 20px;
        }
        button{
            height: 30px;
            width: 170px;
            border-width: 0px;
            box-shadow: 2px 2px 5px gray;
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
    <h1>Request a Question Paper</h1>
    <form class="f3" action="" method="post">
        <label for="user_name">Your Name:</label><br><br>
        <input class="f1" type="text" name="user_name" id="user_name" required><br><br>

        <label for="question_details">Question Paper Details:</label><br><br>
        <textarea class="f2" name="question_details" id="question_details" required></textarea><br><br>

        <button type="submit" name="submit_request">Submit Request</button>
    </form>
</body>
</html>
