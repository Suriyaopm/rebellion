
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paragraph results</title>


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
            font-size: 16px;
            text-transform: capitalize;
            color: rgb(210, 236, 236);
            background-color: #442c14;
            
        }
        button:hover{
            background-color: #8c6843;
        }
        a{
            color: #442c14;
            font-size: 20px;  
            float: right;
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

        #back
        {
            margin-left: 1200px;
        }
        .list{
            margin-left:93px;
        }
        
    </style>
</head>

<body>
    

    <div class="logo">
        <img class="img" src="images/image2.png" alt="text">
        <h3 id="questhive"><span>Q</span>uesthive</h3>
        <h4 class="head">Learn to lead</h4> 
        <a href="paragraph.php" id="back">Back</a>
    </div>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputText = $_POST["itext"];
    $testType = escapeshellarg($_POST["test_type"]);
    $noOfQues = escapeshellarg($_POST["noq"]);

    $tmpFile = tempnam(sys_get_temp_dir(), 'input_');
    file_put_contents($tmpFile, $inputText);

    $command = "python3 py_files/generate_para.py " . escapeshellarg($tmpFile) . " $testType $noOfQues";
    $output = shell_exec($command);

    unlink($tmpFile);

    $result = json_decode($output, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        echo "<h3>JSON Error: " . json_last_error_msg() . "</h3>";
    }

    if (isset($result['error'])) {
        echo "<h3>Error: " . $result['error'] . "</h3>";
    } else {
        echo "<br><br><br><br><br>";
        echo "<h3>Generated Questions:</h3>";
        echo "<div id='generated-content'>";
        echo "<ul class='list'>";
        if ($testType == "subjective") {
            foreach ($result['questions'] as $index => $question) {
                echo "<li><strong>Question:</strong> " . $question . "</li>";
            }
            foreach ($result['answers'] as $index => $answers){
                echo "<li><strong>Answers:</strong> " . $answers . "</li>";
            }
        } else {
            foreach ($result['questions'] as $question) {
                echo "<li><strong>Question:</strong> " . $question . "</li><br>";
            }
        }
        echo "</ul>";
        echo "</div>";
    }
}
?>

<div id="buttons">
    <button onclick="printPage()">Print</button>
    <button onclick="downloadPDF()">PDF</button>
    <button onclick="downloadExcel()">Excel</button>
    <button onclick="downloadCSV()">CSV</button>
    <button onclick="copyToClipboard()">Clipboard</button>
</div>

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
        filename: 'GeneratedQuestions.pdf',
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
    XLSX.utils.book_append_sheet(workbook, sheet, 'Questions');

    XLSX.writeFile(workbook, 'GeneratedQuestions.xlsx');
}

function downloadCSV() {
    const content = document.getElementById('generated-content').innerText;
    const blob = new Blob([content], { type: 'text/csv' });
    const link = document.createElement('a');
    link.href = URL.createObjectURL(blob);
    link.download = 'GeneratedQuestions.csv';
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
</body></html>