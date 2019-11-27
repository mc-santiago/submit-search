# Submit-Search with PHP

This web app is a PHP exercise (in Spanish). First page is a form used to add movies to the database. Second page is a search box.  

## Database/Server

In order to connect your own database connection you may add a new file and use the following code. Just insert your own servername, username, password and database. 

```
<?php
// connect to database
$conn = mysqli_connect('servername', 'username', 'password', 'database');

// Check Connection
if(!$conn){
    echo 'Connection error: ' . mysqli_connect_error();
}

?>
```

For this project I used XAMPP as a web server solution. XAMPP contains Apache HTTP Server, MariaDB database, and interpreters for scripts written in the PHP and Perl programming languages. 

## Web App Images

[![formulario-con-php.png](https://i.postimg.cc/WbDNP1mt/formulario-con-php.png)](https://postimg.cc/2VDRQmKf)

[![busqueda-con-php.png](https://i.postimg.cc/VknzdZV8/busqueda-con-php.png)](https://postimg.cc/3k8sq1hS)

