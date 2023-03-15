<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## GEC CRUD App

Simple Crud App for GEC's PHP Dev Evaluation

## Setup

- Pull down code
- Run ```composer install``` to install the couple of extra packages (namely Passport and BenSampo's Enum stuff)
- Run ```php artisan migrate```

## Approach

1. Composer stuff for setup
2. Decided to do migrations 
3. Setup the Routes. 
4. Then the Model
5. Controller CRUD stuff 
6. Some validation added


## Not Completed

- Considering the scope of this role, I never got the Frontend done. However, if I would, I'd use:
  - Vue.js or React for the JS library/framework of choice
  - Blade as the choice to template out the HTML (included - simple and easy to loop through stuff, etc.)
  - I'd simply put it on a single page, with multiple divs handling each different CRUD responsibility
