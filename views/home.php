<?php


if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
    echo var_dump($_SESSION);
} else {
    header('Location: /login');
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

<div class="container">
    <h3>Mainpage</h3>
    <div class="credential-wrapper">
        <div class="credential"></div>
        <div class="credential"></div>
        <div class="credential"></div>
        <div class="credential"></div>
        <div class="credential"></div>
        <div class="credential"></div>
        <div class="credential"></div>
        <div class="credential"></div>
    </div>
</div>

