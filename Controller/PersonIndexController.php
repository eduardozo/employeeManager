<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Zaldivar
 * Date: 3/7/18
 * Time: 21:46
 */

require_once "../Model/persistence/PersonIndex.php";

$employeesList = new PersonIndex();

$jsonString = json_encode($employeesList->getAllEmployees());
echo $jsonString;

die();