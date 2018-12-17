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
        if($password != $passwordrepeat) {
            header('Location: /register');
        }

        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO $this->tableName (username, userpassword) VALUES (?, ?)";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('ss', $username, $password);
        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
        $id = $statement->insert_id;
        $_SESSION['username'] = $username;
        $_SESSION['loggedIn'] = true;
        $_SESSION['uid'] = $id;
        header('Location: /home');
    }
    public function login($username, $password)
    {
        $query = "SELECT id, username, userpassword FROM $this->tableName WHERE username = ?";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('s', $username);
        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }

        $result = $statement->get_result();

        if($result->num_rows == 1) {
            $row = $result->fetch_object();
            if(password_verify($password, $row->userpassword)) {
                $_SESSION['username'] = $username;
                $_SESSION['loggedIn'] = true;
                $_SESSION['uid'] = $row->id;
                header('Location: /home');
                if(isset($_SESSION['loginFalse'])) {
                    unset($_SESSION['loginFalse']);
                }
                return true;
            }
            else {
                header('Location: /login');
                $_SESSION['loggedIn'] = false;
                return false;
            }
        } else {
            header('Location: /login');
            $_SESSION['loggedIn'] = false;
            return false;
        }
    }
    public function delete($username, $password)
    {
        $uid = $_SESSION['uid'];
        if(login($username)) {
            $query = "DELETE FROM $this->tableName WHERE id = ? AND username = ?";
            $statement = ConnectionHandler::getConnection()->prepare($query);
            $statement->bind_param('is', $uid, $username);
            if (!$statement->execute()) {
                throw new Exception($statement->error);
            }
        }
    }
}