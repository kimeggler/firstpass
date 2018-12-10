<?php


if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
    echo var_dump($_SESSION);
} else {
    echo var_dump($_SESSION);
}

/**
 * Created by PhpStorm.
 * User: begglk
 * Date: 04.12.2018
 * Time: 11:48
 */
include "./../lib/DBConnection.php";

$DBConnection = new DBConnection();
$DBConnection->connect();

?>

<h1>hello there</h1>

