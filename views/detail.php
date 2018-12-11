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
    <h2>Application Name</h2>
    <div class="card-detail">
        <p class="label">E-Mail:</p>
        <div class="card-detail-flex">
            <h3 class="card-detail-value">myEMail</h3>
            <button class="card-button">Copy</button>
        </div>

        <p class="label">Username:</p>
        <div class="card-detail-flex">
            <h3 class="card-detail-value">myUsername</h3>
            <button class="card-button">Copy</button>
        </div>

        <p class="label">Password:</p>
        <div class="card-detail-flex">
            <h3 class="card-detail-value">myInvisiblePassword</h3>
            <button class="card-button">Copy</button>
            <button class="card-button">Show</button>
        </div>
    </div>
</div>