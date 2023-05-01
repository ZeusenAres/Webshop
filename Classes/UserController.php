<?php
require_once('Database.php');
class UserController extends Database
{
    private array $user = [];
    public function __construct()
    {
        parent::__construct();
        $this->setTable('users');
        foreach($this->request('GET', '/getAllUsers') as $user)
        {
            $this->insertUser($user->username, $user->password, $user->email, $user->id);
        }
    }

    private function selectAllUsers() : array
    {
        $statement = $this->conn->prepare("SELECT * FROM $this->table");
        $statement->execute();
        return $statement->fetch();
    }

    private function userExists(string $username) : bool
    {
        $statement = $this->conn->prepare("SELECT username FROM $this->table WHERE username = :username");
        $statement->execute([
            'username' => $username
        ]);
        return $statement->fetch() != null ? true : false;
    }

    public function insertUser(string $username, string $password, string $email, int $id = null)
    {
        if($this->userExists($username) == false)
        {
            $statement = $this->conn->prepare("INSERT INTO $this->table(id, username, password, email) VALUES(:id, :username, :password, :email)");
            $statement->execute([
                'id' => $id,
                'username' => $username,
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'email' => $email
            ]);
        }
    }

    public function selectUser(string $username, string $password) : array
    {
        $statement = $this->conn->prepare("SELECT * FROM $this->table WHERE username = :username");
        $statement->execute([
            'username' => $username
        ]);
        $result = $statement->fetch();
        if(empty($result))
        {
            throw new Exception('Invalid username');
        }
        return $result;
    }

    public function insertUserToAPI(string $username, string $password, string $email) : object
    {
        $user = [
          'username' => $username,
          'password' => $password,
          'email' => $email
        ];
        return $this->request('POST', '/register', json_encode($user, true));
    }

    public function register(string $username, string $password, string $email, int $id = null)
    {
        $this->insertUser($username, $password, $email);
        header("Location:login.php");
    }

    public function login(string $username, string $password) : array
    {
        $result = $this->selectUser($username, $password);
        if(password_verify($password, $result['password']) == false)
        {
            throw new Exception('Invalid password');
        }
        if(empty($result))
        {
            $result = [];
        }
        return $result;
    }

    public function updateUser(string $username, string $password, string $email, string $currentEmail, int $id)
    {
        $statement = $this->conn->prepare("UPDATE $this->table SET username = :username, password = :password, email = :email WHERE email = :currentEmail AND id = :id");
        $statement->execute([
            'currentEmail' => $currentEmail,
            'username' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'email' => $email,
            'id' => $id
        ]);
    }
}