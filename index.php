<?php
include('db.php');
include('utils.php');
$dataHandler = new DataHandler('data.json');

$records = $dataHandler->readAllRecords();

// Přidání nového záznamu
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dataHandler->addRecord(parseRecord(
        $_POST['amount'],
        $_POST['note'],
        $_POST['variable'],
        $_POST['specific'],
        $_POST['constant']
    ));
    header('Location: index.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="cs">
<head>

    <title>TestBank</title>
    <link href="./main.css" rel="stylesheet">
</head>
<body>

<h1>
    TestBank
</h1>
<p>
    Aplikace pro vytváření testovacích plateb pro platební systém.
</p>


<h2>
    Přidání testovací platby
</h2>
<form method="POST" action="index.php">
    <label>
        Částka
    </label>
    <input type="number" min="0" step="1" name="amount" placeholder="Částka" required>
    <label>
        Poznámka
    </label>
    <input type="text" name="note" placeholder="Poznámka" required>
    <label>
        Variabilní symbol
    </label>
    <input type="number" min="0" step="1" name="variable" placeholder="Variabilní symbol">
    <label>
        Specifický symbol
    </label>
    <input type="number" min="0" step="1" name="specific" placeholder="Specifický symbol">
    <label>
        Konstantní symbol
    </label>
    <input type="number" min="0" step="1" name="constant" placeholder="Konstantní symbol">


    <button type="submit">
        Přidat platbu
    </button>

</form>


<h2>
    Přehled testovacích plateb
</h2>
<p>
    Zde je přehled všech testovacích plateb, které byly vytvořeny. Po načtení pomocí platební aplikace budou smazány.
</p>
<table>
    <thead>
    <tr>
        <th>
            Částka
        </th>
        <th>
            Poznámka
        </th>
        <th>
            Variabilní symbol
        </th>
        <th>
            Specifický symbol
        </th>
        <th>
            Konstantní symbol
        </th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($records as $record) {
        echo '<tr>';
        echo '<td>' . $record['amount'] . '</td>';
        echo '<td>' . $record['note'] . '</td>';
        echo '<td>' . $record['variableSymbol'] . '</td>';
        echo '<td>' . $record['specificSymbol'] . '</td>';
        echo '<td>' . $record['constantSymbol'] . '</td>';
        echo '</tr>';
    }
    ?>
    </tbody>
</table>
</body>
</html>