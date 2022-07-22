# Login
```bash
| Route               |  Email             | Password     |
| -------------       | -------------      |------------- |
| localhost/admin     |admin@gmail.com     | admin        |
| localhost/customer  |customer@gmail.com  | customer     |
```
## Installation

clone Project.

```bash
cp .env.example .env
// set up your database connection
composer install
php artisan migrate
php artisan module:seed
php artisan serve
```
