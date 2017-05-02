

## About ADB-Project2
This project aims on designing and implementing an information system using relational database.

## System Requirement
**Ｍember**
1. Two roles: Teacher& Student
2. Use member ID (school ID) to login
3. Could borrow classroom
⋅⋅* Choose date and time
⋅⋅* Update, delete the reservation

**Classroom**
1. Offer the limit time for lending (from 9am to 9pm) and differ in vary classroom.
2. Lending time unit: one hour
3. Every classroom has corresponding admin
4. Each classroom has its own status (available, not available)
 
**Admin**
1. Can login and control the classroom lending condition
2. Set off time date for each classroom
3. Set day of for all classroom



### Logical ERD model
<p align="center"><img src="http://10yung.com/projects/ADB/ADB-Project2-erd.svg"></p>

## Tech stack

<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
