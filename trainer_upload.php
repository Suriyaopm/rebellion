<?php
$jsonDir = 'json';
$jsonFilePath = $jsonDir . '/topics.json';
$uploadDir = 'uploads';

if (!is_dir($jsonDir)) {
    mkdir($jsonDir, 0755, true);
}

if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['upload'])) {
    $topicName = $_POST['topic'];
    $file = $_FILES['file'];

    if ($file['error'] === UPLOAD_ERR_OK) {
        $fileName = basename($file['name']);
        $targetPath = $uploadDir . '/' . $fileName;

        if (move_uploaded_file($file['tmp_name'], $targetPath)) {
            $topics = file_exists($jsonFilePath) ? json_decode(file_get_contents($jsonFilePath), true) : [];
            if (!isset($topics[$topicName])) {
                $topics[$topicName] = [];
            }
            $topics[$topicName][] = $fileName;
            file_put_contents($jsonFilePath, json_encode($topics));
        } else {
            echo "Error: Unable to move the uploaded file.";
        }
    } else {
        echo "Error: " . $file['error'];
    }
}

if (isset($_POST['delete'])) {
    $topicToDelete = $_POST['delete'];
    $fileToDelete = $_POST['file'];
    $filePath = $uploadDir . '/' . $fileToDelete;

    if (file_exists($filePath)) {
        unlink($filePath);
    }

    $topics = file_exists($jsonFilePath) ? json_decode(file_get_contents($jsonFilePath), true) : [];
    if (isset($topics[$topicToDelete])) {
        $topics[$topicToDelete] = array_filter($topics[$topicToDelete], function ($file) use ($fileToDelete) {
            return $file !== $fileToDelete;
        });

        if (empty($topics[$topicToDelete])) {
            unset($topics[$topicToDelete]);
        }

        file_put_contents($jsonFilePath, json_encode($topics));
    }
}

$topics = file_exists($jsonFilePath) ? json_decode(file_get_contents($jsonFilePath), true) : [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Topic</title>
    <style>
        body{
            background-color: antiquewhite;
        }
        .int{
            width: 200px;
            height: 30px;
        }
        label{
            font-size: 1.2rem;
            font-family:'Times New Roman', Times, serif;
        }
        .f2{
            height: 30px;
            width: 170px;
            border-width: 0px;
            box-shadow: 2px 2px 5px gray;
        }
        .f1{
            padding: 20px;
        }
        li{
            padding: 5px;
            font-size: 1.1rem;
        }
        .f3{
            height: 30px;
            width: 110px;
            border-width: 0px;
            box-shadow: 2px 2px 5px gray;
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
    <h1>Upload Topic</h1>
    <form class="f1" action="" method="post" enctype="multipart/form-data">
        <label for="topic">Topic Name:</label><br><br>
        <input class="int" type="text" name="topic" id="topic" required><br><br>
        
        <label for="file">Choose File:</label><br><br>
        <input type="file" name="file" id="file" required><br><br>
        
        <button class="f2" type="submit" name="upload">Upload</button>
    </form>

    <h2>Uploaded Topics</h2>
    <?php if (!empty($topics)) : ?>
        <ul class="">
            <?php foreach ($topics as $topic => $files) : ?>
                <li>
                    <strong>Topic:</strong> <?php echo htmlspecialchars($topic); ?>
                        <?php foreach ($files as $file) : ?>
                            <li>
                                <strong>File:</strong> <a href="<?php echo $uploadDir . '/' . htmlspecialchars($file); ?>" target="_blank"><?php echo htmlspecialchars($file); ?></a>

                            </li>
                        <?php endforeach; ?>
                </li>
                <form method="post" style="display:inline;">
                    <input type="hidden" name="delete" value="<?php echo htmlspecialchars($topic); ?>">
                    <input type="hidden" name="file" value="<?php echo htmlspecialchars($file); ?>"><br>
                    <button class="f3" type="submit">Delete</button>
                </form>
            <?php endforeach; ?>
        </ul>
    <?php else : ?>
        <p>No uploaded topics found.</p>
    <?php endif; ?>
</body>
</html>
