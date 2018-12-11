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
<div>
    <div>
        <h3 class="form-element form-title">Register</h3>
        <form class="form" name="register" method="post" onsubmit="return validate()" action="/register/register">
            <input class="form-element input-field" id="username" type="text" name="username" value="" placeholder="username">
            <input class="form-element input-field" id="password" type="password" name="password" value="" placeholder="password">
            <input class="form-element input-field" id="password-repeat" type="password" name="password-repeat" value="" placeholder="repeat password">
            <input class="form-element button" name="cancel" type="reset" value="Cancel">
            <input class="form-element button" type="submit" name="register" value="Register">
        </form>
        <p id="error-message"></p>
    </div>
</div>