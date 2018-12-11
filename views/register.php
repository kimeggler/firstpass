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
        <form name="register" method="post" onsubmit="return validate()" action="/register/register">
            <input id="username" type="text" name="username" value="" placeholder="username">
            <input id="password" type="password" name="password" value="" placeholder="password">
            <input id="password-repeat" type="password" name="password-repeat" value="" placeholder="repeat password">
            <input name="cancel" type="reset" value="Cancel">
            <input type="submit" name="register" value="Register">
        </form>
        <p id="error-message"></p>
    </div>
</div>