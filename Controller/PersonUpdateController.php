<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Zaldivar
 * Date: 3/7/18
 * Time: 21:48
 */

require_once "../Model/Person.php";
require_once "../Model/persistence/PersonUpdate.php";

$id      = (isset($_REQUEST['id'])) ? $_REQUEST['id'] : null;
$name    = (isset($_REQUEST['name'])) ? $_REQUEST['name'] : null;
$address = (isset($_REQUEST['address'])) ? $_REQUEST['address'] : null;
$email   = (isset($_REQUEST['email'])) ? $_REQUEST['email'] : null;
$phone   = (isset($_REQUEST['phone'])) ? $_REQUEST['phone'] : null;

if ($name != null && $address != null && $email != null && $phone != null) {
    $person = new Person();
    $person->set($name, $address, $email, $phone);
    $person->setId($id);

    $personUpdate = new PersonUpdate();
    $personUpdate->save($person);
} else {
    header('HTTP/1.1 500 Internal Server');
    header('Content-Type: application/json; charset=UTF-8');
}