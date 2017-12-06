

<?php
include 'lib/files.php';
    // predvyplnovani formulare pokud byl uz nekdy vyplneny
    // v action vola sebe sama
    $jmeno = "";
    $errorJmeno = "";
    if (isset($_POST["jmeno"])) {
        $jmeno = $_POST["jmeno"];
        $errorJmeno = "spatne vyplneno";
	print_r("zadano: " + $jmeno);
    	add_data($jmeno);
	load_by_id("5a157553365c9");
    }
?>


<form
    method="post"
    action="form.php" 
>
    Jmeno: 
    <input name="jmeno" value ="<?php echo htmlspecialchars($jmeno); ?>"/>
    <input id="submit" value="Odeslat" type="submit"/>

    <?php echo $errorJmeno; ?>

</form>
