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

## Development Methodology
Special consideration was given to the project's development methodology. The project was developed using the Test Driven Development methodology. It meant that the tests for the requirements were created first until they are satisfied. It is an iterative cycle, as improvements are made throughout the cycle through refactoring. It also meant that quality is ensured as the tests are created at the beginning and increasing test coverage.
![Test Driven Development Diagram - arenzo97](https://github.com/arenzo97/lessons_wonde/assets/29226250/2790ff2e-5b40-44ce-9e75-ae3b6a7dbb34)


# Getting started
- Run `docker compose build` in the root directory of the project to create the containers
- Run `docker compose up -d` to start the containers
- You may also need to run `composer install`

In this instance, the application is running in port `8088`.

