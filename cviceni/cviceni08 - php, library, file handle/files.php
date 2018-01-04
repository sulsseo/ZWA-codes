<?php
/*
    Knihovna pro praci se soubory
*/

// soubor se kterym pracuju - lokace alternativy databaze
$f = "database";

// struktura dat
$data = array (
	array("jmeno" => "jarda"),
	array("jmeno" => "jana")
);

/* funkce pro nacteni serializovanych dat ze souboru */
function load() {
    global $f;
    return unserialize(file_get_contents($f));
}

/* funkce pro ukladani dat do souboru(serializovane) */
function save($data) {
    global $f;
    file_put_contents($f, serialize($data));
}

/* do existujicich strukturovanych dat ulozit dalsi zaznam s unikatnim id */
function add_data($jmeno) {
    $data = load();
    $new_data = array(
        "jmeno" => $jmeno,
        "id" => uniqid()
    );
    $data[] = $new_data;
    save($data);
}

/* vypsat vsechna ulozena data */
function print_data() {
    print_r(load());
}

/* nacist zaznam podle jednoznacneho id */
function load_by_id($id) {
    // TODO

    global $f;
    $data = unserialize(file_get_contents($f));
    return array_search($id, $data);
}

function delete_by_id($id) {
    // TODO
}

?>