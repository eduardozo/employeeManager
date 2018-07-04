<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Zaldivar
 * Date: 3/7/18
 * Time: 21:46
 */

require_once "../Model/Person.php";
require_once "../Model/persistence/PersonStore.php";

$name    = (isset($_REQUEST['name'])) ? $_REQUEST['name'] : null;
$address = (isset($_REQUEST['address'])) ? $_REQUEST['address'] : null;
$email   = (isset($_REQUEST['email'])) ? $_REQUEST['email'] : null;
$phone   = (isset($_REQUEST['phone'])) ? $_REQUEST['phone'] : null;

if ($name != null && $address != null && $email != null && $phone != null) {
    $person = new Person();
    $person->set($name, $address, $email, $phone);

    $personStore = new PersonStore();
    $personStore->create($person);
} else {
    header('HTTP/1.1 500 Internal Server');
    header('Content-Type: application/json; charset=UTF-8');
    //die(json_encode(array('message' => 'ERROR')));
}