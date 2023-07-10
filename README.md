# lessons_wonde

# Objective
## User Story:
> As a Teacher I want to be able to see which students are in my class each day of the week so that I can be suitably prepared.

## Understanding of the requirements
- Teacher will be viewing their timetable
- Lessons are assigned for the teacher and classes are assigned to that lesson
- Each class has many students

# Method
## Structure
This project uses Docker to run three containers:
- PHP
- NGINX
- MySQL (although it's not used in this instance, it should serve as a template for further work)

# Getting started
- Run `docker compose build` in the root directory of the project to create the containers
- Run `docker compose up -d` to start the containers
- You may also need to run `composer install`

In this instance, the application is running in port `8088`.

