# Laravel To-Do App

First of all, I use a Bootstrap template because I'm not good at coding.

## Features Implemented

### Registration & Login
- Used Form Request Classes for validation
- Regex validation on email and password

### Profile Page
- Editable nickname, email, phone number, and address
- Profile picture upload (avatar)

## Modified Files (MVC)
- **Model**: User.php, todo.php(`fillable`, migration)
- **Views**:
  - `resources/views/auth/register.blade.php`
  - `resources/views/auth/login.blade.php`
  - `resources/views/todos/edit.blade.php`
  - `resources/views/todos/create.blade.php`
  - `resources/views/todos/index.blade.php`
  - `resources/views/todos/show.blade.php`
  - `resources/views/layout/app.blade.php`
  - `resources/views/layout/footer.blade.php`
  - `resources/views/layout/navbar.blade.php`
  - `resources/views/layout/sidebar.blade.php`
  - `resources/views/home.blade.php`
  - `resources/views/profile.blade.php`
  - `resources/views/welcome.blade.php`
- **Controllers**:
  - AuthController.php
  - TodoController.php
  - Controller.php
  - HomeController.php

 I did  push pull in GitHub:
 -create new repository
 -pull in terminal 

## How to Run
1. Clone the repo
2. Run `composer install`
3. Set `.env`
4. Run `php artisan migrate`
5. Run `php artisan serve`

## Reference
https://www.youtube.com/watch?v=egFodWSdMzY
https://www.youtube.com/watch?v=g00WAcdYRpY
https://dev.to/chabbasaad/laravel-crud-with-blade-and-authentification-and-seeder-5af8
https://laraveldaily.com/lesson/laravel-projects-structure/validation-to-form-request
