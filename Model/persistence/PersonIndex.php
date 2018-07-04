<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Zaldivar
 * Date: 3/7/18
 * Time: 21:42
 */

require_once "DB.php";
require_once "../Model/Person.php";

class PersonIndex extends DB
{

    private $conn;

    public function __construct()
    {
        $this->instance = parent::getInstance();
        $this->conn     = $this->instance->getConnection();
    }

    /**
     * @return array
     */
    public function getAllEmployees(): array
    {
        $query  = "SELECT * FROM employees ORDER BY id;";
        $result = $this->conn->prepare($query);
        $result->execute();

        $employees = $result->fetchAll(PDO::FETCH_CLASS, 'Person');

        return $employees;
    }
}