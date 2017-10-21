<?php
    $n = $er = "";
    
    if(isset($_POST['name']) and !empty($_POST['name'])){
        $n = $_REQUEST['name'];
    }
    else{
        $er = "hoy nai...";
    }
?>


<form action="tmp.php" method="POST">
    <input name = "name"/>
    <input type="submit" />
    <?php echo $er; ?>
</form>

<?php
    echo $n;
?>
