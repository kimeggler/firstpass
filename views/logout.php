
<?php
    $action = '/logout/delete';
    echo '<div class="logout form-component">
    <a class="home-arrow" href="/home"><img class="header-img" alt="go back" src="/images/back.svg"></a>
    <div class="form logout-field">
        <h1 class="detail-title" id="apptitle">Log out</h1>
        <a href="/logout/logout"><button class="form-button">Logout</button></a>
    </div>
        <form class="form logout-field" name="delete" method="post" action="' . $action  . '">
            <h1 class="detail-title" id="apptitle">Delete Account</h1>
            <p class="detail-label">Enter password to delete account</p>
            <input class="form-element input-field" id="password" type="password" name="password" value="" placeholder="password">
            <div class="form-buttons">
                <input class="form-element form-button" type="submit" name="delete" value="Delete">
            </div>
        </form>
    </div>';
?>