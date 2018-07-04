<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Zaldivar
 * Date: 3/7/18
 * Time: 21:44
 */

require_once "DB.php";
require_once "../Model/Person.php";

class PersonShow extends DB
{

    private $conn;

    public function __construct()
    {
        $this->instance = parent::getInstance();
        $this->conn     = $this->instance->getConnection();
    }

    /**
     * @param int $id
     *
     * @return \Person
     */
    public function getPerson(int $id): Person
    {
        $query  = "SELECT * FROM employees WHERE id = :id";
        $result = $this->conn->prepare($query);
        $result->bindParam(':id', $id);
        $result->execute();

        $person = $result->fetchObject('Person');

        return $person;
    }
}