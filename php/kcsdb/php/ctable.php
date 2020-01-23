<?php

require_once("config.php");

$sql ="
CREATE TABLE employees (

    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,

    name VARCHAR(100) NOT NULL,

    address VARCHAR(255) NOT NULL,

    salary INT(10) NOT NULL

)";

if(mysqli_query($link, $sql)){

    echo "Table created successfully.";

} else {

    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);

}

 

// Close connection

mysqli_close($link);


?>



















