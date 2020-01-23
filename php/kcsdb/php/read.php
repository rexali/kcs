<?php
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include config file
    require_once 'config.php';
    
    // Prepare a select statement
    $sql = "SELECT * FROM pupils WHERE id = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set parameters
        $param_id = trim($_GET["id"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                // Retrieve individual field value
                $firstname = $row["firstname"];
                $lastname = $row["lastname"];
                $class = $row["class"];
                $admissionnumber = $row["admissionnumber"];
                $dateofadmission = $row["dateofadmission"];
                $dateofbirth = $row["dateofbirth"];
                $placeofbirth = $row["placeofbirth"];
                $tribe = $row["tribe"];
                $localgovernment = $row["localgovernment"];
                $state = $row["state"];
                $religion = $row["religion"];
                $disability = $row["disability"];
                $parentname = $row["parentname"];
                $parentnumber = $row["parentnumber"];
                $parentaddresss = $row["parentaddresss"];
                $parentoccupation =$row["parentoccupation"];
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: error.php");
                exit();
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            max-width: 100%;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>View Record</h1>
                    </div>
                    <div class="form-group">
                        <label>First Name</label>
                        <p class="form-control-static"><?php echo $row["firstname"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <p class="form-control-static"><?php echo $row["lastname"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Class</label>
                        <p class="form-control-static"><?php echo $row["class"]; ?></p>
                    </div>

                    <div class="form-group">
                        <label>Admission Number</label>
                        <p class="form-control-static"><?php echo $row["admissionnumber"]; ?></p>
                    </div>

                    <div class="form-group">
                        <label>Date of Admission</label>
                        <p class="form-control-static"><?php echo $row["dateofadmission"]; ?></p>
                    </div>

                    <div class="form-group">
                        <label>Date of Birth</label>
                        <p class="form-control-static"><?php echo $row["dateofbirth"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Place of Birth</label>
                        <p class="form-control-static"><?php echo $row["placeofbirth"]; ?></p>
                    </div>

                    <div class="form-group">
                        <label>Tribe</label>
                        <p class="form-control-static"><?php echo $row["tribe"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Local Government</label>
                        <p class="form-control-static"><?php echo $row["localgovernment"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>State</label>
                        <p class="form-control-static"><?php echo $row["state"]; ?></p>
                    </div>

                    <div class="form-group">
                        <label>Religion</label>
                        <p class="form-control-static"><?php echo $row["religion"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Disability</label>
                        <p class="form-control-static"><?php echo $row["disability"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Parent Name</label>
                        <p class="form-control-static"><?php echo $row["parentname"]; ?></p>
                    </div>

                    <div class="form-group">
                        <label>Parent Number</label>
                        <p class="form-control-static"><?php echo $row["parentnumber"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Parent Address</label>
                        <p class="form-control-static"><?php echo $row["parentaddress"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Parent Occupation</label>
                        <p class="form-control-static"><?php echo $row["parentoccupation"]; ?></p>
                    </div>

                    <p><a href="index.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>