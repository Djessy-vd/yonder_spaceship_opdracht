# Spaceships-opdracht

Een eigen spaceships-game die we stap voor stap vanaf nul opbouwen met PHP. Deze versie laat twee ruimteschepen zien en demonstreert schieten, schade krijgen en bewegen. We bouwen de volledige game later verder uit.

## Wat leer ik hiermee?

- Een PHP-project starten op je Mac.
- Classes, objecten, eigenschappen en methods gebruiken.
- Munitie, brandstof en levenspunten bijhouden.
- Wijzigingen bewaren met Git en delen via GitHub.

## Benodigdheden

- PHP 8.0 of hoger
- Terminal op macOS
- De GitHub-repository die bij deze map hoort

Controleer of PHP is geïnstalleerd:

```bash
php -v
```

## Project starten

Open Terminal en voer uit:

```bash
cd ~/Documents/Code/yonder_spaceship_opdracht
php -S localhost:8000
```

Open daarna <http://localhost:8000> in je browser. Stop de server met `Control+C` in Terminal.

De pagina demonstreert elke keer dezelfde beurt: de Star Explorer schiet op de Rode komeet en beweegt. Herladen begint opnieuw; de schepen bewaren hun voorraad nog niet tussen beurten.

## Bestanden

- `index.php` — maakt twee schepen en toont de demonstratie.
- `src/Spaceship.php` — beschrijft de eigenschappen en acties van een ruimteschip.
- `.gitignore` — laat tijdelijke en privébestanden buiten Git.

## De opdracht verder ontwikkelen

De class heeft eigenschappen voor naam, snelheid, munitie, brandstof en levenspunten. De methods `shoot()`, `hit()` en `move()` voeren de acties uit en bewaken de voorraden. De volgende stap kan zijn om zelf een knop te maken waarmee je een actie kiest en de scheepsstatus tussen beurten bewaart.

## Wijzigingen opslaan en naar GitHub sturen

Deze projectmap is al gekoppeld aan je GitHub-repository. Voer in Terminal, vanuit de projectmap, deze opdrachten uit:

```bash
git status
git add .
git commit -m "Beschrijf je wijziging"
git push
```
