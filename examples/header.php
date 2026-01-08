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