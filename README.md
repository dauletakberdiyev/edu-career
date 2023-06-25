# SDU Beta Career Portal

Portal for beta career program. 

## Features

- All paper works goes through portal (3 side signing)
- End-to-end prcess monitoring

## Installation

This project requires PHP 7.*, Composer, Mysql installed on your computer

```sh
git clone https://github.com/dauletakberdiyev/edu-career.git
cd sdu-beta-career-portal
composer install
```

After you need to create .env file. And write all configurations there. You can copy and paste content from env.example 
Apply all migration, seed database with initial information. And up local server

```sh
php artisan key:generate
php artisan migrate:fresh --seed
php artisan serve
```

## Development

Want to contribute? Great!

If you are not a maintainer on this repsitory, you do not have a permission to modify master branch. We work with classical git approach. You need to create separate branch for each of the tasks. After you have to create a merge request and assign it to reviewer. 

```sh
git add .
git commit -m 'meesage'
```

## License

SDU open source