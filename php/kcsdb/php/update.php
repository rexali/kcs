<?php
// Include config file
require_once 'config.php';
 
// Define variables and initialize with empty values
$firstname = $lastname = $class = $admissionnumber = $dateofadmission = $dateofbirth =""; 
$placeofbirth = $tribe = $localgovernment = $state = $religion = $disability = $parentname  ="";
$parentnumber = $parentaddress = $parentoccupation = "";

$firstname_err = $lastname_err = $class_err = $admissionnumber_err = $dateofadmission_err = "";
$dateofbirth_err = $placeofbirth_err = $tribe_err = $localgovernment_err = $state_err = "";
$religion_err = $disability_err = $parentname_err = $parentnumber_err = $parentaddress_err = $parentoccupation_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
    // Validate name
    $input_firstname = trim($_POST["firstname"]);
    if(empty($input_firstname)){
        $firstname_err = "Please enter first name.";
    } elseif(!filter_var(trim($_POST["firstname"]), FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z'-.\s ]+$/")))){
        $firstname_err = 'Please enter a valid name.';
    } else{
        $firstname = $input_firstname;
    }
    
    // Validate name
    $input_lastname = trim($_POST["lastname"]);
    if(empty($input_lastname)){
        $lastname_err = "Please enter a name.";
    } elseif(!filter_var(trim($_POST["lastname"]), FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z'-.\s ]+$/")))){
        $lastname_err = 'Please enter a valid name.';
    } else{
        $lastname = $input_lastname;
    }
    
    // Validate class
    $input_class = trim($_POST["class"]);
    if(empty($input_class)){
        $class_err = 'Please enter a class.';     
    } else{
        $class = $input_class;
    }
    
    
    // Validate admission number
    $input_admissionnumber = trim($_POST["admissionnumber"]);
    if(empty($input_admissionnumber)){
        $admissionnumber_err = 'Please enter an admission number.';     
    } else{
        $admissionnumber = $input_admissionnumber;
    }
    
    
    // Validate date of admission
    $input_dateofadmission = trim($_POST["dateofadmission"]);
    if(empty($input_dateofadmission)){
        $dateofadmission_err = 'Please enter a date of admission.';     
    } else{
        $dateofadmission = $input_dateofadmission;
    }

    
    // Validate date of birth
    $input_dateofbirth = trim($_POST["dateofbirth"]);
    if(empty($input_dateofbirth)){
        $dateofbirth_err = 'Please enter a date of birth.';     
    } else{
        $dateofbirth = $input_dateofbirth;
    }
    
    // Validate a place of birth
    $input_placeofbirth = trim($_POST["placeofbirth"]);
    if(empty($input_placeofbirth)){
        $placeofbirth_err = 'Please enter a place of birth.';     
    } else{
        $placeofbirth = $input_placeofbirth;
    }
    
    
    // Validate tribe
    $input_tribe = trim($_POST["tribe"]);
    if(empty($input_tribe)){
        $tribe_err = 'Please enter a tribe.';     
    } else{
        $tribe = $input_tribe;
    }
    
    
    // Validate local government
    $input_localgovernment = trim($_POST["localgovernment"]);
    if(empty($input_localgovernment)){
        $localgovernment_err = 'Please enter a local government.';     
    } else{
        $localgovernment =$input_localgovernment;
    }

    // Validate state
    $input_state = trim($_POST["state"]);
    if(empty($input_state)){
        $state_err = 'Please enter a state.';     
    } else{
        $state = $input_state;
    }
    
    // Validate religion
    $input_religion = trim($_POST["religion"]);
    if(empty($input_religion)){
        $religion_err = 'Please enter a religion.';     
    } else{
        $religion = $input_religion;
    }
    
    $input_disability = trim($_POST["disability"]);
    if(empty($input_disability)){
        $disability_err = 'Please enter an address.';     
    } else{
        $disability = $input_disability;
    }

    // Validate parent name
    $input_parentname = trim($_POST["parentname"]);
    if(empty($input_parentname)){
        $parentname_err = 'Please enter an name.';     
    } else{
        $parentname = $input_parentname;
    }
    
    // Validate number
    $input_parentnumber = trim($_POST["parentnumber"]);
    if(empty($input_parentnumber)){
        $parentnumber_err = 'Please enter a number.';     
    } else{
        $parentnumber = $input_parentnumber;
    }
    //validate address
    $input_parentaddress = trim($_POST["parentaddress"]);
    if(empty($input_parentaddress)){
        $parentaddress_err = 'Please enter an address.';     
    } else{
        $parentaddress = $input_parentaddress;
    }

    // Validate occupation
    $input_parentoccupation = trim($_POST["parentoccupation"]);
    if(empty($input_parentoccupation)){
        $parentoccupation_err = 'Please enter an occupation.';     
    } else{
        $parentoccupation = $input_parentoccupation;
    }
    
    // Attempt update query execution
    $sql = "UPDATE pupils SET firstname='$firstname', lastname='$lastname', class='$class', admissionnumber='$admissionnumber', dateofadmission='$dateofadmission', dateofbirth='$dateofbirth', placeofbirth='$placeofbirth', tribe='$tribe', localgovernment='$localgovernment', state='$state', religion ='$religion', disability='$disability', parentname='$parentname', parentnumber='$parentnumber', parentaddress='$parentaddress', parentoccupation='$parentoccupation'  WHERE id='$id'";
    if(mysqli_query($link, $sql)){

        header("location: index.php");

        exit();

    echo "Records were updated successfully.";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);

    /*
    // Check input errors before inserting in database
    if(empty($firstname_err) && empty($lastname_err) && empty($class_err) && empty($admissionnumber_err) && empty($dateofadmission_err) && empty($dateofbirth_err) && empty($placeofbirth_err) && empty($tribe_err) && empty($localgovernment_err) && empty($state_err) && empty($religion_err) && empty($disability_err) && empty($parentname_err) && empty($parentnumber_err) && empty($parentaddress_err) && empty($parentoccupation_err)){
        // Prepare an insert statement
        $sql = "UPDATE pupils SET firstname=?, lastname=?, class=?, admissionnumber=?, dateofadmission=?, dateofbirth=?, placeofbirth=?, tribe=?, localgovernment=?, state=?, religion =?, disability=?, parentname=?, parentnumber=?, parentaddress=?, parentoccupation=?  WHERE id=? ";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssssssssssssss", $param_firstname, $param_lastname, $param_class, $param_admissionnumber, $param_dateofadmission, $param_dateofbirth, $param_placeofbirth, $param_tribe, $param_localgovernment, $param_state, $param_religion, $param_disability, $param_parentname, $param_parentnumber, $param_parentaddress, $param_parentoccupation, $param_id);
            
            // Set parameters
            $param_firstname = $firstname;
            $param_lastname = $lastname; 
            $param_class = $class;

            $param_admissionnumber = $admissionnumber;
            $param_dateofadmission = $dateofadmission
            $param_dateofbirth = $dateofbirth;
            $param_placeofbirth = $placeofbirth;

            $param_tribe = $tribe;
            $param_localgovernment = $localgovernment;
            $param_state = $state;

            $param_religion = $religion;
            $param_disability = $disability;

            $param_parentname = $parentname;
            $param_parentnumber = $parentnumber;
            $param_parentaddress = $parentaddress; 
            $param_parentoccupation =$parentoccupation;
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
    */

} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM pupils WHERE id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_id);
            
            // Set parameters
            $param_id = $id;
            
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
                $parentaddress = $row["parentaddress"];
                $parentoccupation =$row["parentoccupation"];

                /*
                    $name = $row["name"];
                    $address = $row["address"];
                    $salary = $row["salary"];

                */
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
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
                        <h2>Update Record</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group <?php echo (!empty($firstname_err)) ? 'has-error' : ''; ?>">
                            <label>First Name</label>
                            <input type="text" name="firstname" class="form-control" value="<?php echo $firstname; ?>">
                            <span class="help-block"><?php echo $firstname_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($lastname_err)) ? 'has-error' : ''; ?>">
                            <label>Last Name</label>
                            <input name="lastname" class="form-control" value = "<?php echo $lastname; ?>" >
                            <span class="help-block"><?php echo $lastname_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($class_err)) ? 'has-error' : ''; ?>">
                            <label>Class</label>
                            <input type="text" name="class" class="form-control" value="<?php echo $class; ?>">
                            <span class="help-block"><?php echo $class_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($admissionnumber_err)) ? 'has-error' : ''; ?>">
                            <label>Admission Number</label>
                            <input type="text" name="admissionnumber" class="form-control" value="<?php echo $admissionnumber; ?>">
                            <span class="help-block"><?php echo $admissionnumber_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($dateofadmission_err)) ? 'has-error' : ''; ?>">
                            <label>Date of Admission</label>
                            <input name="dateofadmission" class="form-control" value = "<?php echo $dateofadmission; ?>" >
                            <span class="help-block"><?php echo $dateofadmission_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($dateofbirth_err)) ? 'has-error' : ''; ?>">
                            <label>Date of Birth</label>
                            <input type="text" name="dateofbirth" class="form-control" value="<?php echo $dateofbirth; ?>">
                            <span class="help-block"><?php echo $dateofbirth_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($placeofbirth_err)) ? 'has-error' : ''; ?>">
                            <label>Place of Birth</label>
                            <input type="text" name="placeofbirth" class="form-control" value="<?php echo $placeofbirth; ?>">
                            <span class="help-block"><?php echo $placeofbirth_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($tribe_err)) ? 'has-error' : ''; ?>">
                            <label>Tribe</label>
                            <input name="tribe" class="form-control" value = "<?php echo $tribe; ?>" >
                            <span class="help-block"><?php echo $tribe_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($localgovernment_err)) ? 'has-error' : ''; ?>">
                            <label>Local Government</label>
                            <input type="text" name="localgovernment" class="form-control" value="<?php echo $localgovernment; ?>">
                            <span class="help-block"><?php echo $localgovernment_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($state_err)) ? 'has-error' : ''; ?>">
                            <label>State</label>
                            <input type="text" name="state" class="form-control" value="<?php echo $state; ?>">
                            <span class="help-block"><?php echo $state_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($religion_err)) ? 'has-error' : ''; ?>">
                            <label>Religion</label>
                            <input name="religion" class="form-control" value = "<?php echo $religion; ?>" >
                            <span class="help-block"><?php echo $religion_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($disability_err)) ? 'has-error' : ''; ?>">
                            <label>Disability</label>
                            <input type="text" name="disability" class="form-control" value="<?php echo $disability; ?>">
                            <span class="help-block"><?php echo $disability_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($parentname_err)) ? 'has-error' : ''; ?>">
                            <label>Parent Name</label>
                            <input type="text" name="parentname" class="form-control" value="<?php echo $parentname; ?>">
                            <span class="help-block"><?php echo $parentname_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($parentnumber_err)) ? 'has-error' : ''; ?>">
                            <label>Parent Number</label>
                            <input name="parentnumber" class="form-control" value = "<?php echo $parentnumber; ?>" >
                            <span class="help-block"><?php echo $parentnumber_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($parentaddress_err)) ? 'has-error' : ''; ?>">
                            <label>Parent Address</label>
                            <textarea name="parentaddress" class="form-control" rows='3' cols ='50'><?php echo $parentaddress; ?></textarea>
                            <span class="help-block"><?php echo $parentaddress_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($parentoccupation_err)) ? 'has-error' : ''; ?>">
                            <label>Parent Occupation</label>
                            <input type="text" name="parentoccupation" class="form-control" value="<?php echo $parentoccupation; ?>">
                            <span class="help-block"><?php echo $parentoccupation_err;?></span>
                        </div>

                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>