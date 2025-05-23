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

# ASSIGNMENT3

This is a Laravel-based To-Do App project with extended authentication and authorization features based on security principles. This project was developed for **Assignment 1 & 2**.

## 🔐 Features Implemented

### 1. **User Authentication**
- Registration with validation
- Login with rate limiting (3 failed attempts allowed per minute)
- Secure logout
- Passwords are hashed using **Bcrypt**

### 2. **Multi-Factor Authentication (MFA) via Email**
- On login, a 6-digit code is sent to the user's registered email
- Code must be verified before accessing the dashboard
- MFA code is stored temporarily in the `users` table (`mfa_code`, `mfa_expires_at`)
- Code expires after 5 minutes

### 3. **Rate Limiting**
- Only **3 login attempts** allowed per minute using Laravel's `RateLimiter`
- Helps protect against brute force attacks

### 4. **Password Salting**
- A unique random alphanumeric salt is generated for each user during registration
- Stored in the `salt` column in the `users` table
- Salt is combined with the password before hashing using Bcrypt

### 5. **Role-Based Access Control (RBAC)**
- Roles: `Admin` and `User`
- Admins can:
  - View list of all users
  - Deactivate/activate users
  - View all To-Do lists by each user
- Users can:
  - Perform CRUD operations on their own To-Do list
- RBAC tables:
  - `user_roles` (`id`, `user_id`, `role_name`, `description`)
  - `role_permissions` (`id`, `role_id`, `description`)
- Button visibility and access control is based on assigned permissions
- 
## Reference
https://www.youtube.com/watch?v=egFodWSdMzY
https://www.youtube.com/watch?v=g00WAcdYRpY
https://dev.to/chabbasaad/laravel-crud-with-blade-and-authentification-and-seeder-5af8
https://laraveldaily.com/lesson/laravel-projects-structure/validation-to-form-request
