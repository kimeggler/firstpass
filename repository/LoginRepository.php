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

    public function encrypt($password) {
        $config = require '../config.php';
        $key = $config['key'];
        $tag = $config['tag'];
        $iv = $config['iv'];
        $cipher = "aes-128-gcm";
        if (in_array($cipher, openssl_get_cipher_methods()))
        {
            return openssl_encrypt($password, $cipher, $key, $options=0, $iv, $tag);
        }
    }

    public function decrypt($passwordEncrypted) {
        $config = require '../config.php';
        $key = $config['key'];
        $tag = $config['tag'];
        $iv = $config['iv'];
        $cipher = "aes-128-gcm";
        if (in_array($cipher, openssl_get_cipher_methods()))
        {
            return openssl_decrypt($passwordEncrypted, $cipher, $key, $options=0, $iv, $tag);
        }
    }

    public function create($appname, $username, $email, $password, $passwordrepeat, $uid)
    {
        //creates login

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
        //redirect to home
        header('Location: /home');
    }

    public function updateById($id, $appname, $username, $email, $password, $passwordrepeat, $uid)
    {
        //updates login by given id

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

        //prepares update query
        //update login

        $query = "UPDATE $this->tableName SET appname = ?, username = ?, useremail = ?, userpassword = ? WHERE id = ? AND userid = ?";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('ssssii', $appname, $username, $email, $password, $id, $uid);
        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
        //redirect to home
        header('Location: /home');
    }

    public function readAllLogins($uid)
    {
        //read all logins for home site
        
        $query = "SELECT id, appname, username, useremail FROM $this->tableName WHERE userid = ?";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('i', $uid);
        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }

        return $statement->get_result();

        //redirect to home
        header('Location: /home');
    }
    public function deleteAllLogins($uid)
    {
        //delete all logins of user 
        
        $query = "DELETE FROM $this->tableName WHERE userid = ?";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('i', $uid);
        if (!$statement->execute()) {
            return false;
        }

        return true;
    }

    public function readOneLogin($lid, $uid)
    {
        //reads login by given id
        //read login by id for detail site, update site and delete site

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
        //deletes app by given id

        $query = "DELETE FROM $this->tableName WHERE id = ? AND userid = ?";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('ii', $lid, $uid);
        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
    }

}