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

    public function updateById($id, $appname, $username, $email, $password, $passwordrepeat, $uid)
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

        $query = "UPDATE $this->tableName SET appname = ?, username = ?, useremail = ?, userpassword = ? WHERE id = ? AND userid = ?";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('ssssii', $appname, $username, $email, $password, $id, $uid);
        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
        header('Location: /home');
    }

    public function readAllLogins($uid)
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

    public function readOneLogin($lid, $uid)
    {
        $query = "SELECT id, appname, username, useremail, userpassword FROM $this->tableName WHERE id = ? AND userid = ?";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('ii', $lid, $uid);
        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }

        return $statement->get_result();
    }

    public function deleteLoginById($lid, $uid)
    {
        $query = "DELETE FROM $this->tableName WHERE id = ? AND userid = ?";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('ii', $lid, $uid);
        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
    }

}