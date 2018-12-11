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

    public function create($username, $password)
    {
        $password = sha1($password);
        $query = "INSERT INTO $this->tableName (username, userpassword,) VALUES ($username, $password)";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('ss', $username, $password);
        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
        return $statement->insert_id;
    }
    public function login($username, $password)
    {
        $password = sha1($password);
        $query = "SELECT id, username FROM $this->tableName WHERE username = ? AND userpassword = ?";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('ss', $username, $password);
        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }

        $result = $statement->get_result();

        if($result->num_rows == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['loggedIn'] = true;
            header('Location: /home');
            if(isset($_SESSION['loginFalse'])) {
                unset($_SESSION['loginFalse']);
            }
        } else {
            header('Location: /login');
            $_SESSION['loggedIn'] = false;
        }
    }
}