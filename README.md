<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Project

This is a demo for a contact card webpage, where you can create, edit, delete, and display your contacts. The project is based on the Laravel framework, which is written in PHP, and other technologies used include jQuery and Axios.

## How To Run This Project
 1. Go into the project's main folder, and run command:
 ```
    docker-compose up -d  
    or:
    ./vendor/bin/sail up
```

2. run:

```
    npm install
```

3. run

```
    php artisan serve
```

4. run

```
    npm run dev
```

5. run
```
    php artisan migration && php artisan migration:refresh --seed
```


6. Open this websit in your browser:

```
    http://127.0.0.1:8000/
```

## Note

 - You might need to manually initialize and create the database 'contact_cards_demo' and its table 'contacts' in MySQL.
