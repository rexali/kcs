<?php

require_once("config.php");

$sql ="
CREATE TABLE kcs_employees (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    address VARCHAR(100) NOT NULL,
    salary VARCHAR(100) NOT NULL,
    class VARCHAR(100) NOT NULL,
    phone VARCHAR(100) NOT NULL,
    discipline VARCHAR(100) NOT NULL,
    appointment_date VARCHAR(100) NOT NULL,
    subject VARCHAR(100) NOT NULL";

if(mysqli_query($link, $sql)){

    echo "Table created successfully.";

} else {

    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);

}

 

// Close connection

mysqli_close($link);


?>



















