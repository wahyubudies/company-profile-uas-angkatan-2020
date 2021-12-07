## COMPANY PROFILE

A simple CMS made using laravel for data management.
### For Installation

Clone the project

```bash
git clone https://github.com/wahyubudies/company-profile-uas-angkatan-2020.git or Download it
```

Go to the project directory

```bash
cd company-profile-angkatan-2020
```

Install dependencies

```bash
composer install
```

Import data from Database

```bash
make a database & import SQL file
```
ENV file

```bash
cp .env.example .env
```
Generate new Application Key

```bash
php artisan key:generate
```
Go to an ENV file and make some adjusment

```bash
DB_DATABASE= {your database}
DB_USERNAME= root / {your username}
DB_PASSWORD=  / {your password}
```
Symbolic link

```bash
php artisan storage:link
```
Serve

```bash
php artisan serve
```