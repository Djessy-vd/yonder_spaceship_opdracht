<?php

declare(strict_types=1);

/**
 * Een class is de blauwdruk voor ruimteschip-objecten.
 */
class Spaceship
{
    // Deze gegevens horen bij een ruimteschip.
    private string $name;
    private int $maxSpeed;

    // De constructor stelt de gegevens in wanneer je een schip maakt.
    public function __construct(string $name, int $maxSpeed)
    {
        $this->name = $name;
        $this->maxSpeed = $maxSpeed;
    }

    // Met deze functies kan de pagina de gegevens opvragen.
    public function getName(): string
    {
        return $this->name;
    }

    public function getMaxSpeed(): int
    {
        return $this->maxSpeed;
    }
}
