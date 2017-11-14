<?php

    if(!file_exists('docs.txt')){
        $file = fopen("docs.txt", "w");
        fwrite($file, "Name, BPrice, SPrice, Display\r\n");
        fclose($file);
    }

    if(isset($_REQUEST['submit'])){
        $name = trim($_REQUEST['name']);
        $bPrice = trim($_REQUEST['bPrice']);
        $sPrice = trim($_REQUEST['sPrice']);

        if(empty($name)){
            header("Location: index.php?error='* Name is required !'");
            exit;
        }
        else if(!(strlen($name) > 3)){
            header("Location: index.php?error='* Name should be at least 4 characters long !'");
            exit;
        }
        else{
            if(!is_numeric($bPrice) or !is_numeric($sPrice)){
                header("Location: index.php?perror='* Should be valid numbers !'");
                exit;
            }
            else{
                $txt = $name . ", " . $bPrice . ", " . $sPrice . ", ";

                if(isset($_REQUEST['display'])){
                    $txt .= "Yes\r\n";
                }

                else $txt .= "No\r\n";


                $file = fopen("docs.txt", "a");

                fwrite($file, $txt);
                fclose($file);
                header("Location: index.php");
            }
        }
    }
?>
