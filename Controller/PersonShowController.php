<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Zaldivar
 * Date: 3/7/18
 * Time: 21:47
 */

require_once "../Model/Person.php";
require_once "../Model/persistence/PersonShow.php";

$id = (isset($_REQUEST['id'])) ? $_REQUEST['id'] : null;

if ($id != null) {
    $personShow = new PersonShow();
    $person     = $personShow->getPerson($id);

    $jsonString = json_encode($person);
    echo $jsonString;

    die();
} else {
    header('HTTP/1.1 500 Internal Server');
    header('Content-Type: application/json; charset=UTF-8');
}