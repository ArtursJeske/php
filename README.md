# Viesu grāmata

Vienkārša PHP + MySQL viesu grāmatas aplikācija — apmeklētāji var atstāt ziņu ar savu vārdu, un ierakstus var apskatīt, rediģēt vai dzēst.

## Funkcionalitāte

- Jaunu ierakstu pievienošana
- Visu ierakstu saraksta attēlošana
- Ieraksta rediģēšana
- Ieraksta dzēšana (ar apstiprinājumu)

## Faili

| Fails | Apraksts |
|---|---|
| `index.php` | Sākuma lapa — forma jaunam ierakstam un esošo ierakstu saraksts |
| `edit.php` | Esoša ieraksta rediģēšana pēc `id` |
| `delete.php` | Ieraksta dzēšana pēc `id` |
| `db.php` | Datubāzes savienojuma funkcija (`mysqli`) |
| `db.sql` | SQL skripts tabulas `Viesu_gramata` izveidei |
| `messages.php` | Lietotāja saskarnes paziņojumu teksti |
| `style.css` | Lapas stili |

## Prasības

- PHP 8.x ar `mysqli` paplašinājumu
- MySQL / MariaDB serveris
- Apache (vai cits PHP atbalstošs web serveris)


## Uzstādīšana

1. Novieto projekta mapi web servera mapē (piem., XAMPP gadījumā — `C:\xampp\htdocs\php`).
2. Izveido datubāzi un importē shēmu:
   ```
   mysql -u root -e "CREATE DATABASE IF NOT EXISTS viesu_gramata;"
   mysql -u root viesu_gramata < db.sql
   ```
3. Pārbaudi savienojuma parametrus failā `db.php` (pēc noklusējuma: host `localhost`, lietotājs `root`, tukša parole, datubāze `viesu_gramata`).
4. Palaid Apache un MySQL (piem., ar XAMPP Control Panel).
5. Atver pārlūkā: `http://localhost/php/index.php`

## Drošība

Datubāzes pieprasījumi izmanto sagatavotos vaicājumus (`mysqli::prepare`), un izvade tiek filtrēta ar `htmlspecialchars`, lai novērstu SQL injekciju un XSS.
