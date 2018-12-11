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

        if(passwordrepeat.value == "") {
            errormessage.innerHTML="The password must be repeated"
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
<div>
    <div>
        <form name="create" method="post" onsubmit="return validate()" action="/create/create">
            <input id="appname" type="text" name="appname" value="" placeholder="app name">
            <input id="username" type="text" name="username" value="" placeholder="username">
            <input id="email" type="email" name="email" value="" placeholder="email">
            <input id="password" type="password" name="password" value="" placeholder="password">
            <input id="password-repeat" type="password" name="password-repeat" value="" placeholder="repeat password">
            <div class="form-buttons">
                <input name="cancel" type="reset" value="Cancel">
                <input type="submit" name="create" value="Save">
            </div>
        </form>
        <p id="error-message"></p>
    </div>
</div>