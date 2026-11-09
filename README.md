# Student Catalog / Каталог студентов — ЛР №45

Учебное приложение на **Laravel 12** для просмотра списка студентов и добавления записи. Три поля: ФИО, группа, email. Приложение использует постоянную базу данных, Blade, серверную валидацию, CSRF и сообщения в сессии. Создано на основе структуры предыдущего Laravel-проекта; в ЛР45 интерфейс приведён к минимальному составу из методички (без специальности, курса и удаления).

## Требования

- PHP >= 8.2 с расширениями, необходимыми Laravel, включая PDO SQLite / sqlite3 для варианта SQLite
- Composer, Git
- SQLite (рекомендуется) **или** MySQL/MariaDB в XAMPP
- Node/npm **не требуются** для этих двух страниц: стили встроены в Blade

## Установка в Windows PowerShell

```powershell
composer install
Copy-Item .env.example .env
php artisan key:generate
New-Item -ItemType File -Path database/database.sqlite -Force
php artisan migrate
php artisan serve
```

**Для MySQL/XAMPP:** создайте пустую базу, например `student_catalog`, в phpMyAdmin. В локальном `.env` задайте `DB_CONNECTION=mysql`, `DB_HOST=127.0.0.1`, `DB_PORT=3306`, `DB_DATABASE=student_catalog`, `DB_USERNAME=...`, `DB_PASSWORD=...`; затем выполните `php artisan migrate`. В .env.example секретов нет.

**Если SQLite не видит файл:** в `.env` вместо относительного пути `DB_DATABASE` укажите полный путь `C:/.../database/database.sqlite`. `php -m` должен содержать `pdo_sqlite`. При смене конфигурации выполните `php artisan config:clear`.

## Страницы

- `/` → перенаправление на `/students`
- `GET /students` → таблица или «Студентов пока нет»
- `GET /students/create` → отдельная форма добавления
- `POST /students` → проверка данных, добавление в БД, редирект с сообщением об успехе

Поле `full_name` — обязательное, до 255 символов; `group_name` — обязательное, до 100; `email` — обязательное, валидное и уникальное. Неправильный HTML-запрос перенаправляется назад с сообщениями об ошибках. Приложение не обещает JSON API: в методичке ЛР45 требуется обычная HTML-форма.

## Тесты

```powershell
php artisan test --filter=StudentCatalogTest
php artisan test
php artisan route:list
```

Laravel использует изолированную SQLite in-memory БД через `phpunit.xml`, не затрагивая рабочие записи. Выполните тесты после `composer install` и проверки расширения `pdo_sqlite`.

## Git / GitHub

В архиве сохранена реальная локальная `.git`-история: первоначальный commit в `main`, затем изменения в `feature/add-student` двумя коммитами; ветка в конце слита в `main` локальным merge-коммитом. Это **не GitHub Pull Request**: для GitHub нужны собственный аккаунт и сеть. Инструкции: `GITHUB_ШАГИ.md`.

## Скриншоты

После локального запуска добавьте 2–3 тестовые записи (с вымышленными ФИО и email), сделайте скриншот `/students`. Затем откройте `/students/create`, введите ошибочный email и сохраните — сделайте снимок сообщения об ошибке. Положите реальные снимки в `screenshots/`. **Иллюстрации без фактического запуска не выдаются за рабочие скриншоты.**

## Результаты проверки в среде подготовки

PHP-синтаксис и Git проверены; `composer install`, миграция, запуск сайта и тесты **не выполнялись**, потому что Composer/vendor и SQLite PHP extension не установлены в среде подготовки. Это нельзя считать подтверждённым работающим запуском. См. `ПРОВЕРКИ.md`.
