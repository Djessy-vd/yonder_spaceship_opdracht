<?php

declare(strict_types=1);

// Laad de Spaceship-class, zodat we die op deze pagina kunnen gebruiken.
require_once __DIR__ . '/src/Spaceship.php';

// Maak één ruimteschip-object met een naam en maximale snelheid.
$spaceship = new Spaceship('Star Explorer', 1200);
?>
<!doctype html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mijn Spaceships-project</title>
</head>
<body>
    <h1>Mijn eerste ruimteschip</h1>
    <p>Naam: <?= htmlspecialchars($spaceship->getName(), ENT_QUOTES, 'UTF-8') ?></p>
    <p>Maximale snelheid: <?= $spaceship->getMaxSpeed() ?> km/s</p>
</body>
</html>
