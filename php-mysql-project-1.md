# Project 1

**We are going to connect to the local database we made earlier.**

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

<!-- ## Challenges -->