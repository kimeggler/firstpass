<?php
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
    <script>
        
        function togglePassword() {
            let passwordField = document.getElementById('password');
            passwordField.innerHTML='<?php
                if(!isset($_SESSION["passwordshown"])) {
                    $_SESSION["passwordshown"] = true;
                    return $_SESSION["password"];
                }
                else if(isset($_SESSION["passwordshown"]) && $_SESSION["passwordshown"] == true) {
                    $_SESSION["passwordshown"] = false;
                    return str_repeat("*", strlen($_SESSION["password"]));
                }
                else if(isset($_SESSION["passwordshown"]) && $_SESSION["passwordshown"] == false) {
                    $_SESSION["passwordshown"] = false;
                    return $_SESSION["password"];
                }
            ?>';
            console.log("asdf");
        }
    </script>
<?php
    $logins = $_SESSION['activedetail'];
        if ($logins->num_rows == 1) {
            // output data of each row
            $row = $logins->fetch_object();

            $_SESSION['password'] = $row->userpassword;

            echo '<h2>' . $row->appname . '</h2>
            <div class="card-detail">
            <p class="detail-label">E-Mail:</p>
            <div class="card-property">
                <h3 class="detail-value">' . $row->useremail . '</h3>
                <button class="detail-button">Copy</button>
            </div>
    
            <p class="detail-label">Username:</p>
            <div class="card-property">
                <h3 class="detail-value">' . $row->username . '</h3>
                <button class="detail-button">Copy</button>
            </div>
    
            <p class="detail-label">Password:</p>
            <div class="card-property">
                <h3 class="detail-value" id="password">' .  str_repeat('*', strlen($_SESSION['password'])) . '</h3>
                <button class="detail-button" onclick="togglePassword()">Show</button>
                <button class="detail-button">Copy</button>
            </div>
        </div>';

        } else {
            echo "0 results";
        }

    ?>
</div>
