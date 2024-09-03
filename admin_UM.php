<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin User Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
            margin: 0;
        }

        .container {
            text-align: center;
        }

        .button {
            display: inline-block;
            padding: 15px 30px;
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s, transform 0.3s;
            margin: 10px;
        }

        .button:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }

        .button:active {
            background-color: #00408d;
            transform: translateY(1px);
        }

        .button.add-employee {
            background-color: #28a745;
        }

        .button.add-employee:hover {
            background-color: #218838;
        }

        .button.add-employee:active {
            background-color: #1e7e34;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="t_register.php" class="button">Add Trainer</a>
        <a href="e_register.php" class="button">Add Employee</a>
        <a href="t_remove.php" class="button">Remove Trainer</a>
        <a href="e_remove.php" class="button">Remove Employee</a>
        <a href="trainer_user_list.php" class="button">Trainer List</a>
        <a href="employee_user_list.php" class="button">Employee List</a>
    </div>
</body>
</html>

