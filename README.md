<p align="left"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="200" alt="Laravel Logo"></a></p>

# Blog crud api using Laravel

( The site not online as for now ).The app was deployed on [https://blog-api-laravel-production.up.railway.app/](https://blog-api-laravel-production.up.railway.app/) where u can use postman collection to call the api. 


## Table of Contents

- [Features](#features)
- [Requirements](#requirements)
- [Configuration](#configuration)

## Features

- Blog has crud functionalities
- Api authorization with token
- Each category has it's own description
- Relation between blog and category is many to one
- Exceptions are handled

## Requirements

- PHP
- Composer
- MySql

## Configuration

1. Clone the repo first
2. Create .env file and copy .env.example and fill it with your details
3. migrate the database ```php artisan migrate```
4. run the app ```php artisan serve```
