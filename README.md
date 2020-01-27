# ADVANCE EIMS
Education Institute Management System All in one system for education especially for Indian schools. This software will cover all school requirements from admission to Transfer. After Completion of all reachers and requirements according to your locality database and designing process will be started. The development will begin with basic requirements and other useful features will be a part of future development.
Project source code available free for commercial and personal use.

All contributors are most welcome. please provide your suggestions to make a good and useful software product. help us to research and development. Thanks 

NOTE: kindly read the following table of content for more information. 

## Table of contents
* [Dependencies](#Dependency)
* [Versions](#Versions)
* [Features](#Features)

## **Dependency**
* Language for development PHP7
* Laravel Framework 6.12.0
* Database MySql

## **Versions**
 - v 1.0 : 
    - v 1.0 will cover all basic functionality as mentioned below [here](#BackEnd). kindly read everything carefully and suggest if any . 
    - NOTE : please do not discuss about feature development until v 1.0 done Or any critical requirement.
    - Development in v 1.0 over view :Institute Setup, Academic Year manage, Teacher Manage, Class & Section Manage, Subject Manage, Academic Calendar Setup, Parents Management, Student Management, Student Attendance, Exam & Grading Rule, Account Manage, User Manage, 

## User Access
* [Admin Login](#Admin-Login)
* [Accountant Login](#Acountant-Login)

### Upcoming users
* [Teacher Login](#Teacher-Login)
* [Librarian](#)
* [Parents](#)
* [Transport](#)

# Features

## BackEnd
* [Institute Setup](#Institute-Setup)
* [Academic Year manage](#Academic-Year-manage)
* [Teacher Manage](#Teacher-Manage)
* [Class & Section Manage](#Class-&-Section-Manage)
* [Subject Manage](#Subject-Manage)
* [Academic Calendar Setup](#Academic-Calendar-Setup)
* [Parents Management](#Parents-Management)
* [Student Management](#Student-Management)
* [Student Attendance](#Student-Attendance)
* [Exam & Grading Rule](#Exam-&-Grading-Rule)
* [Account Manage](#Account-Manage)
* [User Manage](#User-Manage)

## Upcoming features
* [User & Role manage with permission grid](#)
* [Library Manage](#)
* [Issue book and fine collection](#)
* [Transport Management](#)
* [SMS Gateway Setup](#)
* [Email & SMS Template](#)
* [Attendance notification email/sms](#)
* [Id Card templates Manage](#)
* [Employees Manage](#)
* [Employees Attendance](#)
* [Employees Leave](#)
* [Employee & Student id card print](#)
* [User wise Dashboard](#)
* [Report Settings](#)
* [Reports](#)
* [Hostel & Collection Manage](#)
* [Student & Employee Id card bulk/mass print](#)
* [Budget Manage](#)
* [Account Heads](#)
* [Student Invoice](#)
* [Payroll](#)
* [Salary Template](#)
* [Employee Salary Payment](#)
* [Academic Calendar Print](#)
* [Bulk SMS and Email Sending](#)
* [40+ Reports](#)

## Front End
* [Dynamic Front Website](#)
* [Website Management Panel](#)
* [Photo Gallery](#)
* [Event Manage](#)
* [Google Analytics](#)
* [User Notification](#)
* [User Notification](#)
* [Online Admission](#)
* [Online Admit Card & Payslip](#)
* [Student Promotion](#)
* [Notice Board](#)

# Installation Of Software
## Installation On Server
1. run composer install (for install all the dependencies)
2. rename .env.example to .env 
3. configure your database name in .env
4. run migrate:fresh (create tables)
5. run php artisan serve (run project)

## Institute Setup
During the first run of the project, it should display the page for the institute setup.
institute setup page required 
- Institute: 
    1. Name
    2. address
    3. logo
    4. email
    5. contact no
    6. start and End academic year,

- Admin: 
    - Username
    - Password 

## Academic Year manage
- Add/Edit/Delete Academic year
- Required : 
    - start month and year
    - End Month and year

## Teacher Manage
- Add/Edit/(Delete/Disabled) Class
- Required
    1. Name
    2. Contact
    3. email
    4. image
    5. address
    6. joining date
    
## Class & Section Manage
- First add section
- Second Add row classes 
    - row class is just class name and number 
- create class with 
    - row class
    - section 
    - academic year (for maintain class history)

### Section
- Add/Edit/Delete Section
- attribute 
    - section name
### Row Class

- Add/Edit/Delete Row Class
- Required
    - class name (given name)
    - class numeric
### Create class
- Add/Edit/Delete Class
    - create class
    - required :
        - select Class
        - select Section
        - select Teacher
        - select academic year
        - select fees for class (class fees , except group subjects)

## Subject Manage
### Row Subjects 
- add all subject which is available in institute
### Subject Groups
- optional subjects 
- ex. choose language subject like english, japanese, Hindi
### Assign Subjects to class
- Assign regular subjects
- assign optional group
- select academic year (Purpose : If there is no subject next year)

### Academic Calendar Setup
- Type :
    1. Holidays
    2. events 
    3. activities
    4. functions
    5. and many more 

- Add event : Required
    1. date
    2. class / all over institute
    3. name of event
    4. description (not mandatory)

### Parents Management
- add parent for manage siblings 
- tracking application requires
- feature development (Parent mobile application)
Required :
- compulsory
    - name
    - email
    - contact/alternative
    - address
- not compulsory
    - annual income
    - bank details
    - Adhar details (India Only)

### Student Management
- Student admission
    - Required
        1. name
        2. photo
        3. parent (if other guardian) 
        4. class 
        5. optional subjects (if have) 
        6. address (if different than parent) 
        7. contact (if different than parent) 
        8. Admission Date 
        9. Add additional fees instead of class fees (ex. extra subject fees or any)
        10. Adhar Number 
        11. bank details

- student list
    - show student list (filters class, name , )
    - show option for edit/(delete/disabled)
    - print list (custom table with heading filters, custom selection)
    - set fees reminder
    - pay fees shortcut
    - check remain fees
    - cancel additional fees
    - issue TC
    - add leave request (after approval)

- student profile
- student progress
- student promotion (to next academic year)

### Student Attendance
- Student attendance
    - select class
    - section
    - student status
        - present 
        - absent 
        - leave
- Update attendance (only on date only)

### Exam & Grading Rule
- create exam (unit test I, sessional exam)
- add subject
    - exam date 
    - exam time
    - exam duration
    - subject 
    - class
    - select exam
    - total marks
- add marks
    - select exam
    - select subject
    - add marks or set absent

### Account Manage
- create a fees (bonafide,Tc,education trip,fees increment middle of year)
- apply fees to class,sections,student or custom list 
- collect student fees print recept
- add discount to the student
- fees carry forward
- add expenses
- add income
- show balance sheet (filter month week and day) print

### User Manage
- only 2 user available for now , multiple user and rol management system will come soon
- admin
- clerk/accountant
