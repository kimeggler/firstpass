<?php


if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
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
    <h1>Mainpage</h1>
    <div class="card-box">
        <div class="card">
            <h2 class="card-title">Application Title</h2>
            <h3 class="card-username">Username</h3>
        </div>
    </div>
</div>

