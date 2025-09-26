Sākumā jaizveido DB - MySQL

DROP USER IF EXISTS 'news_user'@'localhost';

CREATE DATABASE IF NOT EXISTS news_portal
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

CREATE USER 'news_user'@'localhost' IDENTIFIED BY 'stipra_parole';

GRANT ALL PRIVILEGES ON news_portal.* TO 'news_user'@'localhost';

FLUSH PRIVILEGES;

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
