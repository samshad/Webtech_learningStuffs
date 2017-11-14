<?php
    $file = fopen("docs.txt", "r");
    $flag = false;
    $ans = array();

    if(isset($_REQUEST['search'])){
        $patt = trim($_REQUEST['patt']);

        if(!empty($patt)){
            $ans = array();
            while(!feof($file)){
                $in = fgets($file);

                if(!$flag){
                    $flag = true;
                }

                else{
                    $arr = explode(", ", $in);
                    if(count($arr) == 4){
                        $name = $arr[0];
                        $profit = (int)$arr[2] - (int)$arr[1];
                        $display = trim($arr[3]);

                        if(strpos($name, $patt) < strlen($name) and strpos($name, $patt) > -1){
                            if($_REQUEST['display'] == $display)
                                $ans[count($ans)] = array($name, $profit);
                        }
                    }
                }
            }
        }
    }

    var_dump($ans);
    fclose($file);
?>

<html>
    <head>
    </head>
    <body>
        <form action="search.php" method="POST">
            <fieldset>
                <legend>DISPLAY</legend>
                <input type="text" name="patt"/>
                <button type="submit" name="search">Search By Name</button>
                <select name="display">
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
                <hr>
                <table border = "1" padding = "1" align = "center">
                    <tr>
                        <td>
                            <h3>NAME</h3>
                        </td>
                        <td>
                            <h3>PROFIT</h3>
                        </td>
                    </tr>
                    <?php
                        foreach($ans as $dis){
                            echo "<tr>";
                                echo "<td>" . $dis[0] . "</td>";
                                echo "<td>" . $dis[1] . "</td>";
                            echo "</tr>";
                        }
                        $ans = array();
                    ?>
                </table>
            </fieldset>
        </form>
    </body>
</html>
