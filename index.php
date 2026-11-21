<?php

declare(strict_types=1);

require_once __DIR__ . '/src/Spaceship.php';

session_start();

// Begin een nieuw spel als er nog geen spel bestaat.
if (!isset($_SESSION['playerShip'], $_SESSION['enemyShip'])) {
    $_SESSION['playerShip'] = new Spaceship('Star Explorer', 1200);
    $_SESSION['enemyShip'] = new Spaceship('Rode komeet', 900);
}

$playerShip = $_SESSION['playerShip'];
$enemyShip = $_SESSION['enemyShip'];
$actionMessage = 'Kies een actie om te beginnen.';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'restart') {
        unset($_SESSION['playerShip'], $_SESSION['enemyShip']);
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    }

    if ($playerShip->isAlive() && $enemyShip->isAlive()) {
        if ($action === 'shoot') {
            $damage = $playerShip->shoot();
            $enemyShip->hit($damage);
            $actionMessage = $damage > 0
                ? 'Je schiet en doet ' . $damage . ' schade.'
                : 'Je hebt niet genoeg munitie om te schieten.';
        } elseif ($action === 'move') {
            $didMove = $playerShip->move();
            $actionMessage = $didMove
                ? 'Je schip beweegt en gebruikt 2 brandstof.'
                : 'Je hebt niet genoeg brandstof om te bewegen.';
        } else {
            $actionMessage = 'Ongeldige actie.';
        }

        // De vijand schiet terug na een geldige actie.
        if ($action === 'shoot' || $action === 'move') {
            $enemyDamage = $enemyShip->shoot();
            $playerShip->hit($enemyDamage);
            if ($enemyDamage > 0 && $playerShip->isAlive()) {
                $actionMessage .= ' De vijand schiet terug voor ' . $enemyDamage . ' schade.';
            }
        }
    } else {
        $actionMessage = 'Het gevecht is voorbij. Begin een nieuw spel.';
    }

    $_SESSION['playerShip'] = $playerShip;
    $_SESSION['enemyShip'] = $enemyShip;
}

$enemyStatus = $enemyShip->isAlive() ? 'In de lucht' : 'Uitgeschakeld';
$gameOver = !$playerShip->isAlive() || !$enemyShip->isAlive();
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

    <h2><?= htmlspecialchars($playerShip->getName(), ENT_QUOTES, 'UTF-8') ?> (jij)</h2>
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

    <?php if (!$gameOver): ?>
        <form method="post">
            <button type="submit" name="action" value="shoot">Schiet</button>
            <button type="submit" name="action" value="move">Beweeg</button>
        </form>
    <?php else: ?>
        <p><?= $playerShip->isAlive() ? 'Je hebt gewonnen!' : 'Je hebt verloren.' ?></p>
    <?php endif; ?>

    <form method="post">
        <button type="submit" name="action" value="restart">Nieuw spel</button>
    </form>
</body>
</html>
