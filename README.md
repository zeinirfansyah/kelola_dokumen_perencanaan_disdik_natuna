<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Requirement
- composer
- node js
- laragon/xampp for mysql usage

## Installation
- clone this repository `git clone https://github.com/zeinirfansyah/kelola-dokumen-disdiknatuna.git`
- install dependencies `npm install` and `composer install`
- setup env file `cp .env.example .env` then generate the key `php artisan key:generate`
- create empty database based on database name inside .env file
- migrate the database `php artisan migrate`
- run the project localy `npm run dev` and `php artisan serve`
