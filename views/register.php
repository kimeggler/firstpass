<script type="text/javascript">
    function validate()
    {
        let errormessage = document.getElementById("error-message");
        let username = document.getElementById( "username" );
        let password = document.getElementById( "password" );
        let passwordrepeat = document.getElementById( "password-repeat" );

        if( username.value == "" || password.value == "" || passwordrepeat.value == "") {
            errormessage.innerHTML="All fields must contain a value"
            console.log(1);
            return false
        }

        if ( password.value != passwordrepeat.value) {
            errormessage.innerHTML="The passwords must be equal";
            console.log(2);
            return false
        }

        else {
            return true;
        }
    }


</script>
<div class="register form-component">
    <canvas id="gradient" height="35" width="35"></canvas>
    <h3 class="form-element form-title">Register</h3>
    <form class="form" name="register" method="post" onsubmit="return validate()" action="/register/register">
        <input class="form-element input-field" id="username" type="text" name="username" maxlength="50" value="" placeholder="username">
        <input class="form-element input-field" id="password" type="password" name="password" maxlength="255" value="" placeholder="password">
        <input class="form-element input-field" id="password-repeat" type="password" name="password-repeat" value="" placeholder="repeat password">
        <div class="form-buttons">
            <input class="form-element form-button" name="cancel" type="reset" value="Cancel">
            <input class="form-element form-button" type="submit" name="register" value="Register">
        </div>
    </form>
    <p id="error-message"></p>
</div>