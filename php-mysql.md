
# PHP and MySQL with MAMP (or XAMPP)

![w:395px](media/337753114_164911129804407_1998992232480221139_n.jpg)

## Introduction to PHP

**PHP** (*recursive acronym for PHP: Hypertext Preprocessor*) is a widely-used **open source general-purpose scripting language** that is especially suited for web development and can be embedded into HTML.

PHP was created by Danish-Canadian programmer **Rasmus Lerdorf** in 1994, and launched as Personal Home Page Tools (PHP Tools) version 1.0 on June 8, 1995.


![bg right:30% width:80%](media/Webysther_20160423_-_Elephpant.svg.png)

[PHP @ Wikipedia](https://en.wikipedia.org/wiki/PHP)

## How does PHP work?

**PHP code is executed on the server, generating HTML which is then sent to the client.**

The client would receive the results of running that script, but would not know what the underlying code was.

PHP is extremely simple for a newcomer, but offers many advanced features for a professional programmer.

PHP is its support for a wide range of databases, like **MySQL**.

## What Can PHP Do?

PHP can:
* generate **dynamic page content**
* create, open, read, write, delete, and close **files** on the server
* collect **form data**
* send and receive **cookies**
* add, delete, modify data in your **database**
* be used to control **user-access**
* **encrypt** data

## What is a PHP File?

* PHP files can contain: 
    * text
    * HTML 
    * CSS 
    * JavaScript
    * PHP code
* PHP code is **executed on the server**, and the result is returned to the browser as plain HTML (or other defined format)
* PHP files have extension "`.php`"

## PHP Hello World

Make an `example.php` file in your local folder:
```php
<!DOCTYPE html>
<html>
    <head>
        <title>Example</title>
    </head>
    <body>

        <?php
            echo "Hi, I'm a PHP script!";
        ?>

    </body>
</html>
```

Open it in your browser, what happens?

Normally one of two things: 
1. The browser downloads the file...
2. The browser treats it like a text file and shows it with tags and all (PHP and HTML): 

![](media/php-opened-in-safari.png)

This is because you need to run the PHP file through a web server that supports PHP.

## Set up MAMP (or XAMPP)

Download and install [MAMP](https://www.mamp.info/en/mac/) (for Mac) or [XAMPP](https://www.apachefriends.org/download.html) (for Windows and Linux).

Using MAMP for local environment, use Finder and navigate to `MAMP` > `htdocs` and delete the `index.php` file. 

<small>If you're [using XAMPP for Windows](https://www.freecodecamp.org/news/how-to-get-started-with-php/), the default folder _should_ be `c:\xampp\htdoc`, but YMMV.</small>

Make a new `index.php` file with the content from the `example.php` file above. 

Now start up MAMP (or XAMMP) and Start Apache.

From the `localhost:8888/MAMP/` page Goto "My Website" 
<small>(or just navigate to `localhost:8888` (MAMP) or `localhost` without the port (XAMPP))</small>

## "Hello, world" example explained

```php
<?php 
    echo "Hi, I'm a PHP script!"; 
?>
```

PHP pages contain HTML with embedded code that does "something" (in this case, output "*Hi, I'm a PHP script!*"). 

The PHP code is enclosed in special start and end processing instructions 
`<?php` and `?>` that allow you to jump into and out of "PHP mode."

`echo` — Output one or more strings, [docs](https://www.php.net/manual/en/function.echo.php).

**Note**: PHP statements end with a semicolon, `;`. As opposed to JavaScript this is mandatory (in almost all cases),

## PHP Case Sensitivity
In PHP, keywords (e.g. if, else, while, echo, etc.), classes, functions, and user-defined functions are not case-sensitive.

In the example below, all three echo statements below are equal and legal:

```php
<?php
ECHO "Hello World!<br>";
echo "Hello World!<br>";
EcHo "Hello World!<br>";
?>
```

**Note**: However, all variable names are case-sensitive!

Look at the example below; only the first statement will display the value of the `$color` variable! This is because `$color`, `$COLOR`, and `$coLOR` are treated as three different variables:

```php
<?php
$color = "red";
echo "My car is " . $color . "<br>";
echo "My house is " . $COLOR . "<br>";
echo "My boat is " . $coLOR . "<br>";
?>
```

## PHP Variables

In PHP, a variable starts with the `$` sign, followed by the name of the variable:

```php
<?php
$txt = "Hello world!";
$x = 5;
$y = 10.5;
?>
```

> Unlike other programming languages, PHP has no command for declaring a variable. It is created the moment you first assign a value to it.

### Rules for PHP variables:

* A variable starts with the `$` sign, followed by the name of the variable
* A variable name must start with a letter or the underscore character
* A variable name **cannot** start with a number
* A variable name can only contain **alpha-numeric characters** and **underscores** 
(A-z, 0-9, and _ )
* Variable names are case-sensitive ($age and $AGE are two different variables)

### PHP is a Loosely Typed Language
In the example above, notice that we did not have to tell PHP which data type the variable is.

PHP automatically associates a data type to the variable, depending on its value. Since the data types are not set in a strict sense, you can do things like adding a string to an integer without causing an error.

In **PHP 7**, type declarations were added. This gives an option to specify the data type expected when declaring a function, and by enabling the `strict` requirement, it will throw a "Fatal Error" on a type mismatch.

[PHP `strict_types` tutorial](https://www.phptutorial.net/php-tutorial/php-strict_types/).

## Comments

PHP supports 'C', 'C++' and Unix shell-style (Perl style) comments. For example:

```php
<?php
    echo 'This is a test'; // This is a one-line c++ style comment
    /* This is a multi line comment
       yet another line of comment */
    echo 'This is yet another test';
    echo 'One Final Test'; # This is a one-line shell-style comment
?>
```

```php
<h1>This is an <?php # echo 'easy';?> example</h1>
<p>The header above will say 'This is an  example'.</p>
```

## PHP `echo` and `print` Statements

`echo` and `print` are more or less the same. They are both used to output data to the screen.

* `echo` has no return value while `print` has a return value of 1 so it can be used in expressions. 
* `echo` can take multiple parameters (although such usage is rare) while `print` can only take one argument. 
* `echo` is marginally faster than `print`.

### The PHP echo Statement

The echo statement can be used with or without parentheses: `echo` or `echo()`.

The following example shows how to output text with the echo command (notice that the text can contain HTML markup):
```php
<?php
echo "<h2>PHP is Fun!</h2>";
echo "Hello world!<br>";
echo "I'm about to learn PHP!<br>";
echo "This ", "string ", "was ", "made ", "with multiple parameters.";
?>

// <h2>PHP is Fun!</h2>
// Hello world!<br>
// I'm about to learn PHP!<br>
// This string was made with multiple parameters.
```

The following example shows how to output text and variables with the echo statement:
```php
<?php
$txt1 = "Learn PHP";
$txt2 = "W3Schools.com";
$x = 5;
$y = 4;

echo "<h2>" . $txt1 . "</h2>";
echo "Study PHP at " . $txt2 . "<br>";
echo $x + $y;
?>

// <h2>Learn PHP</h2>
// Study PHP at W3Schools.com<br>
// 9
```

**Notice**: `.` is used for string concatenation, not `+` that JS uses. PHP treats `+` as a numeric operator only.

<!-- _footer: "[String Operators](https://www.php.net/manual/en/language.operators.string.php)" -->

### The PHP print Statement
The print statement can *also* be used with or without parentheses: `print` or `print()`.

The following example shows how to output text with the print command (notice that the text can contain HTML markup):

```php
<?php
print "<h2>PHP is Fun!</h2>";
print "Hello world!<br>";
print "I'm about to learn PHP!";
?>

// <h2>PHP is Fun!</h2>
// Hello world!<br>
// I'm about to learn PHP!
```

The following example shows how to output text and variables with the print statement:

```php
<?php
$txt1 = "Learn PHP";
$txt2 = "W3Schools.com";
$x = 5;
$y = 4;

print "<h2>" . $txt1 . "</h2>";
print "Study PHP at " . $txt2 . "<br>";
print $x + $y;
?>

// <h2>Learn PHP</h2>
// Study PHP at W3Schools.com<br>
// 9
```

## PHP Data Types
Variables can store data of different types, and different data types can do different things.

PHP supports the following data types:

* String
* Integer
* Float (floating point numbers - also called double)
* Boolean
* Array
* Object
* NULL
* Resource

The special **resource** type is not an actual data type. It is the storing of a reference to functions and resources external to PHP.

A common example of using the resource data type is a **database call**. 


## PHP `var_dump()` Function

`var_dump()` is used to **inspect a variable’s type, value, and structure**, mainly for debugging:


```php
<?php
$a = 42;
echo var_dump($a) . "<br>"; // int(42) 

$b = "Hello world!";
echo var_dump($b) . "<br>"; // string(12) "Hello world!" 

$c = 3.14;
echo var_dump($c) . "<br>"; // float(3.14) 

$d = array("red", "green", "blue");
echo var_dump($d) . "<br>";
// array(3) { [0]=> string(3) "red" [1]=> string(5) "green" [2]=> string(4) "blue" } 

$e = array(32, "Hello world!", 32.5, array("red", "green", "blue"));
echo var_dump($e) . "<br>";
// array(4) { [0]=> int(32) [1]=> string(12) "Hello world!" [2]=> float(32.5) 
// [3]=> array(3) { [0]=> string(3) "red" [1]=> string(5) "green" [2]=> string(4) "blue" } } 

// Dump two variables
echo var_dump($a, $b) . "<br>"; // int(32) string(12) "Hello world!" 
?>
```

It shows:
* the data type
* the value
* lengths of strings
* contents of arrays and objects (recursively)

In short: it is PHP’s blunt but very reliable debugging microscope.


## PHP Conditional Statements

In PHP we have the following conditional statements:

* `if` statement - executes some code if one condition is true
* `if...else` statement - executes some code if a condition is true and another code if that condition is false
* `if...elseif...else` statement - executes different codes for more than two conditions
* `switch` statement - selects one of many blocks of code to be executed

### PHP Conditional Statements, a basic example

```php
<?php
$t = date("H"); // H: 24-hour format of an hour with leading zeros

if ($t < "10") {
  echo "Have a good morning!";
} elseif ($t < "20") {
  echo "Have a good day!";
} else {
  echo "Have a good night!";
}
?>
```

<small>Docs for the [date](https://www.php.net/manual/en/function.date.php) and [DateTime::format](https://www.php.net/manual/en/datetime.format.php).</small>

### PHP alternative control structure syntax

Advanced escaping using conditions:
```php
<?php
  $expression = true;
?>

<?php if ($expression == true): ?>
  This will show if the expression is true.
<?php else: ?>
  Otherwise this will show.
<?php endif; ?>
```
In this example PHP will skip the blocks where the condition is not met, even though they are outside of the PHP open/close tags.

PHP skips them according to the condition since the PHP interpreter will jump over blocks contained within a condition that is not met.

This syntax is common in templates and view files, and rare in pure logic-heavy PHP code.

## PHP Loops

In PHP, we have the following loop types:

* `while` - loops through a block of code as long as the specified condition is true
* `do...while` - loops through a block of code once, and then repeats the loop as long as the specified condition is true
* `for` - loops through a block of code a specified number of times
* `foreach` - loops through a block of code for each element in an array

Loops are used to execute the same block of code again and again, as long as a certain condition is true.

```php
<?php
// while loop
$i = 1;
while ($i <= 3) {
    echo $i;
    $i++;
}
// Output: 123

// for loop
for ($j = 1; $j <= 3; $j++) {
    echo $j;
}
// Output: 123

// foreach loop
$colors = ["red", "green", "blue"];
foreach ($colors as $color) {
    echo $color;
}
// Output: redgreenblue
```

## PHP User Defined Functions

Besides the [built-in PHP functions](https://www.w3schools.com/php/php_ref_overview.asp), it is possible to create your own functions.

* A function is a block of statements that can be used repeatedly in a program.
* A function will not execute automatically when a page loads.
* A function will be executed by a call to the function.

> Note: A function name must start with a letter or an underscore. Function names are NOT case-sensitive.

### Functions, example
```php
<?php
function addNumbers($a, $b = 12) {
  return $a + $b;
}
echo addNumbers(3, 4); // 7 
echo addNumbers(1); // 13
echo addNumbers(5, "5 days"); // 10
?>
```

> "5 days" is changed to int(5), and thus `addNumbers(5, "5 days")` return 10, 
> use *strict mode* in PHP 7+ and set data types if you want to prevent this.

## PHP Arrays

In PHP, the `array()` function is used to create an array; of which there are three types:

* Indexed arrays - Arrays with a numeric index
* Associative arrays - Arrays with named keys
* Multidimensional arrays - Arrays containing one or more arrays

The `count()` function is used to return the length (the number of elements) of an array.

Examples:

```php
<?php
// Indexed array
$fruits = array("Apple", "Banana", "Orange");
echo $fruits[0];       // Apple
echo count($fruits);   // 3

// Associative array
$prices = array(
    "Apple" => 10,
    "Banana" => 8,
    "Orange" => 12
);
echo $prices["Banana"]; // 8
echo count($prices);    // 3

// Multidimensional array
$inventory = array(
    array("Apple", 10),
    array("Banana", 8),
    array("Orange", 12)
);
echo $inventory[2][0]; // Orange
echo count($inventory); // 3
?>
```

## PHP Include Files

The `include` (or `require`) statement takes all the text/code/markup that exists in the specified file and copies it into the file that uses the include statement.

Including files is very useful when you want to include the same PHP, HTML, or text on multiple pages of a website.

Example: 

Make three files: `home.php`, `about.php` and `header.php`:

### home.php

```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
<?php include "header.php"; ?>
    <h1>Home page</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
    Inventore explicabo nemo placeat a officiis maxime 
    praesentium voluptates, possimus soluta eveniet animi 
    incidunt deserunt! Qui enim consequatur illum sit tenetur 
    dolores.</p>
</body>
</html>
```


### about.php

```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
</head>
<body>
<?php include "header.php"; ?>
    <h1>About Me</h1>
    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.
    Autem laboriosam reiciendis perferendis veritatis recusandae 
    ab animi, magnam ipsam natus molestias minus error at iusto 
    sunt quia atque a. Mollitia, nobis.</p>
</body>
</html>

```

### header.php

```php
<?php
    //var_dump($_SERVER["PHP_SELF"]);
    $self = $_SERVER["PHP_SELF"];
    //var_dump(strpos($self, "home"));
    //var_dump(strpos($self, "about"));
?>

<nav>
    <ul>
        <li <?php if (strpos($self, "home")) {  
            echo "style='color: lightgrey'"; 
        } ?>>
            <a href="home.php">Home</a>
        </li>
        <li <?php if (strpos($self, "about")) {  
            echo "style='color: lightgrey'"; } 
        ?>>
            <a href="about.php">About</a>
        </li>
    </ul>
</nav>
```

Open the Home file and use the menu to navigate to About and back, and notice how the menu changes.

## PHP Global Variables - Superglobals

Some predefined variables in PHP are "superglobals", which means that they are always accessible, regardless of scope - and you can access them from any function, class or file without having to do anything special.

The PHP superglobal variables are: `$GLOBALS`, `$_SERVER`, `$_REQUEST`, `$_POST`, `$_GET`, `$_FILES`, `$_ENV`, `$_COOKIE` and `$_SESSION`

[`$_SERVER`](https://www.php.net/manual/en/reserved.variables.server) holds information about headers, paths, and script locations.

[`$_REQUEST`](https://www.php.net/manual/en/reserved.variables.request.php) is used to collect data after submitting an HTML form.

[`$_POST`](https://www.php.net/manual/en/reserved.variables.post.php) is used to collect form data after submitting an HTML form with method="post". `$_POST` is also widely used to pass variables.

[`$_GET`](https://www.php.net/manual/en/reserved.variables.get.php) is used to collect form data after submitting an HTML form with method="get". `$_GET` can also collect data sent in the URL.

### A very simple form example 

```php
<!DOCTYPE html>
<html>
<body>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
      Name: <input type="text" name="fname">
      <input type="submit">
    </form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_REQUEST['fname'];  // collect value of input field
    if (empty($name)) {
        echo "<p>Name is empty</p>";
    } else {
        echo "<p>Input is " . $name . "</p>";
    }
}
?>
</body>
</html>
```

[`empty`](https://www.php.net/manual/en/function.empty): checks whether a variable is empty or not set.

It returns true if the value is considered empty, for example:
* "" (empty string)
* 0 or "0"
* false
* null
* [] (empty array)
* or a variable that does not exist

> PHP’s `empty()` is *stricter and more explicit* than JavaScript truthiness.

## phpinfo

`phpinfo()` is commonly used to check configuration settings and for available predefined variables on a given system.

Example: Make a file called [`phpinfo.php`](https://www.geek.no/noroff/phpinfo.php) and put it on your server (remote or locally), and open in browser:

```php
<?php
// Show all information, defaults to INFO_ALL
phpinfo();

// Show just the module information.
// phpinfo(8) yields identical results.
phpinfo(INFO_MODULES);
?>
```
[phpinfo](https://www.php.net/manual/en/function.phpinfo.php)

**Tip**: In MAMP you can access `phpinfo` right from your start page, from the MAMP Tools menu:

![](media/phpinfo-1.png)


---

## MySQL
<!-- https://en.wikipedia.org/wiki/MySQL -->
<!-- https://www.w3schools.com/mysql/ -->

**MySQL** is an open-source relational database management system (RDBMS).

MySQL is a component of the LAMP web application software stack (and others), which is an acronym for 
* **L**inux, 
* **A**pache, 
* **M**ySQL, 
* **P**HP (Perl/Python). 

MySQL is used by many database-driven web applications, including Drupal, Joomla, phpBB, and WordPress. 

![bg right:30% width:80%](media/th-1231141522.jpg)

## What is a Table?

A database table is a structure that organises data into rows and columns – forming a grid.

Tables are similar to a worksheets in spreadsheet applications. The rows run horizontally and represent each record. The columns run vertically and represent a specific field. The rows and columns intersect, forming a grid. The intersection of the rows and columns defines each cell in the table.

![This database table contains 4 columns, and currently has 11 rows.](media/what_is_a_table_1.png)

The header cell of a column usually displays the name of the column. The column is usually named to reflect the contents of each cell in that column. For example, a column name of FirstName could be used to reflect that the cells will contain the first name of an individual.

The rows don’t typically have a header cell as such, but often the first column will contain a **unique identifier** – such as an ID. This field is often assigned as the **primary key**,  as a primary key requires a unique identifier (i.e. the value of this field will be different for each record).

This means that we can identify each record by its ID (or other unique identifier). Therefore, tables can reference records in other tables simply by referring to the record’s primary key value. In this case, the tables have a relationship. This is where the relational part comes from relational database management systems.

Source: [Database.Guide: What is a Table?](https://database.guide/what-is-a-table/)

## CRUD vs HTTP Methods vs SQL

CRUD | HTTP Methods | SQL
--- | --- | ---
CREATE | POST (or PUT) | INSERT INTO 
READ | GET | SELECT
UPDATE | PUT | UPDATE
DELETE | DELETE | DELETE

## Some of The Most Important SQL Commands

`SELECT` - extracts data from a database
`UPDATE` - updates data in a database
`DELETE` - deletes data from a database
`INSERT INTO` - inserts new data into a database
`CREATE DATABASE` - creates a new database
`ALTER DATABASE` - modifies a database
`CREATE TABLE` - creates a new table
`ALTER TABLE` - modifies a table
`DROP TABLE` - deletes a table
`CREATE INDEX` - creates an index (search key)
`DROP INDEX` - deletes an index


# phpMyAdmin

phpMyAdmin is a free software tool written in PHP, intended to handle the administration of MySQL over the Web. phpMyAdmin supports a wide range of operations on MySQL and MariaDB. 

Frequently used operations (managing databases, tables, columns, relations, indexes, users, permissions, etc) can be performed via the user interface, while you still have the ability to directly execute any SQL statement.

Most webhotels supporting PHP/MySQL will have phpMyAdmin pre-installed.

Easiest way to try it on your local machine is to run [MAMP](https://www.mamp.info/en/mamp/) (or similar):

<!--
https://hostadvice.com/how-to/how-to-use-phpmyadmin/#paragraph5

https://www.siteground.com/tutorials/phpmyadmin/database-management/
-->

![bg h:80%](media/MAMP-MySQL.png)

<!--
_footer: "Running MAMP, scroll down to MySQL for link to phpMyAdmin, info, and code examples for relevant languages, incl. PHP"
-->

You can also access phpMyAdmin via the Tools menu:

![](media/MAMP-toolsmenu.png)

![bg h:80%](media/MAMP-phpmyadmin.png)

<!--_footer: "Default MySQL db setup on MAM"-->

<!--

1. Create DB
1. Create tables (2 or more)
1. Query tables
    1. Simple
    1. With join
1. Display result

-->

## Practical example: Create a new database

Click the "**New**" db "link" or access the "**Databases**" tab:

![](media/create-db-1.png)

Use "Create database", give the database a name, and click create:

![](media/create-db-2.png)

Notice you've moved into the new database, and are now in the tab "Structure", which let's you "Create new table".

Make your first table by giving it a name and number of columns:

![](media/create-db-3.png)

Give the table columns name and [**datatype**](https://www.w3schools.com/mysql/mysql_datatypes.asp) (e.g. varchar, integer, date, etc.):


![](media/create-db-4.png)

**Tip 1**: If you need additional columns, click Add 1 (or more) column(s): 

![](media/tip1.png)

**Tip 2**: Preview your SQL: 

![](media/tip2.png)

Note that here all fields have been set to "Not null", click the "Null" checkbox to allow some of the columns to allow `null` values (eg. FitstName and Address).


**Tip 3**: Remember to check A_I to add AUTO INCREMENT to the CustomerId and make it your Primary Key:

![](media/tip3.png)


**Tip 4**: Remember to add Length to all columns with varchar datatype: 

![](media/tip4.png)

**Tip 5**: Make sure `LastName` and `Address` accepts `null` values by checking the `Null` checkbox: 

![](media/tip5.png)

<!--_footer: "Note: Screenshot has FirstName as a possible NULL value, but we've changed that to make LastName as a possible NULL value instead."-->

Then click the **Save** button, to see the new table's structure:

![](media/create-db-5.png)

Go to the SQL tab:

![h:540px](media/create-db-6.png)

Use SQL to insert your first record, with `INSERT INTO`, and click "Go":

```sql
INSERT INTO `customers` (
    `LastName`, `FirstName`, `Address`, `Zip`, `City`
)
VALUES(
    'Olsen', 'Ole', 'Oppveien 12', '1234', 'Stedet'
)
```

![](media/success.png)

**Did you notice that we did not insert any number into the CustomerId field?**
The CustomerId column is an *auto-increment field* and will be generated automatically when a new record is inserted into the table.

<!--
_header: ""
-->

`INSERT` data only in specified columns

```sql
INSERT INTO `customers` (
    `FirstName`, `Zip`, `City`
)
VALUES(
    'Whatever', '6500', 'Elsewhere'
)
```

Now, get all records using `SELECT`: 

```sql
SELECT * FROM `customers`;
```

![](media/select1.png)

Notice Customer `2` has two columns with `NULL` values.

Add a few more records: 

```sql
INSERT INTO `customers` (
    `LastName`, `FirstName`, `Address`, `Zip`, `City`
)
VALUES
    ('Larsen', 'Lars', 'Nedveien 21', '1234', 'Stedet'), 
    ('Larsen', 'Ole', 'Dill 42', '2000', 'Hvorerdet'), 
    ('Olsen', 'Lars', 'Dall 13', '2000', 'Hvorerdet'), 
    ('Nilsen', 'Nils', 'Nedveien 22a', '1234', 'Stedet'), 
    ('Nilsen', 'Ole', 'Nedveien 22b', '1234', 'Stedet'), 
    ('Pedersen', 'Peder', 'Torget 2', '5000', 'Bergen')
```

![](media/success2.png)

Now, if you use a simple `SELECT`, you get all 8 records: 

```sql
SELECT * FROM `customers`;
```

![h:480px](media/select8.png)

The `WHERE` clause is used to filter records.

It is used to extract only those records that fulfill a specified condition.

```sql
SELECT * FROM `customers`
WHERE FirstName = "Ole";
```

![h:380px](media/select-where1.png)

```sql
SELECT * FROM `customers`
WHERE CustomerId = 7;
```

![](media/select-where2.png)

<br>

```sql
SELECT * FROM `customers`
WHERE Zip = 1234;
```

![](media/select-where3.png)

```sql
SELECT * FROM `customers`
WHERE Zip BETWEEN 5000 AND 5999;
```

![](media/select-where4.png)

<br>

```sql
SELECT * FROM `customers`
WHERE LastName LIKE "%sen";
```
![](media/select-where5.png)

```sql
SELECT * FROM `customers`
WHERE LastName LIKE "%sen" AND Firstname LIKE "o%";
```

![](media/select-where6.png)

<br>

```sql
SELECT * FROM `customers`
WHERE 
    LastName LIKE "%sen" AND 
    Firstname LIKE "o%" AND
    Zip >= 2000;
```

![](media/select-where7.png)

<small>

Operator|Description
---|---
`=`|Equal
`>`|Greater than
`<`|Less than
`>=`|Greater than or equal
`<=`|Less than or equal
`<>`|Not equal. &nbsp; &nbsp; &nbsp; *Note*: In some versions of SQL this operator may be written as `!=`
`BETWEEN`|Between a certain range
`LIKE`|[Search for a pattern](https://www.w3schools.com/mysql/mysql_like.asp)
`IN`|To specify multiple possible values for a column

</small>

The `ORDER BY` keyword is used to sort the result-set in ascending or descending order.

The `ORDER BY` keyword sorts the records in ascending order by default. To sort the records in descending order, use the `DESC` keyword.

```sql
SELECT * FROM `customers`
ORDER BY LastName;
```

![h:320px](media/select-where8.png)

<!--
_header: ""
-->

#### ORDER BY Several Columns

```sql
SELECT * FROM `customers`
ORDER BY LastName, FirstName;
```

![h:320px](media/select-where9.png)

<small>*Notice how Lars and Ole Olsen changed places.*</small>

#### Combining WHERE and ORDER BY

```sql
SELECT * FROM `customers`
WHERE LastName LIKE "%sen" AND Firstname LIKE "l%"
ORDER BY zip DESC;
```

![](media/select-where10.png)

#### UPDATE

The `UPDATE` statement is used to modify the existing records in a table.


```sql
UPDATE `customers`
SET Firstname = "Lars Erik"
WHERE CustomerId = 3;
```

![](media/update1.png)

```sql
UPDATE `customers`
SET Address = "Fjellet 13", Zip = 5001, City = "Bergen"
WHERE CustomerId = 8;
```

![](media/update2.png)

#### CREATE TABLE

Create another table: 
```sql
CREATE TABLE `orders` (
    OrderId int NOT NULL AUTO_INCREMENT,
    CustomerId int, 
    OrderDate date,
    PRIMARY KEY (OrderId), 
    FOREIGN KEY (CustomerId) REFERENCES customers(CustomerId)
)
```

PS! The opposite of `CREATE TABLE` is `DROP TABLE`, which _will_ delete the named table!

And make some orders from the SQL-tab: 

```sql
INSERT INTO `orders`(`CustomerId`, `OrderDate`) 
VALUES 
    (1,'2025-01-13'),
    (1,'2024-12-19'),
    (2,'2025-01-21'),
    (2,'2025-01-18'),
    (4,'2024-11-07'),
    (8,'2025-01-03'),
    (1,'2025-01-24'),
    (6,'2025-01-11'),
    (5,'2025-01-03'),
    (6,'2024-12-13'),
    (3,'2025-01-04'),
    (2,'2025-01-25') 
```

Click the the orders table or (if that's chosen already) the **Browse** tab; 

this is basically the the same as using the `SELECT` query:
```sql
SELECT * FROM `orders`
```

![height:420px](media/browse.png)

Notice how all the CustomerId's are links...

<!--_header: ""-->

Filter by date, find any orders older than a given date, using less than `<`: 

```sql
SELECT * FROM `orders` WHERE OrderDate < "2025-01-01";
```

![h:240px](media/select-date.png)


Try the "[ Edit inline ]" link and change to:

```sql
SELECT * FROM `orders` WHERE OrderDate >= "2025-01-01";
```

```sql
SELECT * FROM `orders` WHERE OrderDate >= "2025-01-01" ORDER BY OrderDate DESC;
```

#### JOIN

A `JOIN` clause is used to combine rows from two or more tables, based on a related column between them.

<small>

**`INNER JOIN`**: Returns records that have matching values in both tables
**`LEFT JOIN`**: Returns all records from the left table, and the matched records from the right table
**`RIGHT JOIN`**: Returns all records from the right table, and the matched records from the left table
**`CROSS JOIN`**: Returns all records from both tables

</small>

![](media/joins.png)

<!--
_footer: "[Source](https://www.w3schools.com/mysql/mysql_join.asp)"
-->

MySQL `INNER JOIN` Example:

The following SQL statement selects all orders with customer information:

```sql
SELECT orders.OrderId, customers.LastName, customers.FirstName
FROM `orders`
INNER JOIN customers ON orders.CustomerId = customers.CustomerId
```

![h:360px](media/inner-join.png)

If you don't need separate first and last name, then use the `CONCAT_WS` function to merge two (or more) columns and `AS` to make an alias:

```sql
SELECT orders.OrderId, CONCAT_WS(" ", customers.FirstName, customers.LastName) AS Customer
FROM `orders`
INNER JOIN customers ON orders.CustomerId = customers.CustomerId
```

![h:360px](media/join-concat-as.png)

# Sources and resources

[Getting Started with PHP](https://www.php.net/manual/en/getting-started.php)
[PHP Language Reference](https://www.php.net/manual/en/langref.php)

[PHP Tutorial](https://www.w3schools.com/php/default.asp)
[PHP Reference Overview](https://www.w3schools.com/php/php_ref_overview.asp)
[PHP String Functions](https://www.w3schools.com/php/php_ref_string.asp)
[PHP Numbers](https://www.w3schools.com/php/php_numbers.asp)
[PHP Math Functions](https://www.w3schools.com/php/php_ref_math.asp)
[PHP Array Functions](https://www.w3schools.com/php/php_ref_array.asp)
[PHP Operators](https://www.w3schools.com/php/php_operators.asp)

[PHP Form Handling](https://www.w3schools.com/php/php_forms.asp)
[PHP MySQL Database](https://www.w3schools.com/php/php_mysql_intro.asp)

## Challenge

Add a footer to the PHP Header example above.
header: "Development Platforms: 1.3 PHP and MySQL"
marp: true
theme: defaultpluss
size: 16:9
paginate: true
# Development Platforms

## Module 1: PHP with MySQL

## Workalong 1

**We are going to connect to the local database we made in the previous lesson.**

Using MAMP for local environment, start by going to `MAMP` > `htdocs` and ***delete (or rename) the `index.php` file and make a (new) folder with an apropriate name***. 

<small>(If you're using XAMPP for Windows, the default folder _should_ be `c:\xampp\htdoc`, but YMMV.)</small>

In your new folder, add an index.php file:

```php
<?php
echo "Hello World";
?>
```

<!--_header: ""-->

Start up MAMP, and click My Website:
![](media/mamp-php1.png)

Click on the link with your folder name:
![](media/mamp-php2.png)

And you find your "Hello World":
![](media/mamp-php3.png)

<!--
_footer: "With XAMPP, start Apache and MySQL, and go to `localhost` in your browser"
-->

Now we _should_ be ready. Update your `index.php` file to connect to the database (using the **MAMP boilerplate**, just changing `$db_db` to our `testdb`, or whatever we called it):

<small style="font-size: 1rem">

```php
<?php
  $db_host = 'localhost';
  $db_user = 'root';
  $db_password = 'root';
  $db_db = 'testdb';
 
  $mysqli = @new mysqli(
    $db_host,
    $db_user,
    $db_password,
    $db_db
  );
	
  if ($mysqli->connect_error) {
    echo 'Errno: '.$mysqli->connect_errno;
    echo '<br>';
    echo 'Error: '.$mysqli->connect_error;
    exit();
  }

  echo 'Success: A proper connection to MySQL was made.';
  echo '<br>';
  echo 'Host information: '.$mysqli->host_info;
  echo '<br>';
  echo 'Protocol version: '.$mysqli->protocol_version;

  $mysqli->close();
?>
```

</small>

<!--
_footer: "[Code for copy paste](https://codepen.io/xiaolasse/pen/GgKyVLV?editors=1000). NOTE: Windows users may have to use sligtly different connect code: [Guide](https://jaamaalxyz.medium.com/the-ancient-web-development-setup-php-and-mysql-with-xampp-afc3e147d6e4) or [Alternative](https://www.codewithfaraz.com/article/74/step-by-step-guide-connecting-php-to-mysql-database-with-xampp)"
-->

Success:

![](media/php-to-my-sql-1.png)

Now we can start **_querying_** the database.

A **database query** is a similar action that is most closely associated with some sort of CRUD (create, read, update, delete) function. A database query is a request to access data from a database to manipulate it or retrieve it.

Source: [What is a database query? SQL and NoSQL queries explained](https://www.educative.io/blog/what-is-database-query-sql-nosql)

Comment out the Success part (but not the close-statement), and add the query:

```php
// echo 'Success: A proper connection to MySQL was made.';
// echo '<br>';
// echo 'Host information: '.$mysqli->host_info;
// echo '<br>';
// echo 'Protocol version: '.$mysqli->protocol_version;

$sql = "SELECT * FROM customers";
$result = $mysqli->query($sql);

$output = $result->num_rows;

$mysqli->close();
```

<!--
_footer: "[Code for copy paste](https://codepen.io/xiaolasse/pen/JoPMgqB?editors=1000)"
-->

Then add some HTML to the bottom of the index.php-file (notice the php-tag in the body): 

```html
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Testing PHP & MySQL</title>
</head>
<body>
  <h1>Testing PHP & MySQL</h1>
  <?php echo $output; ?>
</body>
</html>
```

<!--
_footer: "[Code for copy paste](https://codepen.io/xiaolasse/pen/YPKYmbg?editors=1000)"
-->

Result: 

![](media/php-to-my-sql-2.png)

We can see the `$output` indicates that there are 8 rows in the `customers` table in the database.

Now let's uptdate the file to make a list of those customers...

```php
//$output = $result->num_rows;
$output = "";

if ($result->num_rows > 0) {
  // output data of each row
  $output = "<ul>";
  while($row = $result->fetch_assoc()) {
    $output .= "<li>id: " . $row["CustomerId"]. " - Name: " . $row["FirstName"]. " " . $row["LastName"]. "</li>";
  }
  $output .= "</ul>";
} else {
  $output = "<p style='color: red'>0 results</p>";
}
```

Use the function `num_rows()` to checks if there are more than zero rows returned.

If there are more than zero rows returned, the function `fetch_assoc()` puts all the results into an associative array that we can loop through. 

The `while()` loop loops through the result set and outputs the data from the id, firstname and lastname columns.

<!--
_footer: "[Code for copy paste](https://codepen.io/xiaolasse/pen/KwPZOja?editors=1000)"
-->


![h:100%](media/php-to-my-sql-3.png)

Now change the query: 

```php
  $sql = "SELECT * FROM customers";
```

to

```php
  $sql = "SELECT * FROM customers WHERE CustomerId=12";
```

You should get 0 results: 

![](media/0-results.png)

Now change it back to `$sql = "SELECT * FROM customers";
`

Note: PHP supports template strings, too. Change the output: 

```php
    while($row = $result->fetch_assoc()) {
      // $output .= "<li>id: " . $row["CustomerId"]. " - Name: " . 
      // $row["FirstName"]. " " . $row["LastName"]. "</li>";
      $output .= "
        <li>
          Customer {$row["CustomerId"]}: 
          <strong>{$row["FirstName"]} {$row["LastName"]}</strong>, 
          {$row["Address"]}, 
          {$row["Zip"]} {$row["City"]}
        </li>
      ";  
    }
```
That *could* make the code slightly more readable.

<!--
_footer: "[Code for copy paste](https://codepen.io/xiaolasse/pen/ZYzvgdX?editors=1000)"
-->


Notice that we don't do anything about `null` vaules at this point: 

![](media/php-to-my-sql-4.png)

> Note: You _should_ fix this, but we're ignoring it for now!

### Searching the database:

Add a small search form to the HTML part of the file:

```php
  <h1>Testing PHP & MySQL</h1>
  <form>
    <label for="q"><input id="q" name="q" placeholder="Search">
    <button id="submitbtn">Submit</button>
  </form>
  <?php echo $output; ?>
```

![h:120px](media/php-to-my-sql-5.png)

<small>Notice, when you submit this form it goes to the same page, adding a query-string to the URL: http://localhost:8888/PHP-MySQL/?q=dill</small>

<!--
_footer: "[Code for copy paste](https://codepen.io/xiaolasse/pen/LEPewKX?editors=1000)"
-->

Lets get that query-string, using the `$_GET` superglobal, and use it in the SQL-query:

```php
$sql = "SELECT * FROM customers";
if (isset($_GET["q"])) {
  $sql .= ' WHERE FirstName LIKE "%{$_GET["q"]}%"';
} 
$result = $mysqli->query($sql);
```

But that didn't quite work as intended, we get an error: 

![](media/php-to-my-sql-6.png)

<!--
_footer: "[Code for copy paste](https://codepen.io/xiaolasse/pen/raBpXXp?editors=1000)"
-->


Whe use **`var_dump`** to see what's going on <small>(much like console logging variables in JavaScript)</small>:

```php
var_dump($sql);
$result = $mysqli->query($sql);
```

![](media/php-to-my-sql-6b.png)

Here we can see that we have added the `WHERE` clause, but something's gone wrong with the formatting. 

**Templare strings needs double-quotes `"`, and not single `'` as we used**.

So we "swap" the quotes in the string: 

```php
$sql = "SELECT * FROM customers";
if (isset($_GET["q"])) {
  $sql .= " WHERE FirstName LIKE '%{$_GET["q"]}%'";
} 

var_dump($sql);
$result = $mysqli->query($sql);
```

![h:200px](media/php-to-my-sql-6c.png)

So, now it works, and we can comment out the `var_dump`.

<!--
_footer: "[Code for copy paste](https://codepen.io/xiaolasse/pen/NPKyKKr?editors=1000)"
-->

For now we've just searched in the `FirstName` column, so lets expand the query to also search the `LastName`, `Address`, `Zip` and `City` columns:

```php
$sql = "SELECT * FROM customers";
if (isset($_GET["q"])) {
  $q = $_GET["q"];
  $sql .= " WHERE FirstName LIKE '%{$q}%'";
  $sql .= " OR LastName LIKE '%{$q}%'";
  $sql .= " OR Address LIKE '%{$q}%'";
  $sql .= " OR Zip LIKE '%{$q}%'";
  $sql .= " OR City LIKE '%{$q}%'";
} 
$result = $mysqli->query($sql);
```

![h:150px](media/php-to-my-sql-7.png)

<!--
_footer: "[Code for copy paste](https://codepen.io/xiaolasse/pen/LEPQPPX?editors=1000)"
-->

**Think SECURITY when processing PHP forms!**

This page does not contain any form validation, it just shows how you can send and retrieve form data.

Proper validation of form data is important to protect your web application from hackers and spammers!

![h:300px](media/exploits_of_a_mom.png)

<!--
_backgroundColor: #fed
_footer: "[327: Exploits of a Mom](https://www.explainxkcd.com/wiki/index.php/327:_Exploits_of_a_Mom), explained"
-->

When getting form data, make sure to "**sanatize**" your data<sup>**</sup>. 

The simplest way is to use the `htmlspecialchars` function to converts special characters to HTML entities. This means that it will replace HTML characters like `<` and `>` with `&lt;` and `&gt;`. This prevents attackers from exploiting the code by injecting HTML or Javascript code (Cross-site Scripting attacks) in forms.

```php
  //$q = $_GET["q"];
  $q = htmlspecialchars($_GET["q"]);
```

Any semicolons `;` will now be changed to `%3B` in the query:

![h:170px](media/php-to-my-sql-8.png)

<!--
_footer: "<sup>**</sup> **Some - or even most - of these features *MIGHT* be built into your server, but they are 'cheap' to implement, so why not?**"
-->

<small>

We can also do two more things when the user submits the form:

* Strip unnecessary characters (extra space, tab, newline) from the user input data, with the PHP `trim()` function
* Remove backslashes (`\`) from the user input data, with the PHP `stripslashes()` function

The next step is to create a function that will do all the checking for us (which is much more convenient than writing the same code over and over again).

We will name the function `test_input()`:

</small>

```php
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
```

<!--
_footer: "[Code for copy paste](https://codepen.io/xiaolasse/pen/ogvEvNm?editors=1000)"
-->

Then use it: 
```php
  //$q = $_GET["q"];
  //$q = htmlspecialchars($_GET["q"]);
  $q = test_input($_GET["q"]);
```

So even if you search for ` \\ole` it will just ignore the space and backslashes:

![](media/php-to-my-sql-8b.png)

### Add data

Start by making another php-file: `addcustomer.php` and make link to that in the index.php-file: 

```html
  <?php echo $output; ?>
  <p><a href="./addcustomer.php">Add Customer</a></p>
</body>
```

<small style="font-size: 1.4rem">

In `addcustomer.php` add all the same db-stuff as we did in the `index.php` (we'll do something smarter later): 

```php
<?php
$db_host = 'localhost';
$db_user = 'root';
$db_password = 'root';
$db_db = 'testdb';

$mysqli = @new mysqli(
  $db_host,
  $db_user,
  $db_password,
  $db_db
);

if ($mysqli->connect_error) {
  echo 'Errno: '.$mysqli->connect_errno;
  echo '<br>';
  echo 'Error: '.$mysqli->connect_error;
  exit();
}

$mysqli->close();
?>
```

</small>

<!--
_footer: "[Code for copy paste, same as before](https://codepen.io/xiaolasse/pen/GgKyVLV?editors=1000)"
-->

<small style="font-size: 1.3rem">

And add HTML to the same file, with a form:

```php
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Customer</title>
</head>
<body>
    <h1>Add Customer</h1>
    <form>
        <label for="firstName">First Name: </label><input id="firstName" name="firstName"><br>
        <label for="lastName">Last Name: </label><input id="lastName" name="lastName"><br>
        <label for="address">Address: </label><input id="address" name="address"><br>
        <label for="zip">Zip: </label><input id="zip" name="zip"><br>
        <label for="city">City: </label><input id="city" name="city"><br>
        <button id="submitbtn">Submit</button>
    </form>
    <p><a href="./index.php">Back</a></p>
</body>
</html>
```

</smalL>

<!--
_footer: "[Code for copy paste](https://codepen.io/xiaolasse/pen/emOVOmy?editors=1000)"
-->

When the form submits, all the data are sent in clear text using `get`.

**NOTE: If you are sending sensitive data, like passwords, you should use `post` instead.**

So let's try that now, even if the data is not sensitive.

Change the form's method: 

```php
    <form method="post"> 
```

That also means we cannot use the superglobal `$_GET` to access the form data, but we can use `$_POST`:

```php
var_dump($_POST);

$mysqli->close();
```

So if we submit some data: 

![h:230px](media/php-to-my-sql-9a.png)

We get access to those using the `$_POST` superglobal:

![h:230px](media/php-to-my-sql-9b.png)

<small style="font-size: 1.4rem">

So now we pick out the data and add it to the database with an SQL query: 

```php
if ($_POST) {
    var_dump($_POST);

    $fn = $ln = $ad = $zi = $ci = ""; 
    // Initialize some badly named variables
    
    $fn = test_input($_POST["firstName"]); 
    $ln = test_input($_POST["lastName"]); 
    $ad = test_input($_POST["address"]); 
    $zi = test_input($_POST["zip"]); 
    $ci = test_input($_POST["city"]);

    $sql = "INSERT INTO customers (
        `LastName`, `FirstName`, `Address`, `Zip`, `City`
    ) VALUES (
        '{$ln}', '{$fn}', '{$ad}', '{$zi}', '{$ci}'
    )";
    var_dump($sql);

    $result = $mysqli->query($sql);
    var_dump($result);
}
```

</small>

<!--
_footer: "[Code for copy paste](https://codepen.io/xiaolasse/pen/EaYQYjR?editors=1000)"
-->

**NOTE**: Rember to include the `test_input` function here in `addcustomer.php`, too, since we're using that to sanatize the data from the form. We'll clean that up, as well, a little later.

Then post a new user: 

![](media/php-to-my-sql-10a.png)


And if successful: 

![](media/php-to-my-sql-10b.png)

Notice the `bool(true)` in the `var_dump`; then write better feedback messages, and comment out the `var_dump`.

And the database is updated: 

![](media/php-to-my-sql-10c.png)


### Cleaning up a bit...

We have some duplicate code in `index.php` and `addcustomer.php`, and we should address that.

So, I make 2 new files, in the same folder: 

`_utils.php` 

and

`_connection.php`

Strictly speacing, we could do with one, but there's a certain logic to put everything<sup>**</sup> related to the database connection in it's own file.

<!--
_footer: "<sup>**</sup>For one, you could move this file out of you webfolder, and also, I'm not putting _everything_ related to the connection here."
-->

Now, I can cut the `test_input` function from (both) files, and paste it into `_utils.php`:

```php
<?php
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>
```
**Remember the `<?php ?>` tags.**

And include it (on top) of both `index.php` and `addcustomer.php`:

```php
<?php
include("./_utils.php");
```

<small>

Repeat this with the database connection code (including error-handling, but NOT the closing statement: `$mysqli->close();`), and paste into `_connect.php` with `<?php ?>` tags:

</small>

```php
<?php
$db_host = 'localhost';
$db_user = 'root';
$db_password = 'root';
$db_db = 'testdb';

$mysqli = @new mysqli(
  $db_host, $db_user, $db_password, $db_db
);
  
if ($mysqli->connect_error) {
  echo 'Errno: '.$mysqli->connect_errno;
  echo '<br>';
  echo 'Error: '.$mysqli->connect_error;
  exit();
}
?>
```



Then include the `_connect.php` file in both `index.php` and `addcustomer.php` along side the utilies-include:

```php
<?php
include("./_utils.php");
include("./_connect.php");
```

Note, all files calling the `_connect.php`, should also have the closing statement just before the end php tag:

```php
$mysqli->close();
?>
```

# Workalong 2: Movies

## Set up local environment

1. Make a project folder.
1. Set the folder as Document Root in MAMP**
1. Make an index.php file

> **Note: If you're using XAMPP, changing the root folder can be a bit more of a hassle. Consider using the default `htdoc(s)` folder.

index.php:

```php
<?php
$str = "Hello World";
var_dump($str);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Movie ratings</title>
</head>
<body>
  <h1>My Movie ratings</h1>
</body>
</html>
```

<!--
_footer: "[Code for copy paste](https://codepen.io/xiaolasse/pen/EaYQYVp?editors=1000)"
-->


## Set up local environment, cont.

4. Start MAMP and choose Webstart (if it doesn't automatically does this)
1. Choose Tools > phpMyAdmin
1. Make a new Database `my_movies`
1. Create a new table `movies` with 6 columns
    * `id`, type int(11), auto-incremented, primary key
    * `title`, type varchar(255)
    * `year`, type year
    * `imdb_url`, type varchar(255), can be null
    * `rt_url`, type varchar(255), can be null
    * `my_rating`, type tinyint

8. Insert a couple of movies ([IMDb Top 250 Movies](https://www.imdb.com/chart/top)) from phpMyAdmin's SQL window: 

<small style="font-size: 1.15rem">

```sql
INSERT INTO `movies` (
    `title`, `year`, `my_rating`
)
VALUES
    ('Blade Runner', '1982', '6'),     
    ('Blade Runner 2049', '2017', '2'), 
    ('The Shawshank Redemption', '1994', '6'), 
    ('The Godfather', '1972', '6'), 
    ('The Godfather: Part II', '1974', '6'), 
    ('Pulp Fiction', '1994', '6'), 
    ('True Romance', '1993', '6'), 
    ('Avatar', '2009', '3'), 
    ('Titanic', '1997', '2'), 
    ('Inception', '2010', '2'), 
    ('Star Wars: Episode I - The Phantom Menace', '1999', '2'), 
    ('Star Wars: Episode II - Attack of the Clones', '2002', '3'), 
    ('Star Wars: Episode III - Revenge of the Sith', '2005', '4'), 
    ('Star Wars: Episode IV - A New Hope', '1977', '6'), 
    ('Star Wars: Episode V - The Empire Strikes Back', '1980', '6'), 
    ('Star Wars: Episode VI - Return of the Jedi', '1983', '5'),     
    ('Star Wars: Episode VII - The Force Awakens', '2015', '4'), 
    ('Star Wars: Episode VIII - The Last Jedi', '2017', '2'), 
    ('Star Wars: Episode IX - The Rise of Skywalker', '2019', '1'), 
    ('Rogue One', '2016', '5'), 
    ('Raiders of the Lost Ark', '1981', '6'), 
    ('Spirited Away', '2001', '6'),     
    ('The Matrix', '1999', '6')
```

</small>

<!--
_footer: "[Code for copy paste](https://codepen.io/xiaolasse/pen/wBwywMW?editors=1000)"
-->
9. In your project folder, add a `_connect.php` helper file:

```php
<?php
$db_host = 'localhost';
$db_user = 'root';
$db_password = 'root';
$db_db = 'my_movies';

$mysqli = @new mysqli(
  $db_host, $db_user, $db_password, $db_db
);
  
if ($mysqli->connect_error) {
  echo 'Errno: '.$mysqli->connect_errno;
  echo '<br>';
  echo 'Error: '.$mysqli->connect_error;
  exit();
}
?>
```
<!--
_footer: "[Code for copy paste](https://codepen.io/xiaolasse/pen/qEWxWbL?editors=1000). Note: this code may be slightly different on Windows, look at the SQL-settings on the MAMP web start page/Xammp docs."
-->

10. In the `index.php` file, include the connect-file, make an SQL query, and close the MySQL-connection: 
```php
<?php
include("./_connect.php");
$sql = "SELECT * FROM movies";
var_dump($sql);
$result = $mysqli->query($sql);
var_dump($result->num_rows);

$mysqli->close();
?>
```

11. Run the file, the `int(23)` should reflect the number of movies in your db:

![h:120px](media/my-movies1.png)

<!--
_footer: "[Code for copy paste](https://codepen.io/xiaolasse/pen/wBwywGW?editors=1000)."
-->

12. Now get the data from the result: 

```php
if ($result->num_rows > 0) {
    $output = "<ul>";
    while($row = $result->fetch_assoc()) {
        $output .= "<li>{$row['title']} ({$row['year']})";
        // URLs coming here
        $output .= " {$row['my_rating']}</li>";
    }
    $output .= "</ul>";
} else {
    $output = "<p style='color: red'>No result!</p>";
}
```

<small>You should also comment out the `var_dump($sql);` and `var_dump($result->num_rows);`</small>


<!--
_footer: "[Code for copy paste](https://codepen.io/xiaolasse/pen/emOVOZV?editors=1000)."
-->

13. And place output on the page:

```php
  <h1>My Movies</h1>
  <?php echo $output ?>
```

14. Add sorting to the query and run:

```php
$sql = "SELECT * FROM movies";
$sql .= " ORDER BY my_rating DESC, year DESC"; 
//var_dump($sql);
```

<br>

![bg right:43% h:100%](media/my-movies2.png)

15. Now add another file `movie.php`, and add a link to it in `index.php`:

```php
  <h1>My Movies</h1>
  <?php echo $output ?>
  <p><a href="movie.php">Add Movie</a></p>
```

16. Connect `movie.php` to the database and make a form:

<small>

```php
<?php
include("./_connect.php");

$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Movie</title>
    <style>
        label { display: inline-block; width: 160px; text-align: right; }
        label::after { content: ":" }
    </style>
</head>
```

</small>

<!--
_footer: "[Code for copy paste](https://codepen.io/xiaolasse/pen/jENZNrm?editors=1000) for the complete `movie.php`."
-->
```php
<body>
    <h1>Add Movie</h1> 
    <form method="post">
        <label for="title">Title</label>
        <input id="title" name="title"><br>

        <label for="year">Year</label>
        <input id="year" name="year" type="number" width="4"><br>
        
        <label for="imdb">IMDB url</label>
        <input id="imdb" name="imdb"><br>
        
        <label for="rt">Rotten Tomato URL</label>
        <input id="rt" name="rt"><br>
        
        <label for="rating">My rating</label>
        <input id="rating" name="rating" type="range" min=1 max=6 step=1 list="ticks">
        <span id="output"></span><br>
        
        <button id="submitBtn">Submit</button>
    </form>
</body>
</html>
```

17. Add a datalist to form (for the range slider):
```php
        ...
        <datalist id="ticks">
            <option value="1"></option>
            <option value="2"></option>
            <option value="3"></option>
            <option value="4"></option>
            <option value="5"></option>
            <option value="6"></option>
        </datalist>
    </form>
```

18. And a little script to show the value of the range slider:
```php
    </form>

    <script>
        const output = document.querySelector("#output");
        const input = document.querySelector("#rating");
        output.textContent = input.value;
        input.addEventListener("input", (event) => {
            output.textContent = event.target.value;
        });
    </script>
</body>
```

19. Now get the `$_POST` superglobal and make `INSERT INTO` query: 

```php
<?php
include("./_connect.php");

var_dump($_POST);

if ($_POST) {
    $title = $_POST['title'];
    $year = $_POST['year'];
    $imdb = $_POST['imdb']; 
    $rt = $_POST['rt'];
    $rating = $_POST['rating'];

    $fields = "(`title`, `year`, "; 
    if ($imdb) $fields .= "`imdb_url`, ";
    if ($rt) $fields .= "`rt_url`, ";
    $fields .= "`my_rating`)";

    $values = "('{$title}', '{$year}', "; 
    if ($imdb) $values .= "'{$imdb}', ";
    if ($rt) $values .= "'{$rt}', ";
    $values .= "'{$rating}')"; 

    $sql = "INSERT INTO movies $fields VALUES $values";
    var_dump($sql);

    $result = $mysqli->query($sql);
    var_dump($result);
}

$mysqli->close();
?>
```

<!--
If extra time: Add dice using FontAwesome (both using PHP and JS), see movie-example-from-geek
-->

# Todos: MySQL and PHP deployed to Webhotel

<small style="font-size: 1.5rem">

Continue with the project above **(Optional)**:

Requirements:
* Web host supporting php/mysql, with phpMyAdmin
* FTP-client (like Cyberduck) for deploying files

Todos:
1. Export the table from localhost
2. Make a db on web host via cPanel > phpMyAdmin, and import table
3. Move files to an appropriate (sub) folder, run it online
4. Expand on project:
    * edit movies
    * delete movies

</small>