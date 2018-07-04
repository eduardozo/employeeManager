<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Zaldivar
 * Date: 3/7/18
 * Time: 20:28
 */

class DB
{

    private static $instance = null;
    private $conn;

    private $host = 'localhost';
    private $user = 'root';
    private $pass = 'root';
    private $name = 'employeeManager';

    private function __construct()
    {
        $this->conn = new PDO("mysql:host={$this->host};dbname={$this->name}",
            $this->user, $this->pass,
            [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'", PDO::ATTR_PERSISTENT => true]);
    }

    function __destruct()
    {
        $this->disconnect();
    }

    public static function getInstance(): DB
    {
        if ( ! self::$instance) {
            self::$instance = new DB();
        }

        return self::$instance;
    }

    public function getConnection()
    {
        return $this->conn;
    }

    private function disconnect(): void
    {
        $this->conn     = null;
        self::$instance = null;
    }

    // Evita que el objeto se pueda clonar
    public function __clone()
    {
        trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR);
    }
}