<script type="text/javascript">
    function validate()
    {
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
    $app = $_SESSION['activedetail'];
    if($app->num_rows == 1) {
        $row = $app->fetch_object();
        $action = '/update/update?appid=' . $_GET['appid'];
        echo '<div class="update form-component">
            <h3 class="form-element form-title">Update</h3>
            <form class="form" name="update" method="post" onsubmit="return validate()" action="' . $action  . '" >
                <input class="form-element input-field" id="appname" type="text" name="appname" value="' . $row->appname . '" placeholder="app name">
                <input class="form-element input-field" id="username" type="text" name="username" value="' . $row->username . '" placeholder="username">
                <input class="form-element input-field" id="email" type="email" name="email" value="' . $row->useremail . '" placeholder="email">
                <input class="form-element input-field" id="password" type="password" name="password" value="' . $row->userpassword . '" placeholder="password">
                <input class="form-element input-field" id="password-repeat" type="password" name="password-repeat" value="" placeholder="repeat password">
                <div class="form-buttons">
                    <input class="form-element form-button" name="cancel" type="reset" value="Cancel">
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