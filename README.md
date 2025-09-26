Projekts veidots ar **Laravel 12.x**, **PHP 8.4**, **MySQL/MariaDB**.  


## 1. Datubāzes sagatavošana
Sākumā jaizveido DB - MySQL

CREATE DATABASE IF NOT EXISTS news_portal
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

## 2. Projekta uzstādīšana
Tad jāpalaiž komandas projekta terminālī:
1. composer install
2. cp .env.example .env
3. php artisan key:generate
4. php artisan migrate --seed
5. php artisan serve

Tad pamata lapa būs redzams ziņu saraksts
Un /login būs admina daļa

Demo lietoājs


Email => 'test@example.com'

Parole => 'secret123'

## Kas izdarīts
Publiskā puse:

Ziņu saraksts ar lapdali. 
Ziņas skatīšana ar komentāriem.
Komentāru pievienošana bez reģistrācijas ar CAPTCHA.

Administrācijas puse:
Autorizācija (e-pasts + parole).
Ziņu pievienošana, rediģēšana, dzēšana.
Komentāru moderācija (dzēšana).
Pielikumu pievienošana ziņām (faila tipa un izmēra validācija).

Drošība:
PDO + sagatavotie pieprasījumi (Laravel Eloquent).
XSS aizsardzība ({{ }} izvade).
CSRF tokeni formām (@csrf).
Vienību tests ar PHPUnit.

Minimāls CSS dizains (publiskā un admin puse).
