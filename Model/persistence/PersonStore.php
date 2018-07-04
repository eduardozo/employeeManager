<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Zaldivar
 * Date: 3/7/18
 * Time: 21:43
 */

require_once "DB.php";
require_once "../Model/Person.php";

class PersonStore extends DB
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
    public function create(Person $person): void
    {
        try {
            $this->conn->beginTransaction();
            $query = "INSERT INTO employees (name, address, email, phone) VALUES (:name, :address, :email, :phone)";

            $name    = $person->getName();
            $address = $person->getEmail();
            $email   = $person->getAddress();
            $phone   = $person->getPhone();

            $smt = $this->conn->prepare($query);
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