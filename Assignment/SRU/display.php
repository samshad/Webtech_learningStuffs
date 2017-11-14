<?php
    $file = fopen("docs.txt", "r");
    $flag = false;
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

                if($display == "Yes"){
                    $ans[count($ans)] = array($name, $profit);
                }
            }
        }
    }

    fclose($file);
?>

<html>
    <head>
    </head>
    <body>
        <fieldset>
            <legend>DISPLAY</legend>
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
                ?>
            </table>
        </fieldset>
    </body>
</html>
