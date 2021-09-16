<?php 

require_once('../config.php');
require_once(DBAPI);

$customers = null;
$customer = null;

/**
 * Listagem de clienes
 */
function index(){
    global $customers;
    $customers = find_all('customers');
}

?>