<?php
function generate_mcqs($num_questions, $topic, $difficulty) {
    $command = escapeshellcmd("python3 py_files/generate_mcq.py $num_questions $topic $difficulty");
    $output = shell_exec($command);
    return json_decode($output, true);
}

$num_questions = isset($_POST['num_questions']) ? (int)$_POST['num_questions'] : 0;
$topic = isset($_POST['topic']) ? escapeshellarg($_POST['topic']) : '';
$difficulty = isset($_POST['difficulty']) ? escapeshellarg($_POST['difficulty']) : '';

$questions = generate_mcqs($num_questions, $topic, $difficulty);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generated MCQs</title>
    <style>
        body{
            background-color: antiquewhite;
            color: #442c14;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }
        h1{
            font-size: 38px;
            text-align: center;
        
            padding: 75px 400px;
            width: 50%;

        }
        .hed{
            margin-top: 10px;
            position: relative;
        }
        #generated-content{
            font-size: 20px;
        }
        button{
            padding: 10px;
            width:15%;
            color: rgb(210, 236, 236);
            text-transform: capitalize;
            font-size: 16px;
            background-color: #442c14;
            
        }
        button:hover{
            background-color: #8c6843;
        }
        a{
            color: #442c14;
            font-size: 20px;  
            float: left;
            padding: 20px;
            
        }
        a:hover{
            color: #ca9764;
        }
        .logo{
            display: flex;
            justify-content: space-between;
            color: rgb(69, 37, 16);
            margin-left: -10px;
            margin-bottom: 200px;
            position:absolute;
            
        }

        .img{
            width: 55px;
            height: 65px;
            margin-top: 0px;
            padding: 0px;
            margin-right: 20px;
            
        }
        #questhive{
            position: absolute;
            margin-top: 0px;
        }
        span{
            font-size: 44px;
        }
        h3{
            font-size: 28px;
            margin-left: 53px;
            
        }
        .game{
            
            float: right;
            margin-left: 1150px;
            padding: 0px;
            font-size: 24px
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

        #bank
        {
            margin-left: 1200px;
            float: right;
        }
        
    </style>
</head>
<body>
    <div class="logo">
        <img class="img" src="images/image2.png" alt="text">
        <h3 id="questhive"><span>Q</span>uesthive</h3>
        <h4 class="head">Learn to lead</h4> 
       
    
    <a href="mcq.php" id="bank">Back</a></div>
    <h1>Generated MCQ Questions</h1>
    <div id="generated-content">
        <ol>
        <?php if (!empty($questions)) : ?>
            <?php foreach ($questions as $question) : ?>
                <li>
                    <strong>Question:</strong> <?php echo htmlspecialchars($question['question']); ?>
                    <ol>
                        <?php foreach ($question['options'] as $option) : ?>
                            <li><?php echo htmlspecialchars($option); ?></li>
                        <?php endforeach; ?>
                    </ol>
                </li>
                <br>
            <?php endforeach; ?>
        <?php else : ?>
            <p>No questions were generated.</p>
        <?php endif; ?>
        </ol>
    </div>
    
    <div id="buttons">
        <button onclick="printPage()">Print</button>
        <button onclick="downloadPDF()">Download as PDF</button>
        <button onclick="downloadExcel()">Download as Excel</button>
        <button onclick="downloadCSV()">Download as CSV</button>
        <button onclick="copyToClipboard()">Copy to Clipboard</button>
    </div>

    <a href="mcq.php">Generate More Questions</a>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>
    <script>
        function printPage() {
            window.print();
        }

        function downloadPDF() {
            const content = document.getElementById('generated-content').innerHTML;
            const opt = {
                margin: 1,
                filename: 'GeneratedMCQs.pdf',
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
            };
            html2pdf().from(content).set(opt).save();
        }

        function downloadExcel() {
            const table = document.createElement('table');
            table.innerHTML = document.getElementById('generated-content').innerHTML;

            const sheet = XLSX.utils.table_to_sheet(table);
            const workbook = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(workbook, sheet, 'MCQs');

            XLSX.writeFile(workbook, 'GeneratedMCQs.xlsx');
        }

        function downloadCSV() {
            let csvContent = "Question,Option1,Option2,Option3,Option4\n";
            const questions = <?php echo json_encode($questions); ?>;
            questions.forEach(question => {
                let row = `"${question['question']}",`;
                row += question['options'].map(option => `"${option}"`).join(",");
                csvContent += row + "\n";
            });
            const blob = new Blob([csvContent], { type: 'text/csv' });
            const link = document.createElement('a');
            link.href = URL.createObjectURL(blob);
            link.download = 'GeneratedMCQs.csv';
            link.click();
        }

        function copyToClipboard() {
            const content = document.getElementById('generated-content').innerText;
            navigator.clipboard.writeText(content).then(function() {
                alert('Text copied to clipboard!');
            }, function(err) {
                alert('Failed to copy text: ', err);
            });
        }
    </script>
</body>
</html>