Software requirements:
1) Laravel
2) MySQL

Configure .env file variables:
- DB_CONNECTION=mysql
- DB_HOST=127.0.0.1
- DB_PORT=3306
- DB_DATABASE=example
- DB_USERNAME=root
- DB_PASSWORD=

How to run:
- php artisan migrate
- php artisan db:seed
- php artisan serve

Access:
- http://localhost:8000/Crud 
- http://localhost:8000/calculate
