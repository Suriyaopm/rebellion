<?php
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
    <title>Upload Test</title>
    <style>
        body{
            background-color: antiquewhite;
        }
        .button{
            height: 30px;
            width: 110px;
            border-width: 0px;
            box-shadow: 2px 2px 5px gray;
        }
        label{
            font-size: 1.1rem;
        }
        .f1{
            height: 30px;
            width: 200px;
        }
        h1{
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
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
    <h1>Upload Test</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="curriculum_name">Curriculum Name:</label><br><br>
        <input class="f1" type="text" name="curriculum_name" required><br><br>

        <label for="pdf_file">Upload PDF File:</label><br><br>
        <input type="file" name="pdf_file" accept=".pdf" required><br><br>

        <input class="button" type="submit" value="Submit">
    </form>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>
</body>
</html>
