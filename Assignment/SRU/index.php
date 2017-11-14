<html>
    <head>
        <title>Lab Exam</title>
    </head>
    <body>
        <form action="formHandler.php" method="POST">
            <fieldset>
                <legend>PRODUCT</legend>
                <label>Name</label><br>
                <input type="text" name="name"/> <?php if(isset($_REQUEST['error'])) echo $_REQUEST['error']; ?><br>
                <label>Buying Price</label><br>
                <input type="text" name="bPrice"/><br>
                <label>Selling Price</label><br>
                <input type="text" name="sPrice"/>
                <?php if(isset($_REQUEST['perror'])) echo $_REQUEST['perror']; ?>
                <hr>
                <input type="checkbox" name="display"/> <label>Display</label>
                <hr>
                <button type="submit" name="submit">Save</button>
            </fieldset>
        </form>
    </body>
</html>
