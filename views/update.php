<script type="text/javascript">
    function validate()
    {
        //validates all inputs and desplays errormessages
        let errormessage = document.getElementById("error-message");
        let appname = document.getElementById( "appname" );
        let username = document.getElementById( "username" );
        let email = document.getElementById("email")
        let password = document.getElementById( "password" );
        let passwordrepeat = document.getElementById( "password-repeat" );

        if( appname.value == "") {
            errormessage.innerHTML="The appname must contain a value"
            return false
        }

        if(username.value == "" && email.value == "") {
            errormessage.innerHTML="The username or email must contain a value"
            return false
        }

        if(password.value == "") {
            errormessage.innerHTML="The password must contain a value"
            return false
        }

        if ( password.value != passwordrepeat.value) {
            errormessage.innerHTML="The passwords must be equal";
            return false
        }

        else {
            return true;
        }
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

    $app = $_SESSION['activedetail'];
    if($app->num_rows == 1) {
        $row = $app->fetch_object();
        $action = '/update/update?appid=' . $_GET['appid'];
        echo '<div class="update form-component">
            <h3 class="form-element form-title">Update</h3>
            <form class="form" name="update" method="post" onsubmit="return validate()" action="' . $action  . '" >
                <input class="form-element input-field" id="appname" type="text" name="appname" maxlength="50" value="' . htmlspecialchars($row->appname) . '" placeholder="app name">
                <input class="form-element input-field" id="username" type="text" name="username" maxlength="50" value="' . htmlspecialchars($row->username) . '" placeholder="username">
                <input class="form-element input-field" id="email" type="email" name="email" maxlength="50" value="' . htmlspecialchars($row->useremail) . '" placeholder="email">
                <input class="form-element input-field" id="password" type="password" name="password" maxlength="255" value="' . htmlspecialchars(decrypt($row->userpassword)) . '" placeholder="password">
                <input class="form-element input-field" id="password-repeat" type="password" name="password-repeat" value="" placeholder="repeat password">
                <div class="form-buttons">
                    <a href="/detail?appid=' . $_GET['appid'] . '" class="form-button">Cancel</a>
                    <input class="form-element form-button" type="submit" name="update" value="Save">
                </div>
            </form>
            <p id="error-message"></p>
        </div>';
    }
    else {
        echo "no detail with id: " . $_GET['appid'] . " found";
        echo '<a class="detail-error-button form-button" href="/home">Back to Overview</a>';
    }
?>