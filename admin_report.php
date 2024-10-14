<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Issue</title>
    <style>
        body{
            background-color: antiquewhite;
        }
        p{
            font-size: 1.1rem;
        }
        button{
            height: 30px;
            width: 170px;
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
        a{
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
        a:hover{
            text-decoration: underline;
        }
                
    </style>
</head>
<body>
    <img class="img" src="images/image2.png" alt="text">
    <div class="logo">
        <h3 id="questhive"><span>Q</span>uesthive</h3>
        <h4 class="head">Learn to lead</h4>
        <div class="game">
        <a  href="admin_page.php" id="logoutButton">Back</a>
        </div>
    </div> 
    <h1>Reports</h1>
    <ul id="responsesList1"></ul>
    <script>
        var responses1 = JSON.parse(localStorage.getItem('responses1')) || [];

        var responsesList1 = document.getElementById('responsesList1');

        function displayResponses() {
            responsesList1.innerHTML = '';

            responses1.forEach(function(response1, index) {
                var listItem = document.createElement('li');
                listItem.innerHTML = `<p><strong>Name:</strong> ${response1.name}</p>
                                      <p><strong>Report:</strong> ${response1.text}</p>
                                      <p><button onclick="deleteResponse(${index})">Delete</button></p>`;
                responsesList1.appendChild(listItem);
            });
        }

        function deleteResponse(index) {
            responses1.splice(index, 1);
            localStorage.setItem('responses1', JSON.stringify(responses1));
            displayResponses();
        }

        displayResponses();
    </script>
</body>
</html>