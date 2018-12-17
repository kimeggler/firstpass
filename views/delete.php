<script type="text/javascript">
    function validate()
    {
        let errormessage = document.getElementById("error-message");
        let apptitle = document.getElementById('apptitle');
        let appname = document.getElementById( "appname" );

        if ( apptitle.innerText != appname.value) {
            errormessage.innerHTML="*app title doesn't match!";
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
        $action = '/delete/delete?appid=' . $_GET['appid'];
        echo '<div class="delete form-component">
            <a class="home-arrow" href="/home"><img class="header-img" src="/images/back.svg"></a>
            <h3 class="form-element form-title">Delete</h3>
            <form class="form" name="update" method="post" onsubmit="return validate()" action="' . $action  . '" >
            <h1 class="detail-title" id="apptitle">' . $row->appname . '</h1>
            <p class="detail-label">Enter name of app to delete it!</p>
                <input class="form-element input-field" id="appname" type="text" name="appname" value="" placeholder="app name">
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