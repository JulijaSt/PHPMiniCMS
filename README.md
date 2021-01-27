# Mini CMS <img src="assets/img/resources.png" width="55"> 

This project is created to try OOP PHP and Doctrine/orm.

"Mini CMS" is a webpage which has basic CMS system functionality. It has two parts: administration and user. If you want to use the administration page you must log in. After that you can create, update or delete pages, change content and title. User can only read pages which were created in the administration part. </br>
WYSWYG ("TinyMCE") text editor was used to facilitate administrator text formatting.

# Technologies

- HTML5
- SCSS
- PHP 7.3
- MySQL
- Javascript ES6

# How to run  <img src="assets/img/run.png" width="40">

1. Download or clone this repository to your computer. For example: `C:/Program Files/Ampps/www/yourDirectoryName` .

2. Create SCHEMA `minicms` in the MySQL database using `root` user with password `mySQL`. If you want to create schema using different user, change bootstrap.php (20-21 lines) to your credentials: 

```
    'user'     => 'root',
    'password' => 'mysql'
```

3. Open the command line inside the project directory. Depending on where your `Composer` is installed use: </br>
`composer install` or `php composer.phar install`

4. Create tables: </br>
`vendor/bin/doctrine orm:schema-tool:update --force --dump-sql`

5. Create initial data: </br>
`php create_table_data.php` 

6. Check that the data has been created in the database.

7. Install and run xampp/wamp/ampps.

8. Go to the browser using this link with `yourDirectoryName`, where you can see user pages: </br> 
`http://localhost/yourDirectoryName/` </br> </br>
or go to the browser using this link: </br>
`http://localhost/yourDirectoryName/admin` </br>
where you can see administration part. Default credentials:

```
    Username: admin
    Password: admin123
```