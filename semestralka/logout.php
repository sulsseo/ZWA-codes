<?php
/**
 * Created by PhpStorm.
 * User: kuba
 * Date: 12/01/2018
 * Time: 00:39
 */

ob_start();
session_start();

unset($_SESSION[session_id()]);

sleep(1);

header("Location: http://wa.toad.cz/~trmaljak");
