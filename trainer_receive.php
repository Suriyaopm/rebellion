<?php

if (!isset($_SESSION['curriculums'])) {
    $_SESSION['curriculums'] = [];
}

$jsonDir = 'json';
$jsonFilePath = $jsonDir . '/requests.json';

if (isset($_POST['delete_request'])) {
    $indexToDelete = $_POST['delete_request'];

    if (isset($_POST['request_type']) && $_POST['request_type'] === 'question') {
        if (!is_dir($jsonDir)) {
            mkdir($jsonDir, 0755, true);
        }

        $requests = file_exists($jsonFilePath) ? json_decode(file_get_contents($jsonFilePath), true) : [];
        
        if (isset($requests[$indexToDelete])) {
            unset($requests[$indexToDelete]);
            file_put_contents($jsonFilePath, json_encode(array_values($requests)));
        }
    }
    
    if (isset($_POST['request_type']) && $_POST['request_type'] === 'curriculum') {
        if (isset($_SESSION['curriculums'][$indexToDelete])) {
            unset($_SESSION['curriculums'][$indexToDelete]);
            $_SESSION['curriculums'] = array_values($_SESSION['curriculums']);
        }
    }
}

$requests = file_exists($jsonFilePath) ? json_decode(file_get_contents($jsonFilePath), true) : [];
session_start();
if (!isset($_SESSION['curriculums'])) {
    $_SESSION['curriculums'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['pdf_file'])) {
    $curriculumName = $_POST['curriculum_name'];
    $file = $_FILES['pdf_file'];

    if ($file['type'] === 'application/pdf') {
        $uploadDir = 'caraxes/';
        $uploadFile = $uploadDir . basename($file['name']);

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        if (move_uploaded_file($file['tmp_name'], $uploadFile)) {
            $_SESSION['curriculums'][] = ['name' => $curriculumName, 'file' => $uploadFile];
        } else {
            $error = "Error uploading the file.";
        }
    } else {
        $error = "Please upload a valid PDF file.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requests and Submissions</title>
    <style>
        body {
            background-color: antiquewhite;
        }
        h1 {
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }
        p {
            font-size: 1.1rem;
        }
        button {
            height: 30px;
            width: 110px;
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
            <a class="f0" href="trainer_page.php" >Back</a>
        </div>
    </div> 
    <h1>Question Paper Requests</h1>
    <?php if (!empty($requests)) : ?>
        <ul>
            <?php foreach ($requests as $index => $request) : ?>
                <li>
                    <p><strong>Name:</strong> <?php echo htmlspecialchars($request['user_name']); ?><br></p>
                    <p><strong>Question Paper Details:</strong> <?php echo htmlspecialchars($request['question_details']); ?><br></p>
                    <form method="post" style="display:inline;">
                        <input type="hidden" name="delete_request" value="<?php echo $index; ?>">
                        <input type="hidden" name="request_type" value="question">
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this request?');">Delete</button>
                    </form>
                </li>
            <?php endforeach; ?>
        </ul><br>
    <?php else : ?>
        <p>No requests found.</p>
    <?php endif; ?>

    <h1>Test Submissions</h1>
    <?php if (!empty($_SESSION['curriculums'])) : ?>
        <ul>
            <?php foreach ($_SESSION['curriculums'] as $index => $curriculum) : ?>
                <li>
                    <p><strong>Curriculum Name:</strong> <?php echo htmlspecialchars($curriculum['name']); ?></p>
                    <p><strong>Uploaded PDF File:</strong> <a href="<?php echo htmlspecialchars($curriculum['file']); ?>" target="_blank">View PDF</a></p>
                    <form method="post" style="display:inline;">
                        <input type="hidden" name="delete_request" value="<?php echo $index; ?>">
                        <input type="hidden" name="request_type" value="curriculum">
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this curriculum?');">Delete</button>
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else : ?>
        <p>No curriculums uploaded. Please upload a curriculum first.</p>
    <?php endif; ?>
</body>
</html>
