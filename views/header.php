<header>
    <h1 class="app-title">FirstPass</h1>
    <nav class="header-nav">
        <?php
        if(!isset($_SESSION['loggedIn'])){
            echo "<a class='nav-link' href='/login'>Login</a><a class='nav-link' href='/register'>Register</a>";
        }
        else if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == false){
            echo "<a class='nav-link' href='/login'>Login</a><a class='nav-link' href='/register'>Register</a>";
        }
        else {
            echo "<a class='nav-link' href='/logout'><img class='header-img' src='/images/user.svg'></a><a class='nav-link' href='/create'><img class='header-img' src='/images/plus-symbol.svg'></a>";
        }
        ?>
    </nav>
</header>