<?php


if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
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
        <?php
        $logins = $_SESSION['logins'];
            if ($logins->num_rows > 0) {
                // output data of each row
                while($row = $logins->fetch_assoc()) {
                    $account = $row["username"];
                    if($account == "")
                    {
                        $account = $row["email"];
                    }
                    echo '<div class=\"card\">
                            <h2 class=\"card-title\">' . $row["appname"] . '</h2>
                            <h3 class=\"card-username\">' . $account . '</h3>
                          </div>';
                }
            } else {
                echo "0 results";
            }

        ?>


    </div>
</div>

