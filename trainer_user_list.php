<?php
include 'connect.php';

$sql = "SELECT firstName, lastName FROM tusers";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    echo " <style>

h1{
    font-size: 40px;
    padding: 25px;   
}

body{
    background-color: antiquewhite;
    color: #442c14;
}

table{
    border-collapse: collapse;
   width: 35%;
}

td,tr,th{
    padding: 10px;
    font-size: 20px;
}
        #signup{
            display: inline-block;
            position: absolute;
            top:100px
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
            color: rgb(69, 37, 16); 
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
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
            text-decoration:underline;
        }
        span{
            font-family: 'Times New Roman', Times, serif;
        }
        
</style> ";
        echo "<img class='img' src='images/image2.png' alt='text'>";
        echo "<div class='logo'>";
        echo "<h3 id='questhive'><span>Q</span>uesthive</h3>";
        echo "<h4 class='head'>Learn to lead</h4>";
        echo "<div class='game'>";
        echo     "<a class='f0' href='admin_UM.php' >Back</a>";
        echo     "</div>";
        echo "</div>"; 
        echo "<h1 >Trainer User List</h1>";
        echo "<table  border='2'>";
        echo "<tr ><th >UserName</th></tr>";
    
        while($row = $result->fetch_assoc()) {
            echo "<tr ><td >" . $row["firstName"]." "   . $row["lastName"] . "</td></tr>";
        }
    
        echo "</table>";
    } else {
        echo "No users found.";
    }

$conn->close();
?>
