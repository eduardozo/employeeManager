<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Zaldivar
 * Date: 3/7/18
 * Time: 21:44
 */

require_once "DB.php";
require_once "../Model/Person.php";

class PersonDestroy extends DB
{

    private $conn;

    public function __construct()
    {
        $this->instance = parent::getInstance();
        $this->conn     = $this->instance->getConnection();
    }

    /**
     * @param \Person $person
     */
    public function delete(Person $person): void
    {
        try {
            $this->conn->beginTransaction();
            $query = "DELETE FROM employees WHERE id = :id";

            $id  = $person->getId();
            $smt = $this->conn->prepare($query);
            $smt->bindParam(':id', $id);
            $smt->execute();

            $this->conn->commit();
            $smt = null;
        } catch (PDOException $e) {
            echo $e->getMessage();
            $this->conn->rollBack();
        }
    }
}