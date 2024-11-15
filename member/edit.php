<?php
    /*
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    */
    /*
    $sql = "insert into `member`(`acc`, `pw`, `email`, `tel`) values(".
            "'" . $_POST[acc] . "'" .   
            "'" . $_POST[pw] . "'" .   
            "'" . $_POST[email] . "'" .   
            "'" . $_POST[tel] . "'"    
            . ")";
            */
    //做安全保護
    $acc = htmlspecialchars(trim($_POST['acc']));
    $pw = htmlspecialchars(trim($_POST['pw']));
    $email = htmlspecialchars(trim($_POST['email']));
    $tel = htmlspecialchars(trim($_POST['tel']));
    $sql="UPDATE `member` SET `acc`='{$_POST['acc']}',
                               `pw`='{$_POST['pw']}',
                             `email`='{$_POST['email']}',
                               `tel`='{$_POST['tel']}'
                               WHERE `id`='{$_POST['id']}'";

    $dsn = "mysql:host=localhost;charset=utf8;dbname=crud;";
    $pdo = new PDO($dsn, 'root', '');
    if($pdo->exec($sql))
    {
        header("location:success.php?status=1");
    }else
    {
        header("location:success.php?status=0");
    }
    $pdo = null;
?>