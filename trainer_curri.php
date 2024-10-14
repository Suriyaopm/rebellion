<?php
if (!is_dir('json')) {
    mkdir('json', 0755, true);
}

$jsonFilePath = 'json/curricula.json';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['upload'])) {
    $courseName = $_POST['course_name'];
    $courseDesc = $_POST['course_desc'];
    $file = $_FILES['file'];

    if ($file['error'] === UPLOAD_ERR_OK) {
        $fileName = basename($file['name']);
        $targetPath = 'curricula/' . $fileName;

        if (!is_dir('curricula')) {
            mkdir('curricula', 0755, true);
        }

        if (move_uploaded_file($file['tmp_name'], $targetPath)) {
            $curricula = file_exists($jsonFilePath) ? json_decode(file_get_contents($jsonFilePath), true) : [];

            $curricula[] = [
                'course_name' => $courseName,
                'course_desc' => $courseDesc,
                'file' => $fileName
            ];

            file_put_contents($jsonFilePath, json_encode($curricula));
        } else {
            echo "Error: Unable to move the uploaded file.";
        }
    } else {
        echo "Error: " . $file['error'];
    }
}

if (isset($_POST['delete'])) {
    $indexToDelete = $_POST['delete'];
    $curricula = file_exists($jsonFilePath) ? json_decode(file_get_contents($jsonFilePath), true) : [];

    if (isset($curricula[$indexToDelete])) {
        $fileToDelete = $curricula[$indexToDelete]['file'];
        $filePath = 'curricula/' . $fileToDelete;

        if (file_exists($filePath)) {
            unlink($filePath);
        }

        unset($curricula[$indexToDelete]);
        file_put_contents($jsonFilePath, json_encode($curricula));
    }
}

$curricula = file_exists($jsonFilePath) ? json_decode(file_get_contents($jsonFilePath), true) : [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Curriculum</title>
    <style>
        body{
            background-color: antiquewhite;
        }
        .f1{
            padding: 20px;
        }
        .desc{
            height: 300px;
            width: 500px;
        }
        .int{
            width: 200px;
            height: 30px;
        }
        button{
            height: 30px;
            width: 170px;
            border-width: 0px;
            box-shadow: 2px 2px 5px gray;
        }
        label{
            font-size: 1.2rem;
            font-family:'Times New Roman', Times, serif;
        }
        .list{
            padding: 20px;
        }
        .formy{
            margin-top: 10px;
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
            <a class="f0" href="trainer_page.php" >Back</a>
        </div>
    </div> 
    <h1>Upload Curriculum</h1>
    <form class="f1" action="" method="post" enctype="multipart/form-data">
        <label for="course_name">Course Name:</label><br><br>
        <input class="int" type="text" name="course_name" id="course_name" required><br><br>
        
        <label for="course_desc">Course Description:</label><br><br>
        <textarea class="desc" name="course_desc" id="course_desc" required></textarea><br><br>
        
        <label for="file">Choose Curriculum File:</label><br><br>
        <input type="file" name="file" id="file" accept=".pdf, .docx" required><br><br>
        
        <button type="submit" name="upload">Upload Curriculum</button>
    </form>

    <h2>Uploaded Curricula</h2>
    <?php if (!empty($curricula)) : ?>
        <ul>
            <?php foreach ($curricula as $index => $curriculum) : ?>
                <li class="list">
                    <p><strong>Course Name:</strong> <?php echo htmlspecialchars($curriculum['course_name']); ?><br></p>
                    <p><strong>Description:</strong> <?php echo htmlspecialchars($curriculum['course_desc']); ?><br></p>
                    <p><strong>File:</strong> <a href="curricula/<?php echo htmlspecialchars($curriculum['file']); ?>" target="_blank"><?php echo htmlspecialchars($curriculum['file']); ?></a><br></p>
                    <form method="post" style="display:inline;">
                        <input type="hidden" name="delete" value="<?php echo $index; ?>">
                        <button  class="formy" type="submit">Delete</button>
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else : ?>
        <p>No curricula uploaded yet.</p>
    <?php endif; ?>
</body>
</html>