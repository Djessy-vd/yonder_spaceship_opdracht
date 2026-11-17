<?php

declare(strict_types=1);

// Laad de Spaceship-class, zodat we die op deze pagina kunnen gebruiken.
require_once __DIR__ . '/src/Spaceship.php';

// Maak twee schepen. De voorraad begint standaard op 100.
$playerShip = new Spaceship('Star Explorer', 1200);
$enemyShip = new Spaceship('Rode komeet', 900);

// Laat de Star Explorer schieten en verwerk de schade bij het andere schip.
$damage = $playerShip->shoot();
$enemyShip->hit($damage);

// Bewegen kost brandstof. De uitkomst bewaren we voor het bericht op de pagina.
$didMove = $playerShip->move();

if ($damage > 0) {
    $actionMessage = $playerShip->getName() . ' schiet en doet ' . $damage . ' schade.';
} else {
    $actionMessage = $playerShip->getName() . ' kan niet schieten.';
}

if ($didMove) {
    $actionMessage .= ' Het schip beweegt en gebruikt 2 brandstof.';
}

$enemyStatus = $enemyShip->isAlive() ? 'In de lucht' : 'Uitgeschakeld';
?>
<!doctype html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Spaceships-gevecht</title>
</head>
<body>
    <h1>Spaceships-gevecht</h1>
    <p><?= htmlspecialchars($actionMessage, ENT_QUOTES, 'UTF-8') ?></p>

    <h2><?= htmlspecialchars($playerShip->getName(), ENT_QUOTES, 'UTF-8') ?></h2>
    <ul>
        <li>Status: <?= $playerShip->isAlive() ? 'In de lucht' : 'Uitgeschakeld' ?></li>
        <li>Maximale snelheid: <?= $playerShip->getMaxSpeed() ?> km/s</li>
        <li>Levenspunten: <?= $playerShip->getHitPoints() ?></li>
        <li>Munitie: <?= $playerShip->getAmmo() ?></li>
        <li>Brandstof: <?= $playerShip->getFuel() ?></li>
    </ul>

    <h2><?= htmlspecialchars($enemyShip->getName(), ENT_QUOTES, 'UTF-8') ?></h2>
    <ul>
        <li>Status: <?= htmlspecialchars($enemyStatus, ENT_QUOTES, 'UTF-8') ?></li>
        <li>Maximale snelheid: <?= $enemyShip->getMaxSpeed() ?> km/s</li>
        <li>Levenspunten: <?= $enemyShip->getHitPoints() ?></li>
        <li>Munitie: <?= $enemyShip->getAmmo() ?></li>
        <li>Brandstof: <?= $enemyShip->getFuel() ?></li>
    </ul>

    <p><small>Dit is een vaste demonstratie. De waarden beginnen opnieuw als je de pagina herlaadt.</small></p>
</body>
</html>
