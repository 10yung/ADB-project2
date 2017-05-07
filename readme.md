

## About ADB-Project2
In order to verify the database design we learned in this course of the data model. Our team decided to design a classroom rental management system as the group's second project.The classroom rental management system, In the program part, we use PHP language to design the program, and in the database part, we use MySQL RMDB to design the database.

The database structure design covers information such as administrator, teacher, student, classroom, rental period, rental record and classroom open rental period.
The system is mainly designed for two types of users;The first category of users is the school students and staff, which is the main users of the system. The main design function is for the classroom rental reservation and the modification of the rental reservation, the choice of the classroom rental reservation function has the date of appointment, the reservation of the classroom, the scheduled time period.The second type of user is the school administrator, which is also the main manager of the system. The main design function is the setting of the opening period for the classroom and the schedule of the class public holiday date. The options for the date set in the classroom are scheduled according to the date or arranged according to the classroom.

## System Requirement
**Ｍember**
1. Two roles: Teacher& Student
2. Use member ID (school ID) to login
3. Could borrow classroom
  * Choose date and time
  * Update, delete the reservation

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
