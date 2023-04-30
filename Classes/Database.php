<?php
require_once('RedcomAPI.php');
class Database extends RedcomAPI
{
    private string $host = 'localhost';
    private string $user = 'HighServe';
    private string $password = 'ass';
    private string $dbname = 'platformer_marketplace';
    protected string $table;
    private int $port = 3308;
    protected PDO $conn;

    public function __construct()
    {
        try
        {
            $this->conn = new PDO("mysql:server=$this->host;port=$this->port;dbname=$this->dbname", $this->user, $this->password);
        }
        catch(PDOException $pdoEx)
        {
            die("failed to connect to database: " . $pdoEx->getMessage());
        }
    }

    public function setTable($table) : string
    {
        return $this->table = $table;
    }
}