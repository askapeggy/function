<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        //session_start();
        if(!isset($_SESSION['login']))
        {
            if(!isset($_POST['account']) || !isset($_POST['password']))
            {
                header("location:Login.php");
                exit();
            }
        }
        $a1 = 'aska';
        $p1 = 'aska';
        if($_POST['account'] == $a1 && $_POST['password'] == $p1)
        {
            //$_SESSION['login']=$_POST['account'];
            echo "登入成功";
            echo "<br><a href='Login.php'>回首頁</a>";
            setcookie("login", $_POST['account'], time()+180);
        }else
        {
            echo "帳密錯誤:登入失敗";
            echo "<br><a href='Login.php'>回首頁</a>";
        }
    ?>
</body>
</html>