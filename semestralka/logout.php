<?php
/**
 * Created by PhpStorm.
 * User: kuba
 * Date: 12/01/2018
 * Time: 00:39
 */

session_start();

unset($_SESSION[session_id()]);

header("Location: http://wa.toad.cz/~trmaljak");
