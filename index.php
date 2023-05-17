<?php
require_once('db_connect.php');
$conn = db_connect();
$query = $conn->query("SELECT * FROM characters ORDER BY name");
$characters = $query->fetchAll(PDO::FETCH_ASSOC);
$totalCharacters = count($characters);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Characters</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Personages</h1>
    </header>
    <div id="container">
        <h1>Totaal aantal karakters: <?= $totalCharacters ?></h1>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Naam</th>
                        <th>Levenskracht</th>
                        <th>Aanvalskracht</th>
                        <th>Verdediging</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($characters as $character): ?>
                        <tr>
                            <td><?= htmlspecialchars($character['name']) ?></td>
                            <td><?= htmlspecialchars($character['health']) ?></td>
                            <td><?= htmlspecialchars($character['attack']) ?></td>
                            <td><?= htmlspecialchars($character['defense']) ?></td>
                            <td><a href="character.php?id=<?= $character['id'] ?>">Details</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <p>&copy; <?= date('Y') ?> Alexander den Otter</p>
    </div>
</body>
</html>