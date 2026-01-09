# Project 2: Movies

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