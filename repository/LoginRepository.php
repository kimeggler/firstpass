<?php
require_once '../lib/Repository.php';
/**
 * Das UserRepository ist zuständig für alle Zugriffe auf die Tabelle "user".
 *
 * Die Ausführliche Dokumentation zu Repositories findest du in der Repository Klasse.
 */
class LoginRepository extends Repository
{
    /**
     * Diese Variable wird von der Klasse Repository verwendet, um generische
     * Funktionen zur Verfügung zu stellen.
     */
    protected $tableName = 'logins';

    public function create($appname, $username, $email, $password, $passwordrepeat, $uid)
    {
        if($appname == "") {
            header('Location: /create');
        }

        if($username == "" && $email == "") {
            header('Location: /create');
        }

        if($password == "") {
            header('Location: /create');
        }

        if($passwordrepeat == "") {
            header('Location: /create');
        }

        if($password != $passwordrepeat) {
            header('Location: /create');
        }

        //Todo: Encrypt Passwords here

        $query = "INSERT INTO $this->tableName (appname, username, useremail, userpassword, userid) VALUES (?, ?, ?, ?, ?)";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('ssssi', $appname, $username, $email, $password, $uid);
        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
        header('Location: /home');
    }

    public function readAll($uid)
    {
        $query = "SELECT id, appname, username, useremail FROM $this->tableName WHERE userid = ?";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('i', $uid);
        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }

        return $statement->get_result();



        header('Location: /home');
    }


}