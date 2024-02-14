<?php
include('db.php');
$dataHandler = new DataHandler('data.json');
header('Content-Type: application/json');

$records = $dataHandler->readAllRecords();
echo json_encode($records);

// Smazání všech záznamů z databáze po získání dat pomocí API
$dataHandler->removeAllRecords();
?>
