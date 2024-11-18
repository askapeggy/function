<style>
    *
    {
        font-family:'courier new';
    }
</style>
<?php
    function shape($s, $n)
    {
        switch($s)
        {
            case "三角形":
                starts($n);
                break;
            case "菱形":
                Rhombus($n);
                break;
        }
    }

    function starts($n)
    {
        for($i=0; $i < $n; $i++)
        {
            for($j = 0; $j < $n-($i+1); $j ++)
            {
                echo "&nbsp;";    
            }
            for($j = 0; $j < (($i*2)+1); $j++)
            {
                echo "*";
            }
            echo "<br>";
        }
    }

    function Rhombus($n)
    {
        $t = $n >> 1;
        for($i = 0; $i < $n; $i++)
        {
            ////////////////////////////////
            ///運算
            if($i>$t)
            {
                $k1 = $i - $t; //空白
                $j1 = 2*($i-(2*($i- $t)))+1; //實心
            }else
            {
                $k1 = $t - $i;//空白
                $j1 = (($i<<1)+1);//實心
            }
            ////////////////////////////////
            //畫圖
            for($k = 0; $k < $k1; $k++)
            {
                echo "&nbsp;";
            }
            for($j = 0; $j < $j1; $j++)
            {
                echo "*";
            }
            //////////////////////////////////
            echo "<br>";
        }
    }

    // 開啟資料庫
    // dbName 資料庫名稱
    // 回傳 PDO 物件
    function openDB($dbName)
    {
        $dsn="mysql:host=localhost;charset=utf8;dbname=$dbName";
        $pdo = new PDO($dsn,'root','');
        return $pdo;
    }
    // 回傳指定資料表資料
    // dbName 傳入資料庫名稱
    // table 傳入資料表
    function all($dbName, $table)
    {
        $sql = "select * from $table";
        return openDB($dbName)->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    // 回傳指定資料表特定ID的單筆資料    
    // dbName 傳入資料庫名稱
    // table 傳入資料表
    // id 找尋相同id資料  || array $id 資料表
    function find($dbName, $table, $id)
    {
        $sql = "select * from $table where ";
        if(is_array($id))
        {
            $tmp=[];
            foreach($id as $key=>$value)
            {
                $tmp[] = sprintf("`%s`='%s'", $key, $value);
            }
            $sql=$sql.join(" && ", $tmp);
        }else
        {
            //"DELETE FROM member WHERE `$table`.`id` = $id";
            $sql = $sql."`$table`.`id`=$id";
        }
        echo $sql;
        $row = openDB($dbName)->query($sql)->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    // 更新指定條件的資料
    // dbName 資料庫名稱
    // table 資料表名稱
    // array 修改資料
    // id 比對資料
    function update($dbName, $table, $array, $id)
    {
        $sql="update $table set ";
        $pdo = openDB($dbName);
        $tmp=[];
        foreach($array as $key => $value)
        {
            $tmp[] = "`$key`='$value'";
        }
        $sql=$sql . join(",", $tmp);
        if(is_array($id))
        {
            $tmp=[];
            foreach($id as $key=>$value)
            {
                $tmp[] = "`$key`='$value'";
            }
            $sql = $sql . " where " . join(" && ", tmp);
        }else
        {
            $sql = $sql . " where `id` = '$id'";
        }
        return $pdo->exec($sql);
    }

    // 新增資料
    // dbName 資料庫名稱
    // table 資料表名稱
    // data 要傳入資料
    //function insert($dbName, $table, $cols, $value)
    function insert($dbName, $table, $data)
    {
        $p = openDB($dbName);
        $sql = "insert into $table";
        //$sql = $sql. "($cols)";
        //$sql = $sql. " values ($values)";
        $keys=array_keys($data);
        $sql=$sql. "(`". join("`,`", $keys). "`) values ". "('". join("','", $data). "')";
        echo $sql;
        return $p->exec($sql);
    }

    // 刪除指定條件
    // dbName 資料庫名稱
    // table 資料表名稱
    // where 判斷條件式
    function del($dbName, $table, $id)
    {
        $p = openDB($dbName);
        //$sql = "delete from $table where `id` = '$id'";
        $sql = "DELETE FROM member WHERE `$table`.`id` = $id";
        /*
        $tmp=[];
        foreach($where as $key=>$value)
        {
            $tmp[] = sprintf("`%s`='%s'", $key, $value);
        }
        $sql=$sql.join(" && ", $tmp);
        */
        $p->exec($sql);
    }

    //列出陣列內容
    function myPrint($data)
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
?>
