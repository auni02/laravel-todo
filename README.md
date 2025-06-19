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

# ASSIGNMENT2

### 1. Multi-Factor Authentication (MFA) via Email
- MFA is implemented using a custom mechanism (not Google Authenticator).
- A **6-digit verification code** is generated and emailed to the user after a successful login attempt.
- Users must enter the MFA code to access the dashboard.
- Code expires in **5 minutes**.
- Related fields added in `users` table:
  - `mfa_code`
  - `mfa_expires_at`

### 2. Strong Password Hashing + Salting
- Passwords are hashed using **Bcrypt** via Laravel’s built-in `Hash::make()`.
- Additionally, a **random salt** (alphanumeric string) is generated for each user during registration.
- This salt is stored in the `salt` column in the `users` table and combined with the password before hashing.


### 3. Input Validation
- Validation implemented during:
  - Registration (`name`, `email`, `password`, `password_confirmation`)
  - Login (`email`, `password`)
  - Profile updates
- Server-side validation is handled using Laravel’s `Validator` and `validate()` methods.

---

## 🧩 Technical Implementation Summary

| Module        | Description |
|---------------|-------------|
| `AuthController` | Handles registration, login, logout, MFA code verification, and profile update. |
| `routes/web.php` | Defines routes for registration, login, MFA verification, and profile. |
| `resources/views/auth` | Contains Blade templates for login, register, and MFA form. |
| `users` table | Updated with `salt`, `mfa_code`, `mfa_expires_at` columns. |
| `RateLimiter::for('login')` | Limits login attempts by IP using Laravel’s throttle middleware. |

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
  
# 📘 ASSIGNMENT 4 – XSS, CSRF & CSP SECURITY ENHANCEMENTS

This section documents the implementation of advanced web security protections—**CSP**, **XSS defense**, and **CSRF protection**—within the Laravel-based To-Do App.

## ✅ Overview of Security Features

| Security Layer | Description |
|----------------|-------------|
| **CSP (Content Security Policy)** | Enforced via custom middleware to restrict scripts/styles to same-origin only. Prevents injection of malicious code from third-party origins. |
| **XSS Prevention** | Laravel automatically escapes variables in Blade using `{{ }}`. All user inputs are validated and escaped to avoid script injection. |
| **CSRF Protection** | Enabled by default in Laravel using `@csrf` directive in forms. CSRF token is required on every state-changing request. |

## 🔐 Content Security Policy (CSP)

| Aspect | Details |
|--------|---------|
| **Implementation** | Created `CspMiddleware.php` to add strict `Content-Security-Policy` headers. |
| **Header Example** | `Content-Security-Policy: default-src 'self'; script-src 'self'; style-src 'self';` |
| **Applied To** | All routes via global middleware registration in `app/Http/Kernel.php`. |

## 🛡️ XSS (Cross-Site Scripting) Prevention


<!-- Safe Blade Output -->
{{ $todo->title }}


| Mechanism | Details |
|-----------|---------|
| **Output Escaping** | All variables are rendered with `{{ }}` in Blade, which auto-escapes HTML characters. |
| **Validation** | Form inputs are validated via Laravel's `Validator` to ensure proper data formats. |
| **Sanitization** | Optionally uses `strip_tags()` or custom sanitization logic for textarea fields (e.g., descriptions). |

## 🔁 CSRF (Cross-Site Request Forgery) Protection

| Mechanism | Description |
|-----------|-------------|
| **Token-Based Forms** | All forms include `@csrf`, which injects a hidden token field. |
| **Laravel Middleware** | `VerifyCsrfToken` middleware is active by default. It checks for CSRF token on `POST`, `PUT`, `DELETE`, etc. |
| **Protection Scope** | All user-authenticated routes and forms (login, register, create/edit/delete tasks). |

<form method="POST" action="{{ route('todos.store') }}">
    @csrf
    <!-- other fields -->
</form>


## Reference
https://www.youtube.com/watch?v=egFodWSdMzY
https://www.youtube.com/watch?v=g00WAcdYRpY
https://dev.to/chabbasaad/laravel-crud-with-blade-and-authentification-and-seeder-5af8
https://laraveldaily.com/lesson/laravel-projects-structure/validation-to-form-request
