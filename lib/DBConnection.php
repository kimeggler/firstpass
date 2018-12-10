<?php
/**
 * Created by PhpStorm.
 * User: byaten
 * Date: 04.12.2018
 * Time: 16:28
 */

class DBConnection
{
    public function connect(){
        $servername = "localhost:3306";
        $username = "root";
        $password = "1234";
        $dbName = "firstpass";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbName);

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        echo "Connected successfully";
    }
}