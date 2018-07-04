<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Zaldivar
 * Date: 3/7/18
 * Time: 21:48
 */

require_once "../Model/Person.php";
require_once "../Model/persistence/PersonDestroy.php";

$id = (isset($_REQUEST['id'])) ? $_REQUEST['id'] : null;

if ($id != null) {
    $person = new Person();
    $person->setId($id);

    $personDestroy = new PersonDestroy();
    $personDestroy->delete($person);
} else {
    header('HTTP/1.1 500 Internal Server');
    header('Content-Type: application/json; charset=UTF-8');
}