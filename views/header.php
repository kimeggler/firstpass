<header>
    <h1>FirstPass</h1>
    <nav>
        <?php
        if(!isset($_SESSION['loggedIn'])){
            echo "<a class='nav-link' href='/login'>Login</a><a class='nav-link' href='/register'>Sign In</a>";
        }
        else if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == false){
            echo "<a class='nav-link' href='/login'>Login</a><a class='nav-link' href='/register'>Sign In</a>";
        }
        else {

        }
        ?>
    </nav>
</header>