

<div class="login form-component">
    <canvas id="gradient" height="35" width="35"></canvas>
        <h3 class="form-element form-title">Login</h3>
        <form class="form" name="login" method="post" action="/login/signIn">
            <input class="form-element input-field" type="text" name="username" value="" placeholder="username">
            <input class="form-element input-field" type="password" name="password" value="" placeholder="password">
            <div class="form-buttons">
                <input class="form-element form-button" type="reset" value="Reset">
                <input class="form-element form-button" type="submit" name="login" value="Login">
            </div>  
        </form>
        <?php if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == false){
            echo "<label class='error-message'>*false credentials</label>";
        }
        else if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true){
            header('Location: /home');
        }?>
    </div>
</div>