<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>我是登入頁面</title>
    <style>
    body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            margin-bottom: 20px;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        input[type="reset"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="reset"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <?php
        //session_start();
        //if(isset($_SESSION['login']))
        if(isset($_COOKIE['login']))
        {
            echo "你已登入";
            exit();
        }
    ?>
    <!--<h1>輸入帳戶密碼<h1>-->
    <form action="check_acc.php" method="POST">
        <label for="username">帳號:</label>
        <input type="text" id="account" name="account" required>

        <label for="password">密碼:</label>
        <input type="password" id="password" name="password" required>
        <input type="submit" value="登入">
        <div>
            <a style="text-align: center;" href="index.html">回首頁</a>
        </div>
            <!--
    <div>
    <lable for="height">帳號:</lable> 
        <input type="text" name="account" id="account">
    </div>
    <div>
        <lable for="weight">密碼:</lable> 
        <input type="password" name="password" id="password">
    </div>
    <div>
        <input type="submit" value="送出">
        <input type="reset" value="清空">
    <div>
    -->
    </form>
    
</body>
</html>