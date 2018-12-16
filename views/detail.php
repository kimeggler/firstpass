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
            passwordshown = !passwordshown;
            return passwordshown ? passwordField.innerHTML = password : passwordField.innerHTML = '****';
        }

        function copyStringToClipboard (str) {
            // Create new element
            var el = document.createElement('textarea');
            // Set value (string to be copied)
            el.value = str;
            // Set non-editable to avoid focus and move outside of view
            el.setAttribute('readonly', '');
            el.style = {position: 'absolute', left: '-9999px'};
            document.body.appendChild(el);
            // Select text inside element
            el.select();
            // Copy text to clipboard
            document.execCommand('copy');
            // Remove temporary element
            document.body.removeChild(el);
        }

        function copyToClipboard(target) {
            if(target === 'password') {
                return copyStringToClipboard(password)
            }
            let copyElement = document.getElementById(target);
            let copyString = copyElement.textContent || copyElement.innerText;

            copyStringToClipboard(copyString);
        }
    </script>
<?php
    $logins = $_SESSION['activedetail'];
        if ($logins->num_rows == 1) {
            // output data of each row
            $row = $logins->fetch_object();

            $_SESSION['password'] = $row->userpassword;

            echo '<script>let password = "'. $_SESSION['password'] .'"; passwordshown = false; </script>
            <div class="card-detail">
            <h1 class="detail-title">' . $row->appname . '</h1>
            <p class="detail-label">E-Mail:</p>
            <div class="card-property">
                <h3 class="detail-value" id="useremail">' . $row->useremail . '</h3>
                <button class="detail-button" onclick="copyToClipboard(`useremail`);">Copy</button>
            </div>
    
            <p class="detail-label">Username:</p>
            <div class="card-property">
                <h3 class="detail-value" id="username">' . $row->username . '</h3>
                <button class="detail-button" onclick="copyToClipboard(`username`);">Copy</button>
            </div>
    
            <p class="detail-label">Password:</p>
            <div class="card-property">
                <h3 class="detail-value" id="password">****</h3>
                <button class="detail-button" onclick="togglePassword();">Show</button>
                <button class="detail-button" onclick="copyToClipboard(`password`);">Copy</button>
            </div>
        </div>';

        } else {
            echo "no detail with id: " . $_GET['appid'] . " found";
            echo '<a class="detail-error-button form-button" href="/home">Back to Overview</a>';
            echo "Encryption Key: ". base64_encode(openssl_random_pseudo_bytes(32));
        }

    ?>
</div>
