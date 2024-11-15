<style>
    *
    {
        font-family:'courier new';
    }
</style>
<?php
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
?>
