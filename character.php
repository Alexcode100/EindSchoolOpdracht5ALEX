<?php
require_once 'db_connect.php';
$conn = db_connect();

if (isset($_GET['id'])) {
    $character_id = intval($_GET['id']);
    $stmt = $conn->prepare("SELECT * FROM characters WHERE id=:id");
    $stmt->bindParam(':id', $character_id);
    $stmt->execute();
    $character = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $character['name']; ?></title>
    <link rel="stylesheet" href="style.css">
    <style>
        .stats-container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        
        .stats-box {
            flex: 1;
            border: 2px solid black;
            background-color: lightblue;
            padding: 15px;
            margin-right: 20px;
        }
        
        .character-description {
            flex: 1;
        }
        
        .footer-navbar {
            background-color: #333;
            overflow: hidden;
            padding: 14px 16px;
            margin-top: 20px;
        }
        
        .footer-navbar a {
            color: white;
            text-decoration: none;
            padding: 14px 16px;
            display: block;
        }
        
        .footer-navbar a:hover {
            background-color: #ddd;
            color: black;
        }
    </style>
</head>
<body style="background-color: <?php echo $character['color']; ?>;">
    <header>
        <h1><?php echo $character['name']; ?></h1>
        <a class="backbutton" href="index.php">Terug naar de lijst met karakters</a>
    </header>
    <div id="container">
        <div class="character-info">
            <div class="character-image">
                <img src="<?php echo $character['avatar']; ?>" alt="<?php echo $character['name']; ?>" />
            </div>
            <div class="stats-container">
                <div class="stats-box">
                    <p>Health: <?php echo $character['health']; ?></p>
                    <p>Attack: <?php echo $character['attack']; ?></p>
                    <p>Defense: <?php echo $character['defense']; ?></p>
                    <p>Weapon: <?php echo $character['weapon']; ?></p>
                    <p>Armor: <?php echo $character['armor']; ?></p>
                </div>
                <div class="character-description">
                    <p>Verhaaltje over de karakter, Lorem ipsum dolor, sit amet consectetur adipisicing elit. Maxime impedit adipisci laborum totam voluptates assumenda praesentium perspiciatis nihil, aut consequuntur distinctio harum a reiciendis quaerat, natus odit iusto molestiae? Dolore? Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, quasi aperiam id, quisquam ea odit tempora rem eos incidunt dolores corporis magni repellat quis tempore laudantium culpa ducimus reiciendis fuga.</p>
                </div>
            </div>
        </div>
        <div class="footer-navbar">
            <a href="#">Alexander den Otter</a>
        </div>
    </div>
</body>
</html>