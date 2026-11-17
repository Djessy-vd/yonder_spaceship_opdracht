<?php

declare(strict_types=1);

/**
 * Class is de blauwdruk voor ruimteschip-objecten.
 */
class Spaceship
{
    // Deze eigenschappen horen bij ieder ruimteschip.
    private string $name;
    private int $maxSpeed;
    private int $ammo;
    private int $fuel;
    private int $hitPoints;
    private bool $isAlive;

    // Als je geen voorraad meegeeft, begint het schip met 100 van elk.
    public function __construct(
        string $name,
        int $maxSpeed,
        int $ammo = 100,
        int $fuel = 100,
        int $hitPoints = 100
    ) {
        $this->name = $name;
        $this->maxSpeed = max(0, $maxSpeed);
        $this->ammo = max(0, $ammo);
        $this->fuel = max(0, $fuel);
        $this->hitPoints = max(0, $hitPoints);
        $this->isAlive = $this->hitPoints > 0;
    }

    // Schieten kost 5 munitie en doet 10 schade. Geen munitie? Dan mis je.
    public function shoot(): int
    {
        if (!$this->isAlive || $this->ammo < 5) {
            return 0;
        }

        $this->ammo -= 5;

        return 10;
    }

    // Verwerk schade en zorg dat levenspunten nooit onder nul komen.
    public function hit(int $damage): void
    {
        if (!$this->isAlive || $damage <= 0) {
            return;
        }

        $this->hitPoints = max(0, $this->hitPoints - $damage);
        $this->isAlive = $this->hitPoints > 0;
    }

    // Bewegen kost 2 brandstof. De methode vertelt of het is gelukt.
    public function move(): bool
    {
        if (!$this->isAlive || $this->fuel < 2) {
            return false;
        }

        $this->fuel -= 2;

        return true;
    }

    // Met deze functies kan de pagina de privé-eigenschappen uitlezen.
    public function getName(): string
    {
        return $this->name;
    }

    public function getMaxSpeed(): int
    {
        return $this->maxSpeed;
    }

    public function getAmmo(): int
    {
        return $this->ammo;
    }

    public function getFuel(): int
    {
        return $this->fuel;
    }

    public function getHitPoints(): int
    {
        return $this->hitPoints;
    }

    public function isAlive(): bool
    {
        return $this->isAlive;
    }
}
