<?php
require_once '../repository/LoginRepository.php';
/**
 * Siehe Dokumentation im DefaultController.
 */
class HomeController
{
    public function index()
    {
        $loginRepository = new LoginRepository();

        $logins = $loginRepository->readAll($_SESSION['uid']);

        if ($logins->num_rows > 0) {
            // output data of each row
            while($row = $logins->fetch_assoc()) {
                echo "appname: " . $row["appname"] . " - username: " . $row["username"]. " -  email: " . $row["useremail"] .
                    " -  password: " . $row["userpassword"] . " -  userid: " . $row["userid"] . "<br>";
            }
        } else {
            echo "0 results";
        }

        $view = new View('home');
        $view->display();
    }
}
