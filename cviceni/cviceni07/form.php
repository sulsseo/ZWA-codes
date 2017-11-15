

<?php
    // predvyplnovani formulare pokud byl uz nekdy vyplneny
    // v action vola sebe sama
    $jmeno = "";
    $errorJmeno = ""; // datove promenne

    if (isset($_POST["jmeno"])) {
        $jmeno = $_POST["jmeno"];
        $errorJmeno = "spatne vyplneno";
        if (kontrola($jmeno)) {
            // ulozeni do DB

            // metodou get se presmeruje na jinou stranku - viz PRG
            header("Location: presmerovane.html");
            
        }
    }
?>


<form
    method="post"
    action="form.php" 
>
    Jmeno: 
    <input name="jmeno" value ="<?php echo htmlspecialchars($jmeno, ENT_QUOTES); ?>"/>
    <input id="submit" value="Odeslat" type="submit"/>

    <?php echo $errorJmeno; ?>

</form>
