<?php
require_once '../lib/Repository.php';
/**
 * Das UserRepository ist zuständig für alle Zugriffe auf die Tabelle "user".
 *
 * Die Ausführliche Dokumentation zu Repositories findest du in der Repository Klasse.
 */
class UserRepository extends Repository
{
    /**
     * Diese Variable wird von der Klasse Repository verwendet, um generische
     * Funktionen zur Verfügung zu stellen.
     */
    protected $tableName = 'users';

    public function create($username, $password, $passwordrepeat)
    {
        //creates user

        if($password != $passwordrepeat) {
            header('Location: /register');
        }
        if($this->exists($username)) {
            header('Location: /register');
        }
        //hashed password before it is saved in db
        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO $this->tableName (username, userpassword) VALUES (?, ?)";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('ss', $username, $password);
        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
        $id = $statement->insert_id;
        //sets session variables
        $_SESSION['username'] = $username;
        $_SESSION['loggedIn'] = true;
        $_SESSION['uid'] = $id;
        //redirect to home
        header('Location: /home');
    }
    public function login($username, $password)
    {
        //loggs in user
        $query = "SELECT id, username, userpassword FROM $this->tableName WHERE username = ?";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('s', $username);
        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }

        $result = $statement->get_result();

        //check if user exists
        if($result->num_rows == 1) {
            $row = $result->fetch_object();
            //checks if password matches
            if(password_verify($password, $row->userpassword)) {
                //sets all session variables
                $_SESSION['username'] = $username;
                $_SESSION['loggedIn'] = true;
                $_SESSION['uid'] = $row->id;
                //redirect to home
                header('Location: /home');
                if(isset($_SESSION['loginFalse'])) {
                    //unsets loginFalse session variable
                    unset($_SESSION['loginFalse']);
                }
                return true;
            }
            else {
                //sets loggedin session variable to false
                header('Location: /login');
                $_SESSION['loggedIn'] = false;
                return false;
            }
        } else {
            //sets loggedin session variable to false
            header('Location: /login');
            $_SESSION['loggedIn'] = false;
            return false;
        }
    }
    public function delete($username, $password)
    {
        //deletes user
        $uid = $_SESSION['uid'];
        //checks if password matches before deletion
        if($this->exists($username)) {
            //execute delete query
            $query = "DELETE FROM $this->tableName WHERE id = ? AND username = ?";
            $statement = ConnectionHandler::getConnection()->prepare($query);
            $statement->bind_param('is', $uid, $username);
            if (!$statement->execute()) {
                throw new Exception($statement->error);
            }
        }
        header('Location: /logout');
    }
    function exists($username)
    {
        //loggs in user
        $query = "SELECT id, username, userpassword FROM $this->tableName WHERE username = ?";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('s', $username);
        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }

        $result = $statement->get_result();

        //check if user exists
        if($result->num_rows == 1) {
            return false;
        } else {
            return true;
        }
    }
}