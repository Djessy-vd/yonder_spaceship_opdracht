# yonder_spaceship_opdracht

Een eigen spaceships-game die we stap voor stap vanaf nul opbouwen met PHP. Dit is de eerste kleine basis: één ruimteschip als object en een pagina die de gegevens toont. De volledige game bouwen we later verder uit.

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

Open <http://localhost:8000> in je browser. Stop de server met `Control+C` in Terminal.

## Mappen en bestanden

- `index.php` — het startpunt van de pagina.
- `src/Spaceship.php` — de eerste class voor een ruimteschip.
- `.gitignore` — bestanden die Git niet hoeft op te slaan.

## Wijzigingen opslaan en naar GitHub sturen

De map is al gekoppeld aan je GitHub-repository. Voer de volgende opdrachten uit in Terminal, vanuit deze projectmap:

```bash
git status
git add .
git commit -m "Start eigen Spaceships-project"
git push
```

Bij volgende werkmomenten gebruik je opnieuw `git add .`, `git commit -m "Korte uitleg van je wijziging"` en `git push` om je werk op te slaan en te delen.

