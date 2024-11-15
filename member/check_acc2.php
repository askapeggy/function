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
                header("location:Login2.php");
                exit();
            }
        }
        $dsn = "mysql:host=localhost;charset=utf8;dbname=crud;";
        $pdo = new PDO($dsn, 'root', '');

        $acc = htmlspecialchars(trim($_POST['account']));
        $pw = htmlspecialchars(trim($_POST['password']));
        $sql = "SELECT count(id) FROM `member` WHERE `member`.`acc`='{$acc}' and `member`.`pw`= '{$pw}';";
        //echo $sql;
        $row = $pdo->query($sql)->fetchColumn();
        if($row == 1)
        {
            echo "登入成功";
            header("location:success.php");
        }
        else
        {
            echo "帳密錯誤:登入失敗";
            header("location:Login2.php?err=1");
            echo "<br><a href='Login2.php?err=1'>回首頁</a>";
        }
        /*
        echo "<pre>";
        print_r($row);
        echo "</pre>";
        */
        /*
        if($row != null)
        {
            if($acc == $row['acc'] && $pw==$row['pw'])
                echo "登入成功";
            else
                echo "帳密錯誤:登入失敗";
        }else
        {
            echo "帳密錯誤:登入失敗";
        }
            */
        echo "<br><a href='Login2.php'>回首頁</a>";
    ?>
</body>
</html>