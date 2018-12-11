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
<div class="detail">
    <h2>Application Name</h2>
    <div class="card-detail">
        <p class="detail-label">E-Mail:</p>
        <div class="card-property">
            <h3 class="detail-value">myEMail</h3>
            <button class="detail-button">Copy</button>
        </div>

        <p class="detail-label">Username:</p>
        <div class="card-property">
            <h3 class="detail-value">myUsername</h3>
            <button class="detail-button">Copy</button>
        </div>

        <p class="detail-label">Password:</p>
        <div class="card-property">
            <h3 class="detail-value">myInvisiblePassword</h3>
            <button class="detail-button">Copy</button>
            <button class="detail-button">Show</button>
        </div>
    </div>
</div>