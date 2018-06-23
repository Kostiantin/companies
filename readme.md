# Project Title

Here you can find a simple Companies/Employees CRM based on Laravel 5.6. Please use it as boilerplate to start managing companies and their employees.
When you installed the site and run mentioned artisan commands, you will have at once two companies, and each company will have one employee assigned.
It should look like this:  
https://www.dropbox.com/s/7vsh87poqnhabp2/screencapture-companies-int-2018-06-23-11_54_04.png?dl=0  

The project implements bootstrap 3 [Cover](http://getbootstrap.com/docs/3.3/examples/cover/) theme.  
## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

1) Pull the project;

2) Install the local site and database;

3) Change file .env.example to .env. Inside it assign database and connection credentials (user/password);

4) Run commands:  
     
     composer install  
     php artisan key:generate  
     php artisan config:cache  
     php artisan migrate --seed  
     npm install  
     npm run dev  
     
5) Try to go to the site via browser.

6) Login with credentials:
     login: admin@admin.com  
     password: admin  
   to create, update, delete companies and employees  

## Authors

* **Kostiantin Zavizion** - *Initial work* - [Kostiantin](https://github.com/Kostiantin)
