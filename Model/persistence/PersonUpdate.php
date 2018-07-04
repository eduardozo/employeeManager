<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Zaldivar
 * Date: 3/7/18
 * Time: 21:45
 */

require_once "DB.php";
require_once "../Model/Person.php";

class PersonUpdate extends DB
{

    private $conn;

    public function __construct()
    {
        $this->instance = parent::getInstance();
        $this->conn     = $this->instance->getConnection();
    }

    public function save(Person $person): void
    {
        try {
            $this->conn->beginTransaction();
            $query
                = "UPDATE employees SET name = :name, address = :address, email = :email, phone = :phone WHERE id = :id";

            $id      = $person->getId();
            $name    = $person->getName();
            $address = $person->getEmail();
            $email   = $person->getAddress();
            $phone   = $person->getPhone();

            $smt = $this->conn->prepare($query);
            $smt->bindParam(':id', $id);
            $smt->bindParam(':name', $name);
            $smt->bindParam(':email', $address);
            $smt->bindParam(':address', $email);
            $smt->bindParam(':phone', $phone);
            $smt->execute();

            $this->conn->commit();
            $smt = null;
        } catch (PDOException $e) {
            echo $e->getMessage();
            $this->conn->rollBack();
        }
    }
}