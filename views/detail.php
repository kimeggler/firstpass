<?php 
    if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
    } else {
        header('Location: /login');
    }
?>


<div class="detail">
    <h2>Application Name</h2>
    <div class="card-detail">
        <p class="detail-label">E-Mail:</p>
        <div class="card-property">
            <h3 class="detail-value">myEMail</h3>
            <button class="detail-button">Copy</button>
        </div>

        <p class="detail-label">Username:</p>
        <div class="card-property">
            <h3 class="detail-value">myUsername</h3>
            <button class="detail-button">Copy</button>
        </div>

        <p class="detail-label">Password:</p>
        <div class="card-property">
            <h3 class="detail-value">myInvisiblePassword</h3>
            <button class="detail-button">Copy</button>
            <button class="detail-button">Show</button>
        </div>
    </div>
</div>