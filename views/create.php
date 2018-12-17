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
<div class="create form-component">
    <h3 class="form-element form-title">Create</h3>
    <form class="form" name="create" method="post" onsubmit="return validate()" action="/create/create">
        <input class="form-element input-field" id="appname" type="text" name="appname" maxlength="50" value="" placeholder="app name">
        <input class="form-element input-field" id="username" type="text" name="username" maxlength="50" value="" placeholder="username">
        <input class="form-element input-field" id="email" type="email" name="email" maxlength="50" value="" placeholder="email">
        <input class="form-element input-field" id="password" type="password" name="password" maxlength="255" value="" placeholder="password">
        <input class="form-element input-field" id="password-repeat" type="password" name="password-repeat" maxlength="255" value="" placeholder="repeat password">
        <div class="form-buttons">
            <a href="/home" class="form-button">Cancel</a>
            <input class="form-element form-button" type="submit" name="create" value="Save">
        </div>
    </form>
    <p id="error-message"></p>
</div>