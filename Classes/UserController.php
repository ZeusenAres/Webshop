<?php
require_once('Database.php');
class UserController extends Database
{
    public function __construct()
    {
        parent::__construct();
        $this->setTable('users');
        foreach($this->getAllUsers('/getAllUsers') as $user)
        {
            if($this->userExists($user->username) == false)
            {
                $this->insertUser($user->id, $user->username, $user->password, $user->email);
            }
        }
    }

    private function userExists(string $username) : bool
    {
        $statement = $this->conn->prepare("SELECT username FROM $this->table WHERE username = :username");
        $statement->execute([
            'username' => $username
        ]);
        return $statement->fetch() != null ? true : false;
    }

    public function insertUser(int $id, string $username, string $password, string $email)
    {
        $statement = $this->conn->prepare("INSERT INTO $this->table(id, username, password, email) VALUES(:id, :username, :password, :email)");
        $statement->execute([
            'id' => $id,
            'username' => $username,
            'password' => $password,
            'email' => $email
        ]);
    }
}