
<div>
    <div>
        <form name="login" method="post" action="/login/signIn">
            <input type="text" name="username" value="" placeholder="username">
            <input type="password" name="password" value="" placeholder="password">
            <button onclick="">Cancel</button>
            <input type="submit" name="login">
        </form>
        <?php if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == false){
            echo "<label>*false credentials</label>";
        }
        else if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true){
            header('Location: /home');
        }?>
    </div>
</div>