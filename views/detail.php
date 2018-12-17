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

if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] == false) {
    header('Location: /login');
}

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
            // determines which element should be copied
            if(target === 'password') {
                return copyStringToClipboard(password)
            }
            //gets text from element
            let copyElement = document.getElementById(target);
            let copyString = copyElement.textContent || copyElement.innerText;

            copyStringToClipboard(copyString);
        }
    </script>
<?php
    //entschlüsseln des passworts
    function decrypt($passwordEncrypted) {
        $config = require '../config.php';
        $key = $config['key'];
        $tag = $config['tag'];
        $iv = $config['iv'];
        $cipher = "aes-256-cbc";
        if (in_array($cipher, openssl_get_cipher_methods()))
        {
            return openssl_decrypt($passwordEncrypted, $cipher, $key, $options=0, $iv);
        }
    }
    $logins = $_SESSION['activedetail'];
        if ($logins->num_rows == 1) {
            // output data of each row
            $row = $logins->fetch_object();

            $_SESSION['password'] = $row->userpassword;

            echo '<script>let password = "'. decrypt($_SESSION['password']) .'"; passwordshown = false; </script>
            <div class="card-detail">
            <a class="home-arrow" href="/home"><img class="header-img" src="/images/back.svg"></a>
            <div class="detail-header">
                <h1 class="detail-title">' . htmlspecialchars($row->appname) . '</h1> 
                <div class="detail-icons">
                    <a href="/update?appid=' . $_GET['appid'] . '"><img class="detail-icon" alt="update" src="/images/update.svg"></a>
                    <a href="/delete?appid=' . $_GET['appid'] . '"><img class="detail-icon" alt="delete" src="/images/delete.svg"></a>
                </div>
            </div>
            <p class="detail-label">E-Mail:</p>
            <div class="card-property">
                <h3 class="detail-value" id="useremail">' . htmlspecialchars($row->useremail) . '</h3>
                <button class="detail-button" onclick="copyToClipboard(`useremail`);">Copy</button>
            </div>
    
            <p class="detail-label">Username:</p>
            <div class="card-property">
                <h3 class="detail-value" id="username">' . htmlspecialchars($row->username) . '</h3>
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
            // warning is displayed when app doesn't exist
            header('Location: /home');
        }

    ?>
</div>
